<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait to enable factory methods for the model.
use Illuminate\Foundation\Auth\User as Authenticatable; // Import the Authenticatable class to provide authentication features.
use Illuminate\Notifications\Notifiable; // Import the Notifiable trait to enable notification features for the model.

class User extends Authenticatable // Define the User model class that extends the Authenticatable class.
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable; // Use the HasFactory and Notifiable traits in the User model.

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string> // Specify the attributes that can be mass assigned.
     */
    protected $fillable = [ /// Attributes that can be mass assigned.
        'name', //  User's name
        'email', // User's email address
        'password', // User's password
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string> // Specify the attributes that should be hidden when the model is serialized.
     */
    protected $hidden = [ // Attributes that should be hidden for serialization.
        'password', // Hide the password attribute
        'remember_token', // Hide the remember_token attribute
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array //    Define the casts for model attributes.
    {
        return [
            'email_verified_at' => 'datetime', // Cast the email_verified_at attribute to a datetime object
            'password' => 'hashed', // Automatically hash the password attribute
        ];
    }
}
