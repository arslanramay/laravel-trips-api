<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\WeatherPreferenceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::get('/', function () {
    return "Hello Trips API";
});


//Route::middleware('auth:sanctum')->group(function () {
    Route::post('/preferences', [WeatherPreferenceController::class, 'store']);
    Route::get('/preferences', [WeatherPreferenceController::class, 'show']);

    Route::get('/cities', [CityController::class, 'index']);

    Route::post('/trips', [TripController::class, 'store']);
    Route::get('/trips', [TripController::class, 'index']);
//});

// Weather APIs Routes [OpenWeather & AccuWeather]
Route::get('/weather', [WeatherController::class, 'getWeather']);
