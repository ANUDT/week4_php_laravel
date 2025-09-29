<?php

namespace Tests\Feature;    // Define the namespace for the test class.

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase; // Import the base TestCase class for feature tests.

class ExampleTest extends TestCase  // Define the ExampleTest class that extends the base TestCase class.
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void  //  Define a test method to check if the application returns a successful response.        
    {
        $response = $this->get('/');    // Send a GET request to the root URL of the application.

        $response->assertStatus(200);   // Assert that the response status is 200 (OK). 
    }
}
