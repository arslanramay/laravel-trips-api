<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (Requires Authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'userProfile']);
});

// API Routes
//Route::middleware('auth:sanctum')->group(function () {
//    Route::post('/preferences', [WeatherPreferenceController::class, 'store']);
//    Route::get('/preferences', [WeatherPreferenceController::class, 'show']);
//
//    Route::get('/cities', [CityController::class, 'index']);
//
//    Route::post('/trips', [TripController::class, 'store']);
//    Route::get('/trips', [TripController::class, 'index']);
//});
