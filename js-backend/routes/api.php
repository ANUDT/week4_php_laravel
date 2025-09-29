<?php

use Illuminate\Support\Facades\Route; // Import the Route facade to define web routes.
use App\Http\Controllers\Api\PostApiController; // Import the PostApiController to handle API requests for posts.

Route::get('/posts', [PostApiController::class, 'index']); // Define a GET route for "/posts" that maps to the "index" method of PostApiController.
Route::post('/posts', [PostApiController::class, 'store']); // Define a POST route for "/posts" that maps to the "store" method of PostApiController.
