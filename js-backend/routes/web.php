<?php

use Illuminate\Support\Facades\Route; // Import the Route facade to define web routes.
use App\Http\Controllers\PostController; // Import the PostController to handle web requests for posts.

Route::get('/', function () { // Define a GET route for the root URL ("/").
    return view('welcome'); // Blade view
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');  // list posts (HTML or JSON)
Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // create post (CSRF-protected)

