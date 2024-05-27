<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function create()
    {
        return view('posts/create');
    }

    public function edit(Post $post)
    {
        return view('posts/edit', compact('post'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
            'tags' => ''
        ]);
        $post = Post::find($data['id']);
        $tags = explode(' ', strtolower($data['tags']));
        unset($data['tags']);
        $tag_ids = [];
        foreach ($tags as $tag) {
            $tag_ids[] = Tag::firstOrCreate(
                ['title' => $tag],
                ['title' => $tag]
            )->id;
        }
        $post->update($data);
        $post->tags()->sync($tag_ids);
        return redirect()->route("posts/show", ['post' => $post->id]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'tags' => ''
        ]);
        $tags = explode(' ', strtolower($data['tags']));
        unset($data['tags']);
        $tag_ids = [];
        foreach ($tags as $tag) {
            $tag_ids[] = Tag::firstOrCreate(
                ['title' => $tag],
                ['title' => $tag]
            )->id;
        }
        $user = Auth::user();
        $post = $user->posts()->create($data);
        $post->tags()->attach($tag_ids);
        return redirect()->route("posts/show", ['post' => $post->id]);
    }

    public function show(Post $post)
    {
        return view("posts/show", compact('post'));
    }

    public function search(Request $request)
    {
        $data = $request->validate(['text' => '']);
        $text = $data['text'];
        $posts = Post::where('content', 'like', "%{$text}%")->paginate(10);
        return view("posts/search", compact('posts', 'text'));
    }

    public function delete(Post $post) {
        $user = Auth::user();
        if ($post->user->id == $user->id) {
            $post->delete();
        }
        return redirect()->route('index');
    }
}
