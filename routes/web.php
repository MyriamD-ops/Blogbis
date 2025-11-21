<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('template.home');
})->name('home');


Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    Route::get('/index', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/edit', [PostController::class, 'edit'])->name('posts.edit');
    
    Route::get('/comments/index', [CommentController::class, 'index'])->name('comments.index');
    Route::get('/comments/{comment}', [CommentController::class, 'show'])->name('comments.show');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');


    Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        
    Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'edit'])->name('comments.edit');
    Route::get('/comments/{comment}',[CommentController::class, 'create'])->name('comments.create');
    Route::post('/posts/{post}',[CommentController::class, 'store'])->name('comments.store');    


    Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
    
    Route::post('/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
 
    Route::patch('/posts/update', [PostController::class, 'update'])->name('posts.update');

    Route::delete('/posts/destroy', [PostController::class, 'destroy'])->name('posts.destroy');

});

require __DIR__.'/auth.php';
