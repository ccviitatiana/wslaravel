<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');

    Route::get('blog/{post:slug}', 'post')->name('post');
});

Route::get('/create', [ImageController::class, 'create']);
Route::post('/create', [ImageController::class, 'store']);


Route::get('/posts', function () {
    return view('posts.index');
})->middleware(['auth', 'verified'])->name('posts');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts', PostController::class)->except('show');


require __DIR__ . '/auth.php';
