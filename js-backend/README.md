# Week 4 PHP Laravel Project

This is a **Laravel 11** educational project focusing on modern web development concepts including:
- RESTful API design
- Middleware implementation
- Route organization (Web vs API)
- Request logging and debugging

## Project Features

### Core Functionality
- **Post Management System**: Create and list posts via both web and API routes
- **Request Path Logging**: Custom middleware that logs every request path for debugging
- **Dual Route Structure**: Separate web and API endpoints for different use cases

### Technical Highlights
-  **Laravel 11**: Uses the latest Laravel framework with modern file structure
-  **Custom Middleware**: LogRequestPath middleware for request monitoring  
-  **API & Web Routes**: Demonstrates different routing approaches
-  **JSON Responses**: API endpoints return structured JSON data
-  **Input Validation**: Request validation for data integrity

##  Project Structure

This project follows Laravel 11's streamlined structure:
- `bootstrap/app.php` - Application configuration (replaces Kernel.php)
- `routes/web.php` - Web routes (with CSRF protection)
- `routes/api.php` - API routes (stateless, no CSRF)
- `app/Http/Controllers/` - Web controllers
- `app/Http/Controllers/Api/` - API controllers  
- `app/Http/Middleware/` - Custom middleware

##  Setup Instructions #        

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js (for frontend assets)

### Installation Steps
1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd js-backend
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Set up environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

## API Endpoints

### Web Routes (CSRF Protected)
- `GET /` - Welcome page
- `GET /posts` - List all posts (HTML/JSON)
- `POST /posts` - Create new post (requires CSRF token)

### API Routes (Stateless)
- `GET /api/posts` - List all posts (JSON only)
- `POST /api/posts` - Create new post (no CSRF required)

##  Middleware Usage

The project includes a custom `LogRequestPath` middleware that logs every request path:

```php
// Apply to specific routes
Route::get('/example', function () {
    return 'Hello World';
})->middleware('log.path');

// Apply to route groups
Route::middleware(['log.path'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
```

##  Learning Resources

### Laravel 11 Key Changes
- **No `app/Http/Kernel.php`**: Middleware registration moved to `bootstrap/app.php`
- **Simplified routing**: Streamlined route file structure
- **Enhanced configuration**: More intuitive application setup

### Recommended Learning
- [Laravel 11 Documentation](https://laravel.com/docs/11.x)
- [Laravel Bootcamp](https://bootcamp.laravel.com)
- [API Development with Laravel](https://laravel.com/docs/11.x/controllers#api-controllers)

##  Testing

Run the test suite:
```bash
php artisan test
```

##  Development Notes

### Code Style
- Follow PSR-12 coding standards
- Use descriptive variable and method names
- Comment complex business logic
- Keep controllers thin, move logic to services when needed

### Debugging
- Check `storage/logs/laravel.log` for request path logs
- Use `php artisan tinker` for interactive debugging
- Enable debug mode in `.env` for detailed error pages

---

**Note**: This is an educational project for learning Laravel 11 concepts. It demonstrates modern PHP web development practices and Laravel's latest features.
