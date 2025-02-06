<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AccuWeatherService
{
    protected string $apiKey;

    protected string $locationUrl = 'http://dataservice.accuweather.com/locations/v1/cities/search';

    protected string $weatherUrl = 'http://dataservice.accuweather.com/currentconditions/v1/';

    public function __construct()
    {
        $this->apiKey = env('ACCUWEATHER_API_KEY');
    }

    /**
     * Fetch AccuWeather location key by city name
     *
     * @return mixed|null
     */
    public function getLocationKey(string $city)
    {
        $response = Http::get($this->locationUrl, [
            'apikey' => $this->apiKey,
            'q' => $city,
        ]);

        return $response->successful() ? $response->json()[0]['Key'] ?? null : null;
    }

    /**
     * Fetch weather data using location key
     *
     * @return mixed|null
     */
    public function getWeatherByCity(string $city)
    {
        $locationKey = $this->getLocationKey($city);

        //        dd($city);

        if (! $locationKey) {
            return null;
        }

        $response = Http::get("{$this->weatherUrl}{$locationKey}", [
            'apikey' => $this->apiKey,
        ]);

        return $response->successful() ? $response->json()[0] : null;
    }
}
