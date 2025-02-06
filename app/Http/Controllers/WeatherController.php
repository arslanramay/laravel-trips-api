<?php

namespace App\Http\Controllers;

use App\Services\AccuWeatherService;
use App\Services\OpenWeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected OpenWeatherService $openWeatherService;

    protected AccuWeatherService $accuWeatherService;

    public function __construct(OpenWeatherService $openWeatherService, AccuWeatherService $accuWeatherService)
    {
        $this->openWeatherService = $openWeatherService;
        $this->accuWeatherService = $accuWeatherService;
    }

    /**
     * Fetch weather data based on city name.
     */
    public function getWeather(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
        ]);
        //        dd($request->all());

        $city = $request->city;
        $region = $this->detectRegion($city);
        //        dd($region);

        if ($region === 'Africa' || $region === 'Southeast Asia') {
            $weather = $this->accuWeatherService->getWeatherByCity($city);
        } else {
            $weather = $this->openWeatherService->getWeatherByCity($city);
        }

        return $weather ? response()->json($weather) : response()->json(['message' => 'City not found'], 404);
    }

    /**
     * Detects if a city belongs to Africa or Southeast Asia.
     */
    private function detectRegion(string $city): string
    {
        $africa = ['Cairo', 'Lagos', 'Nairobi', 'Cape Town'];
        $southeastAsia = ['Bangkok', 'Jakarta', 'Manila', 'Kuala Lumpur'];

        if (in_array($city, $africa)) {
            return 'Africa';
        } elseif (in_array($city, $southeastAsia)) {
            return 'Southeast Asia';
        }

        return 'Global';
    }
}
