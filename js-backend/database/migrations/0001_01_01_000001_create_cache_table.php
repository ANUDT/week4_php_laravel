<?php

use Illuminate\Database\Migrations\Migration; // Import the Migration class to create and manage database migrations.
use Illuminate\Database\Schema\Blueprint;   // Import the Blueprint class to define the structure of database tables.
use Illuminate\Support\Facades\Schema;  // Import the Schema facade to interact with the database schema.

return new class extends Migration  // Define an anonymous class that extends the Migration class.
{
    /**
     * Run the migrations.
     */
    public function up(): void  // Define the up method to create the necessary database tables.
    {
        Schema::create('cache', function (Blueprint $table) {   // Create the "cache" table with the specified columns.
            $table->string('key')->primary();   // Primary key column for the cache key.
            $table->mediumText('value');    // Column to store the cache value.
            $table->integer('expiration');  // Column to store the expiration time of the cache entry.
        });

        Schema::create('cache_locks', function (Blueprint $table) {  // Create the "cache_locks" table with the specified columns.
            $table->string('key')->primary();   // Primary key column for the cache lock key.
            $table->string('owner');   // Column to store the owner of the cache lock.
            $table->integer('expiration');   // Column to store the expiration time of the cache lock.  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void        // Define the down method to drop the created database tables.
    {
        Schema::dropIfExists('cache');  // Drop the "cache" table if it exists.          
        Schema::dropIfExists('cache_locks');        // Drop the "cache_locks" table if it exists.
    }
};
