<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException; // Important: Add this use statement
use Illuminate\Support\Facades\Log; // Important: Add this use statement if you want to use Log::error

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// Handle the incoming request and send the response
try {
    $response = $app->handle(
        $request = Request::capture()
    );

    $response->send();
} catch (Throwable $e) {
    // Report the exception to Laravel's error reporting system
    report($e);

    // Log the error message (ensure Log facade is imported)
    Log::error('An error occurred during request handling: ' . $e->getMessage());

    // Render an appropriate error page based on the exception type
    if ($e instanceof HttpException) {
        $statusCode = $e->getStatusCode();
        $errorView = 'errors.' . $statusCode;
        if (view()->exists($errorView)) { // Check if the specific error view exists
            $response = response()->view($errorView, [], $statusCode);
        } else {
            $response = response()->view('errors.500', [], 500); // Fallback to 500
        }
    } else {
        $response = response()->view('errors.500', [], 500);
    }

    $response->send();
}