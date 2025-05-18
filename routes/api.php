<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    ScenarioApiController,
    StepApiController,
    OptionApiController,
    AuthController
};

// Test public
Route::get('/test', fn () => response()->json([
    'status' => 'success',
    'message' => 'API is operational',
    'timestamp' => now()->toDateTimeString()
]));

// Auth publique
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// TEMPORAIRE pour test
Route::get('/scenarios', [ScenarioApiController::class, 'index']);


// Routes protégées avec Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    //Route::apiResource('scenarios', ScenarioApiController::class);
    Route::apiResource('scenarios.steps', StepApiController::class)->shallow();
    Route::apiResource('steps.options', OptionApiController::class)->shallow();
    Route::get('/scenarios/{scenario}/full', [ScenarioApiController::class, 'showWithRelations']);
});