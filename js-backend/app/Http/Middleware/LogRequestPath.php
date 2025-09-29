<?php

namespace App\Http\Middleware;

/*
|--------------------------------------------------------------------------
| LogRequestPath Middleware
|--------------------------------------------------------------------------
|
| This custom middleware logs the path of every HTTP request that passes
| through it. This is useful for:
| 
| - Debugging and monitoring application usage
| - Understanding user navigation patterns  
| - Tracking API endpoint usage
| - Security monitoring and audit trails
| - Performance analysis and optimization
|
| The middleware is registered in bootstrap/app.php with the alias 'log.path'
| and can be applied to individual routes or route groups.
|
*/

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * LogRequestPath Middleware
 * 
 * Logs the request path for monitoring and debugging purposes.
 * This middleware demonstrates how to create custom middleware in Laravel 11.
 */
class LogRequestPath
{
    /**
     * Handle an incoming request.
     *
     * This method is called for every request that passes through this middleware.
     * It logs the request path and then passes the request to the next middleware
     * or controller in the pipeline.
     *
     * @param Request $request The incoming HTTP request object
     * @param Closure $next The next middleware or controller in the pipeline
     * @return mixed The response from the next middleware/controller
     */
    public function handle(Request $request, Closure $next)
    {
        // Log the request path with additional context for better debugging
        Log::info('REQUEST PATH LOGGED', [
            'path' => $request->path(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'timestamp' => now()->toDateTimeString()
        ]);

        // Pass the request to the next middleware or controller
        // This is crucial - without this, the request pipeline would break
        return $next($request);
    }
}

/*
|--------------------------------------------------------------------------
| Usage Examples
|--------------------------------------------------------------------------
|
| 1. Apply to specific routes:
|    Route::get('/dashboard', [DashboardController::class, 'index'])
|         ->middleware('log.path');
|
| 2. Apply to route groups:
|    Route::middleware(['log.path'])->group(function () {
|        Route::get('/posts', [PostController::class, 'index']);
|        Route::post('/posts', [PostController::class, 'store']);
|    });
|
| 3. Apply globally (in bootstrap/app.php):
|    $middleware->append(\App\Http\Middleware\LogRequestPath::class);
|
| 4. Apply to all API routes:
|    $middleware->appendToGroup('api', \App\Http\Middleware\LogRequestPath::class);
|
| 5. Check logs:
|    - View logs in: storage/logs/laravel.log
|    - Use: tail -f storage/logs/laravel.log (on Unix systems)
|    - Use: Get-Content storage/logs/laravel.log -Tail 10 -Wait (on PowerShell)
|
*/

