<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScenarioApiController;

// Routes API REST pour Scenario
Route::apiResource('scenarios', ScenarioApiController::class);
