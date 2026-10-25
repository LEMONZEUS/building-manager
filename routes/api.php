<?php

use App\Http\Controllers\Api\BuildingApiController;
use Illuminate\Support\Facades\Route;

Route::get('/buildings', [BuildingApiController::class, 'index']);
Route::get('/buildings/{building}', [BuildingApiController::class, 'show']);

Route::post('/buildings', [BuildingApiController::class, 'store'])
    ->middleware('auth:sanctum');