<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function blog()
    {
        $posts = Post::get();
        $password = User::get('password');
        return view('blog', ['posts' => $posts, 'password' => $password]);
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }
}

