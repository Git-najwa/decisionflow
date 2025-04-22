<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScenarioApiController;
use App\Http\Controllers\Api\StepApiController;
use App\Http\Controllers\Api\OptionApiController;


// Routes API REST pour Scenario
Route::apiResource('scenarios', ScenarioApiController::class);

// Routes API REST pour Steps
Route::apiResource('steps', StepApiController::class);

// Routes API REST pour Options
Route::apiResource('options', OptionApiController::class);