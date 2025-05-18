<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Aucune route API ici - Tout est déplacé dans api.php