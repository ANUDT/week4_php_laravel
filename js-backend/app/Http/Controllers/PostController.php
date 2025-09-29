<?php

namespace App\Http\Controllers; // Define the namespace for the controller.
// This places the controller in the "App\Http\Controllers" namespace,
// which is a common convention for controllers in Laravel applications.

use Illuminate\Http\Request; // Import the Request class to handle HTTP requests.

class PostController extends Controller // Define the PostController class that extends the base Controller class.
{
    public function index() // list posts (HTML or JSON)
    {
        // Example: return a view OR JSON
        $posts = [
            ['id' => 1, 'title' => 'First'], // normally from DB
            ['id' => 2, 'title' => 'Second'], // normally from DB
        ];

        // return view('posts.index', compact('posts'));
        return response()->json($posts); // quick demo for JS
    }

    public function store(Request $request) // create post (CSRF-protected)
    {
        $data = $request->validate([ // validate input
            'title' => ['required', 'string', 'max:255'], // title is required, must be a string, and max 255 chars
        ]);

        // Pretend we saved it…
        return response()->json([ // return JSON response
            'message' => 'Created',// success message
            'post' => ['id' => 3, 'title' => $data['title']],// normally from DB
        ], 201);// 201 Created
    }
}