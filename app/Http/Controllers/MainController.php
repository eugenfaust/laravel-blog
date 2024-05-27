<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('index', compact('posts'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
        $user = Auth::user();
        $post = $user->posts()->create($data);
        return redirect()->route("posts/show", ['post' => $post->id]);
    }

    public function show(Post $post) {
        return view("posts/show", compact('post'));
    }

    
}
