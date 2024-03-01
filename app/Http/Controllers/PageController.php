<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $auth = Auth::user();

        $search = $request->search;
        $posts = Post::where('title', 'LIKE', "%{$search}%")->latest()->paginate();
        // $images = Post::select('image_path')
        // ->get();

        // ->where('user_id', $auth->id)
        return view('home', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }
}
