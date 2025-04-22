<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Les routes à exclure de la vérification CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        'api/*',
    ];
}
