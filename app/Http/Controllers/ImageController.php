<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create()
    {
        $images = Image::with('images')->get();
        $id = User::all();
        return view('posts.create', compact('images'))->with('id', $id);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $size = $request->file('image')->getSize();
            $name = $request->file('image')->getClientOriginalName();
            $exte = $request->file('image')->getClientOriginalExtension();
            $image_id = $request->create(User::class)->id;
        }
        request()->file('image')->move(public_path() . '/images/' , $name);
        $images = new Image();
        $images->image_id = $image_id;
        $images->name = $name;
        $images->size = $size;
        $images->exte = $exte;
        $images->save();
        return redirect()->back();
    }

    public function edit(Image $image) 
    {
        return view('posts.edit', compact('image'));
    }
}
