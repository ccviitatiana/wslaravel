<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function storeImages($request)
    {
        $ImageName = $request->file('image')->getClientOriginalName();
        $NewImageName = time() . '-' . $ImageName;
        request()->file('image')->move(public_path('images'), $NewImageName);
        return $NewImageName;
    }

    public function index()
    {
        $auth = Auth::user();

        return view('posts.index', [
            'posts' => Post::latest()->paginate(),
            'images' => Post::select('image_path')->where('user_id', $auth->id)->get()
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
            // 'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        
        if($request->hasfile('image') != '') {  
            $image_path = $this->storeImages($request);
        } else {
            $image_path = '';
        }

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,
            'image_path' => $image_path
        ]);
        return redirect()->route('posts.index', $post);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug'  => 'required|unique:posts,slug,' . $post->id,
            'body'  => 'required',
            // 'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        if($request->hasfile('image') != '') {  
            $image = public_path('images/') . $post->image_path;
            File::delete($image);
            $post->image_path = $this->storeImages($request);
        }

        $post->update();
        
        return redirect()->route('posts.index', $post);
    }

    public function destroy(Post $post)
    {
        $image = public_path('images/') . $post->image_path;
        if (File::exists($image)) {
            File::delete($image);
        } 
        $post->delete();

        return back();
    }
    public function reaction() {
        
    }
}
