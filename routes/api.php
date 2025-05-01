<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScenarioApiController;
use App\Http\Controllers\Api\StepApiController;
use App\Http\Controllers\Api\OptionApiController;
use App\Http\Controllers\Api\AuthController;



// Routes API REST pour Scenario
Route::apiResource('scenarios', ScenarioApiController::class);

// Routes API REST pour Steps
Route::apiResource('steps', StepApiController::class);

// Routes API REST pour Options
Route::apiResource('options', OptionApiController::class);


// Routes pour authentification
    // Routes publiques
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

    // Routes protégées par Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('scenarios', ScenarioApiController::class);
    Route::apiResource('steps', StepApiController::class);
    Route::apiResource('options', OptionApiController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});
