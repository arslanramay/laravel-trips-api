<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenWeatherService
{
    protected string $apiKey;

    protected string $baseUrl = 'https://api.openweathermap.org/data/2.5/weather';

    public function __construct()
    {
        $this->apiKey = env('OPENWEATHER_API_KEY');
    }

    /**
     * Fetch weather data for a city by name
     */
    public function getWeatherByCity(string $city)
    {
        $response = Http::get($this->baseUrl, [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => 'metric',
        ]);

        return $response->successful() ? $response->json() : null;
    }
}
