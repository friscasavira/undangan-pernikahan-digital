<?php


use App\Http\Middleware\Unauthorized;
use App\Http\Middleware\user;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'guest' => Unauthorized::class,
<<<<<<< HEAD
            'role' => user::class,
            
=======
            'admin' => admin::class,
            'user' => user::class,
>>>>>>> origin/main
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
