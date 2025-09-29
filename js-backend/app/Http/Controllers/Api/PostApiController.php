<?php

namespace App\Http\Controllers\Api; // Define the namespace for the controller.
// This places the controller in the "App\Http\Controllers\Api" namespace,
// which is a common convention for API controllers in Laravel applications.

use App\Http\Controllers\Controller; // Import the base Controller class from the application.
use Illuminate\Http\Request; // Import the Request class to handle HTTP requests.

class PostApiController extends Controller // Define the PostApiController class that extends the base Controller class.
{
    public function index(Request $request)
    {
        // Handle GET requests to "/api/posts"
    }

    public function store(Request $request)
    {
        // Handle POST requests to "/api/posts"
    }
}
