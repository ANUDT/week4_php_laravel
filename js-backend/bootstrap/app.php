<?php

use Illuminate\Foundation\Application; // Import the Application class from the Laravel framework.
use Illuminate\Foundation\Configuration\Exceptions; // Import the Exceptions class for handling exceptions.
use Illuminate\Foundation\Configuration\Middleware; // Import the Middleware class for configuring middleware.

return Application::configure(basePath: dirname(__DIR__)) // Configure the application with the base path set to the parent directory.
    ->withRouting( // Set up routing for the application.
        web: __DIR__.'/../routes/web.php', // Path to the web routes file.
        commands: __DIR__.'/../routes/console.php', // Path to the console routes file.
        health: '/up', // Health check endpoint.
    )
    ->withMiddleware(function (Middleware $middleware): void { // Configure middleware for the application.
        $middleware->alias([ // Define middleware aliases.
            'log.path' => \App\Http\Middleware\LogRequestPath::class, // Alias 'log.path' to the LogRequestPath middleware class.
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void { // Configure exception handling for the application.
        //
    })->create();
