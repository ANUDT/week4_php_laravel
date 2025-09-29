<?php

namespace App\Http\Middleware; // Define the namespace for the middleware.
// This places the middleware in the "App\Http\Middleware" namespace,
// which is a common convention for middleware in Laravel applications.

use Closure; // Import the Closure class to type-hint the next middleware.
use Illuminate\Http\Request; // Import the Request class to handle HTTP requests.
use Illuminate\Support\Facades\Log; // Import the Log facade to log messages.

class LogRequestPath // Define the LogRequestPath middleware class.
{
    public function handle(Request $request, Closure $next) // Define the handle method that processes the incoming request.
    {
        Log::info('PATH: '.$request->path()); // Log the request path using the Log facade.
        return $next($request); // Pass the request to the next middleware or controller.
    }
}

