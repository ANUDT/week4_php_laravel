<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Web routes have the following features:
|
| ✅ CSRF Protection: All POST, PUT, PATCH, DELETE requests require CSRF tokens
| ✅ Session Support: Can access session data and flash messages
| ✅ Cookie Support: Can set and read cookies
| ✅ View Support: Can return Blade views for HTML responses
| ✅ Authentication: Can use auth middleware and session-based auth
|
| Use web routes for:
| - Traditional web pages that users visit in browsers
| - Form submissions that need CSRF protection
| - Routes that need session/cookie support
| - Admin panels and user dashboards
|
*/

use Illuminate\Support\Facades\Route; // Import the Route facade to define web routes
use App\Http\Controllers\PostController; // Import the PostController to handle web requests for posts

// Welcome Page Route
// This route serves the main landing page of the application
Route::get('/', function () {
    return view('welcome'); // Returns the welcome.blade.php view
})->name('home');

// Post Management Routes (Web-based)
// These routes handle post operations for web browsers with CSRF protection

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index')
    ->middleware('log.path'); // Apply custom logging middleware
    // GET /posts - Display list of posts (can return HTML view or JSON based on Accept header)

Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store')
    ->middleware('log.path'); // Apply custom logging middleware  
    // POST /posts - Create new post (requires CSRF token for security)

