<?php

namespace Database\Seeders;     // Define the namespace for the database seeders.

use App\Models\User;    // Import the User model to create user records in the database.
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder; // Import the base Seeder class from the Laravel framework.

class DatabaseSeeder extends Seeder // Define the DatabaseSeeder class that extends the base Seeder class.
{
    /**
     * Seed the application's database.
     */
    public function run(): void     // Define the run method to seed the database with initial data.
    {
        // User::factory(10)->create();

        User::factory()->create([   // Create a user with specific attributes using the User factory.
            'name' => 'Test User',  // Set the name attribute to "Test User".
            'email' => 'test@example.com',      // Set the email attribute to "
        ]);
    }
}
