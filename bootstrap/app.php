<?php

use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Debug\ExceptionHandler;

$app = new App\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);


/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    HttpKernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    ConsoleKernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Custom Middleware Aliases
|--------------------------------------------------------------------------
|
| Here, we dynamically register middleware aliases by extending the
| application instance with a method to define middleware aliases.
| This approach ensures the flexibility to add middleware dynamically.
|
*/

$app->withMiddleware(function ($middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'user' => \App\Http\Middleware\UserMiddleware::class,
        'clear_cookies' => \App\Http\Middleware\ClearCookies::class,
    ]);
});

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
