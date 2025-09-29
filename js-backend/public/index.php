<?php

use Illuminate\Foundation\Application;  // Import the Application class from the Laravel framework.
use Illuminate\Http\Request;    // Import the Request class to handle HTTP requests.

define('LARAVEL_START', microtime(true));       // Define a constant to mark the start time of the application for performance measurement.

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {  // Check if the maintenance file exists.          
    require $maintenance;   // If it exists, require the maintenance file to handle maintenance mode.   
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';      // Load the Composer autoloader for dependencies.

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';// Bootstrap the Laravel application.

$app->handleRequest(Request::capture());// Capture the incoming HTTP request and pass it to the application for handling.
