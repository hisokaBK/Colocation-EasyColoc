<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
         $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'on_colocation' => \App\Http\Middleware\UserOntColocation::class,
        'owner' => \App\Http\Middleware\IsOwner::class,
        'colocation.active' => \App\Http\Middleware\CheckColocationActive::class,
        'invitation' => \App\Http\Middleware\HandleInvitationToken::class,


    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
