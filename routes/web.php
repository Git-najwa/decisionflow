<?php

use Illuminate\Support\Facades\Route;

// Toutes les requêtes frontend Vue sont redirigées ici
Route::get('/{any}', fn () => view('welcome'))
    ->where('any', '^(?!api/).*'); // Exclut les routes commençant par /api
