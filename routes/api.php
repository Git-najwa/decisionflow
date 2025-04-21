<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScenarioApiController;
use App\Http\Controllers\Api\StepApiController;

// Routes API REST pour Scenario
Route::apiResource('scenarios', ScenarioApiController::class);

// Routes API REST pour Steps
Route::apiResource('steps', StepApiController::class);