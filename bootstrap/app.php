<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RedirectIfClinicUnauthenticated;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            // ✅ Admin routes live here
            \Illuminate\Support\Facades\Route::prefix('admin')
                ->middleware('web')
                ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'clinic.auth' => RedirectIfClinicUnauthenticated::class,
            // later we will add: 'admin.auth' => ...
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();