<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Http\Middleware\HandleCors;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Http\Middleware\Authenticate;

class Kernel extends HttpKernel
{
    /**
     * Middleware global
     */
    protected $middleware = [
        HandleCors::class,
        PreventRequestsDuringMaintenance::class,
    ];

    /**
     * Groupes de middleware
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class, // Ajout ici
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * Alias des middlewares
     */
    protected $routeMiddleware = [
        'auth' => Authenticate::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
