<?php

namespace App\Providers; // Define the namespace for the service provider.
// This places the service provider in the "App\Providers" namespace,
// which is a common convention for service providers in Laravel applications.

use Illuminate\Support\ServiceProvider; // Import the base ServiceProvider class from the Laravel framework.

class AppServiceProvider extends ServiceProvider // Define the AppServiceProvider class that extends the base ServiceProvider class.
{
    /**
     * Register any application services.
     */
    public function register(): void // Define the register method to register application services.
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void // Define the boot method to bootstrap application services.
    {
        //
    }
}
