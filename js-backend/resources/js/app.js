import './bootstrap';   // Import the bootstrap file to set up the application environment.
import '../css/app.css';  // Import the main CSS file for styling.
import 'alpinejs';       // Import Alpine.js for reactive and declarative UI components.
import 'flowbite';      // Import Flowbite for additional UI components and utilities.
// Note: The above imports assume that the necessary packages are installed via npm or yarn.
// You can add additional JavaScript code below to enhance your application's functionality.

// Example: Initialize a simple Alpine.js component
document.addEventListener('alpine:init', () => {    // Listen for the Alpine.js initialization event.
    Alpine.data('exampleComponent', () => ({ // Define a new Alpine.js component named 'exampleComponent'.
        message: 'Hello, Alpine.js!', // A reactive property to hold a message.
        
        count: 0, // A reactive property to hold a count value.
        increment() { // A method to increment the count.
            this.count++; // Increment the count property by 1.
        }
    }));
});

