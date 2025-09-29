<?php
// Opening tag for PHP code. Required at the start of every PHP file.

use Illuminate\Foundation\Inspiring;   
// Import the "Inspiring" class from the Laravel framework.
// This class has a static method `quote()` that returns a random inspirational quote.

use Illuminate\Support\Facades\Artisan; 
// Import the Artisan facade. 
// Artisan is Laravel’s command-line interface (CLI) tool. 
// It allows you to register and run custom console commands.

Artisan::command('inspire', function () {
    // Define a new console command called "inspire".
    // This means you can now run: php artisan inspire

    $this->comment(Inspiring::quote());
    // `$this` refers to the current command context.
    // ->comment() outputs a line of text to the terminal (styled in yellow).
    // Inspiring::quote() generates a random inspirational quote.
})
->purpose('Display an inspiring quote');
// Add a description for the command ("Display an inspiring quote").
// This shows up when you run "php artisan list".

