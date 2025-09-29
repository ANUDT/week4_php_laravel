<?php

use Illuminate\Database\Migrations\Migration; // Import the Migration class to create and manage database migrations.
use Illuminate\Database\Schema\Blueprint; // Import the Blueprint class to define the structure of database tables.
use Illuminate\Support\Facades\Schema;// Import the Schema facade to interact with the database schema.

return new class extends Migration // Define an anonymous class that extends the Migration class.
{
    /**
     * Run the migrations.
     */
    public function up(): void // Define the up method to create the necessary database tables.
    {
        Schema::create('users', function (Blueprint $table) {// Create the "users" table with the specified columns.
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
