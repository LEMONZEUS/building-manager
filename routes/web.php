<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\MaintenanceRequestController;
use App\Http\Middleware\AdminOnly;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Public: anyone can see these
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Admin only (must come BEFORE /buildings/{building})
Route::middleware(['auth', AdminOnly::class])->group(function () {
    Route::get('/buildings/create', [BuildingController::class, 'create']);
    Route::post('/buildings', [BuildingController::class, 'store']);
    Route::get('/buildings/{building}/edit', [BuildingController::class, 'edit']);
    Route::put('/buildings/{building}', [BuildingController::class, 'update']);
    Route::delete('/buildings/{building}', [BuildingController::class, 'destroy']);
    Route::patch('/requests/{maintenanceRequest}/resolve', [MaintenanceRequestController::class, 'resolve']);
});

// Any logged-in user
Route::middleware('auth')->group(function () {
    Route::get('/buildings', [BuildingController::class, 'index']);
    Route::get('/buildings-live', function () {
        return view('buildings-live');
    });
    Route::get('/buildings/{building}', [BuildingController::class, 'show']);
    Route::post('/buildings/{building}/requests', [MaintenanceRequestController::class, 'store']);
});