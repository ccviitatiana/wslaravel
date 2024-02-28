<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index() 
    {
    	return view('posts.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }

    public function create(Post $post) 
    {
        $id = User::all();
        return view('posts.create', compact('post'))->with('id', $id);
    }

    public function store(Request $request) 
    { 
    	$request->validate([
            'title' => 'required',
    		'slug'  => 'required|unique:posts,slug',
    		'body'  => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
    	]);

        $post = new Post();
        $auth = Auth::user();

        $ImageName = $request->file('image')->getClientOriginalName();
        // $ImageExte = $request->file('image')->getClientOriginalExtension();
        $NewImageName = time() . '-' . $ImageName;

        request()->file('image')->move(public_path('images'), $NewImageName);

        // $post->id = $request->create(Post::class)->id;
        $post->user_id = $auth->id;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->image_name = $NewImageName;
        $post->image_path = $NewImageName;

        $post->save();  
        return redirect()->route('posts.index');
    }

    public function edit(Post $post) 
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
    	$request->validate([
            'title' => 'required',
    		'slug'  => 'required|unique:posts,slug',
    		'body'  => 'required',
            // 'image' => 'required|mimes:jpg,png,jpeg|max:5048',
    	]);

        $post->update([
            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,
            'path' => $request->path,
        ]);
        return redirect()->route('posts.index', $post);
    }

    public function destroy(Post $post) 
    {
        $post->delete();

        return back();
    }
}
