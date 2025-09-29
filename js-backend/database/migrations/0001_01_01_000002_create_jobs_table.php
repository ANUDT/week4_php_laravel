<?php

use Illuminate\Database\Migrations\Migration;   // Import the Migration class to create and manage database migrations.       
use Illuminate\Database\Schema\Blueprint;   // Import the Blueprint class to define the structure of database tables.
use Illuminate\Support\Facades\Schema;  // Import the Schema facade to interact with the database schema.

return new class extends Migration  // Define an anonymous class that extends the Migration class.
{
    /**
     * Run the migrations.
     */
    public function up(): void  // Define the up method to create the necessary database tables.
    {
        Schema::create('jobs', function (Blueprint $table) {        // Create the "jobs" table with the specified columns.
            $table->id();                         // Primary key column for the job ID.
            $table->string('queue')->index();   // Column to store the queue name, indexed for faster queries.
            $table->longText('payload');        // Column to store the job payload (data).
            $table->unsignedTinyInteger('attempts');        // Column to store the number of attempts made to process the job.
            $table->unsignedInteger('reserved_at')->nullable();  // Column to store the timestamp when the job was reserved, nullable.
            $table->unsignedInteger('available_at');        // Column to store the timestamp when the job becomes available for processing.
            $table->unsignedInteger('created_at');      // Column to store the timestamp when the job was created.
        });

        Schema::create('job_batches', function (Blueprint $table) {     // Create the "job_batches" table with the specified columns.
            $table->string('id')->primary();        // Primary key column for the batch ID.
            $table->string('name');       // Column to store the name of the job batch.
            $table->integer('total_jobs');        // Column to store the total number of jobs in the batch.
            $table->integer('pending_jobs');      // Column to store the number of pending jobs in the batch.
            $table->integer('failed_jobs');       // Column to store the number of failed jobs in the batch.
            $table->longText('failed_job_ids');   // Column to store the IDs of failed jobs in the batch.
            $table->mediumText('options')->nullable();  // Column to store additional options for the job batch, nullable.  
            $table->integer('cancelled_at')->nullable();    // Column to store the timestamp when the batch was cancelled, nullable.
            $table->integer('created_at');      // Column to store the timestamp when the batch was created.
            $table->integer('finished_at')->nullable();  // Column to store the timestamp when the batch was finished, nullable.
        });

        Schema::create('failed_jobs', function (Blueprint $table) {     // Create the "failed_jobs" table with the specified columns.
            $table->id();                      // Primary key column for the failed job ID. 
            $table->string('uuid')->unique();   // Unique column to store the UUID of the failed job.
            $table->text('connection');  // Column to store the connection name where the job was executed.
            $table->text('queue');  // Column to store the queue name where the job was executed.
            $table->longText('payload');    // Column to store the job payload (data) of the failed job.
            $table->longText('exception');      // Column to store the exception message or stack trace of the failure.
            $table->timestamp('failed_at')->useCurrent();   // Column to store the timestamp when the job failed, defaulting to the current timestamp.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');       // Drop the "jobs" table if it exists.
        Schema::dropIfExists('job_batches');        // Drop the "job_batches" table if it exists.
        Schema::dropIfExists('failed_jobs');       // Drop the "failed_jobs" table if it exists.
    }
};
