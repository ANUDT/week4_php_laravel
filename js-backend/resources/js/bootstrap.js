import axios from 'axios';  // Import the Axios library for making HTTP requests.
window.axios = axios;       // Assign Axios to the global window object for easy access throughout the application.

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';    // Set a default header for all Axios requests to indicate they are AJAX requests.

// You can add additional bootstrap configurations or global setups here as needed.
