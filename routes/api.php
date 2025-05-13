<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    ScenarioApiController,
    StepApiController,
    OptionApiController,
    AuthController
};

// Test endpoint (public)
Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API is operational',
        'timestamp' => now()->toDateTimeString()
    ]);
});

// Authentication (public)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Resources
    Route::apiResource('scenarios', ScenarioApiController::class);
    Route::apiResource('scenarios.steps', StepApiController::class)->shallow();
    Route::apiResource('steps.options', OptionApiController::class)->shallow();
    
    // Custom endpoints
    Route::get('/scenarios/{scenario}/full', [ScenarioApiController::class, 'showWithRelations']);
});