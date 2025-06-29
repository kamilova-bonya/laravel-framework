<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
<<<<<<< HEAD
use App\Http\Middleware\CheckIsAdmin;
=======
>>>>>>> b72420539c83ec3c7c874ed3047368a0a558a994

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
<<<<<<< HEAD
        $middleware->appendToGroup('isAdmin', [
            CheckIsAdmin::class,
        ]);

=======
        //
>>>>>>> b72420539c83ec3c7c874ed3047368a0a558a994
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
