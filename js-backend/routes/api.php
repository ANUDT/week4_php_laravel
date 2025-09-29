<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. API routes have the following features:
|
| ❌ NO CSRF Protection: Stateless, suitable for mobile apps and SPAs
| ❌ NO Session Support: Each request is independent
| ❌ NO Cookie Support: Uses token-based authentication instead
| ✅ JSON Responses: Automatically returns JSON for validation errors
| ✅ Rate Limiting: Built-in API rate limiting protection
| ✅ Stateless: Perfect for microservices and third-party integrations
|
| Use API routes for:
| - Mobile applications (iOS, Android)
| - Single Page Applications (Vue, React, Angular)
| - Third-party integrations
| - Microservices communication
| - Any stateless client-server communication
|
| All routes in this file are automatically prefixed with '/api'
| Example: Route::get('/posts', ...) becomes accessible at '/api/posts'
|
*/

use Illuminate\Support\Facades\Route; // Import the Route facade to define API routes
use App\Http\Controllers\Api\PostApiController; // Import the PostApiController for API requests

// Post API Endpoints
// These routes provide RESTful API access to post resources

Route::get('/posts', [PostApiController::class, 'index'])
    ->middleware('log.path'); // Apply custom logging middleware
    // GET /api/posts - Retrieve all posts as JSON
    // Returns: { "success": true, "data": [...], "total": count }

Route::post('/posts', [PostApiController::class, 'store'])
    ->middleware('log.path'); // Apply custom logging middleware
    // POST /api/posts - Create a new post via API
    // Expects: { "title": "...", "content": "...", "author": "..." }
    // Returns: { "success": true, "message": "...", "data": {...} }
    // Note: No CSRF token required (stateless API)

/*
| Future API Routes (for reference):
| Route::get('/posts/{id}', [PostApiController::class, 'show']);      // GET single post
| Route::put('/posts/{id}', [PostApiController::class, 'update']);    // UPDATE post
| Route::delete('/posts/{id}', [PostApiController::class, 'destroy']); // DELETE post
*/
