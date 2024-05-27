<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TagController extends Controller
{
    public function search(Tag $tag) {
        $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(10);
        return view('tag/search', compact('posts', 'tag'));
    }
}
