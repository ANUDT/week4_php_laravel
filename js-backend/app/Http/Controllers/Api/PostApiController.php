<?php

namespace App\Http\Controllers\Api; // Define the namespace for the controller.
// This places the controller in the "App\Http\Controllers\Api" namespace,
// which is a common convention for API controllers in Laravel applications.

use App\Http\Controllers\Controller; // Import the base Controller class from the application.
use Illuminate\Http\Request; // Import the Request class to handle HTTP requests.

class PostApiController extends Controller // Define the PostApiController class that extends the base Controller class.
{
    /**
     * Display a listing of posts (API endpoint)
     * 
     * This method handles GET requests to "/api/posts" and returns a JSON response.
     * Unlike web routes, API routes are stateless and don't require CSRF protection.
     * 
     * @param Request $request The incoming HTTP request
     * @return \Illuminate\Http\JsonResponse JSON response containing posts data
     */
    public function index(Request $request)
    {
        // In a real application, you would fetch posts from the database
        // Example: $posts = Post::all(); or Post::paginate(15);
        
        // For demonstration purposes, we return mock data
        $posts = [
            [
                'id' => 1,
                'title' => 'Laravel 11 Features',
                'content' => 'Exploring the new features in Laravel 11',
                'author' => 'John Doe',
                'created_at' => '2024-01-15T10:30:00Z'
            ],
            [
                'id' => 2,
                'title' => 'API Development Best Practices',
                'content' => 'Learn how to build robust APIs with Laravel',
                'author' => 'Jane Smith', 
                'created_at' => '2024-01-16T14:20:00Z'
            ],
            [
                'id' => 3,
                'title' => 'Middleware in Laravel',
                'content' => 'Understanding middleware and how to create custom ones',
                'author' => 'Bob Johnson',
                'created_at' => '2024-01-17T09:15:00Z'
            ]
        ];

        // Return JSON response with success structure
        return response()->json([
            'success' => true,
            'message' => 'Posts retrieved successfully',
            'data' => $posts,
            'total' => count($posts)
        ], 200);
    }

    /**
     * Store a new post (API endpoint)
     * 
     * This method handles POST requests to "/api/posts" and creates a new post.
     * API routes don't require CSRF tokens, making them suitable for mobile apps
     * and third-party integrations.
     * 
     * @param Request $request The incoming HTTP request with post data
     * @return \Illuminate\Http\JsonResponse JSON response with created post data
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        // Laravel's validation automatically returns JSON for API requests
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'content' => ['required', 'string', 'min:10'],
            'author' => ['required', 'string', 'max:100']
        ]);

        // In a real application, you would save to the database
        // Example: $post = Post::create($validatedData);
        
        // For demonstration, we simulate creating a post
        $newPost = [
            'id' => rand(4, 1000), // Simulate auto-increment ID
            'title' => $validatedData['title'],
            'content' => $validatedData['content'], 
            'author' => $validatedData['author'],
            'created_at' => now()->toISOString() // Current timestamp
        ];

        // Return JSON response with created post
        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => $newPost
        ], 201); // 201 Created status code
    }
}
