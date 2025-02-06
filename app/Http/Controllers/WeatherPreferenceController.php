<?php

namespace App\Http\Controllers;

use App\Models\WeatherPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeatherPreferenceController extends Controller
{
    public function index() {}

    public function store(Request $request)
    {
        $request->validate([
            'temp_min' => 'required|integer',
            'temp_max' => 'required|integer',
        ]);

        $preference = WeatherPreference::updateOrCreate(
            ['user_id' => Auth::id()],
            ['temp_min' => $request->temp_min, 'temp_max' => $request->temp_max]
        );

        return response()->json($preference);
    }

    public function show()
    {
        return response()->json(Auth::user()->weatherPreference);
    }
}
