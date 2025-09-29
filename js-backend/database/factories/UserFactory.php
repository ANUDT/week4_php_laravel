<?php

namespace Database\Factories; // Define the namespace for the factory.
// This places the factory in the "Database\Factories" namespace.

use Illuminate\Database\Eloquent\Factories\Factory; // Import the base Factory class from the Laravel framework.
use Illuminate\Support\Facades\Hash; // Import the Hash facade to hash passwords.
use Illuminate\Support\Str; // Import the Str class to generate random strings.

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory // Define the UserFactory class that extends the base Factory class.
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password; // Static property to hold the hashed password.

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // Generate a fake name for the user.
            'email' => fake()->unique()->safeEmail(),// Generate a unique and safe fake email address for the user.
            'email_verified_at' => now(),// Set the email_verified_at attribute to the current timestamp.
            'password' => static::$password ??= Hash::make('password'),//   Hash and set a default password for the user.
            'remember_token' => Str::random(10),// Generate a random string of 10 characters for the remember_token attribute.
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static // Define the unverified state for the user model.
    {
        return $this->state(fn (array $attributes) => [ // Use a closure to define the state transformation.
            'email_verified_at' => null,// Set the email_verified_at attribute to null to indicate the email is unverified. 
        ]);
    }
}
