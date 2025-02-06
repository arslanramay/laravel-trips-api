<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\WeatherPreferenceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//    return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', function () {
    return 'Hello Trips API';
});

// =============================================
// Public Routes
// =============================================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// =============================================
// Protected Routes - Laravel Sanctum
// =============================================
Route::middleware('auth:sanctum')->group(function () {
    // Weather Preferences
    Route::post('/preferences', [WeatherPreferenceController::class, 'store']);
    Route::get('/preferences', [WeatherPreferenceController::class, 'show']);

    // Cities
    //    Route::get('/cities', [CityController::class, 'index']);
    Route::get('/cities', [CityController::class, 'getCitiesByWeather']);

    // Trips
    Route::post('/trips', [TripController::class, 'store']);
    Route::get('/trips', [TripController::class, 'index']);
});

// =============================================
// TEST Routes - Local
// =============================================
// Weather APIs Routes [OpenWeather & AccuWeather]
Route::get('/weather', [WeatherController::class, 'getWeather']);

// Route::get('/cities', [CityController::class, 'getCitiesByWeather']);
