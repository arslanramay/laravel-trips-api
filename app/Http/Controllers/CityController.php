<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\WeatherCondition;
use App\Services\AccuWeatherService;
use App\Services\OpenWeatherService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //    protected OpenWeatherService $openWeatherService;
    //    protected AccuWeatherService $accuWeatherService;

    //    public function __construct(OpenWeatherService $openWeatherService, AccuWeatherService $accuWeatherService) {
    //        $this->openWeatherService = $openWeatherService;
    //        $this->accuWeatherService = $accuWeatherService;
    //    }
    public function __construct()
    {
        //
    }

    /**
     * Get cities matching temperature criteria and time period.
     */
    public function getCitiesByWeather(Request $request)
    {
        $request->validate([
            'temp_min' => 'required|integer',
            'temp_max' => 'required|integer',
            'month' => 'required|string',
        ]);
        //        dd($request->all());

        $tempMin = $request->temp_min;
        $tempMax = $request->temp_max;
        $months = explode('-', ucfirst(strtolower($request->month)));

        // Fetch Cities list based on specified Weather Conditions
        $matchedCities = WeatherCondition::whereBetween('avg_temp', [$tempMin, $tempMax])
            ->whereIn('month', $months)
            ->with('city')
            ->get()
            ->map(function ($condition) {
                return [
                    'name' => $condition->city->name,
                    'country' => $condition->city->country,
                    'temperature' => $condition->avg_temp,
                    'humidity' => $condition->humidity,
                    'precipitation' => $condition->precipitation,
                ];
            });

        //        dd($matchedCities);

        return response()->json($matchedCities);
    }

    /**
     * Get cities matching temperature criteria.
     *
     * TODO: Fix OpenWeather API issue
     */
    public function getCitiesByWeather222(Request $request)
    {
        $request->validate([
            'temp_min' => 'required|integer',
            'temp_max' => 'required|integer',
            'month' => 'required|string',
        ]);

        $tempMin = $request->temp_min;
        $tempMax = $request->temp_max;
        $month = ucfirst(strtolower($request->month));

        $allCities = City::all();
        $citiesAfricaAsia = $allCities->whereIn('name', ['Cairo', 'Lagos', 'Nairobi', 'Bangkok', 'Jakarta']);
        $citiesGlobal = $allCities->whereNotIn('name', ['Cairo', 'Lagos', 'Nairobi', 'Bangkok', 'Jakarta']);

        $weatherGlobal = $this->openWeatherService->getCitiesWeather($citiesGlobal->all(), $month, $tempMin, $tempMax);
        $weatherAfricaAsia = $this->accuWeatherService->getCitiesWeather($citiesAfricaAsia->all(), $month, $tempMin, $tempMax);

        return response()->json(array_merge($weatherGlobal, $weatherAfricaAsia));
    }
}
