<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    /**
     * Store Trip(s) in the database
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'cities' => 'required|array',
            'cities.*.city_id' => 'required|exists:cities,id',
            'cities.*.start_date' => 'required|date',
            'cities.*.end_date' => 'required|date|after:cities.*.start_date',
        ]);

        foreach ($request->cities as $trip) {
            Trip::create([
                'user_id' => Auth::id(),
                'city_id' => $trip['city_id'],
                'start_date' => $trip['start_date'],
                'end_date' => $trip['end_date'],
            ]);
        }

        return response()->json(['message' => 'Trips stored successfully']);
    }

    /**
     * List all the Trips for an Authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $trips = Trip::where('user_id', Auth::id())
            ->with('city')
            ->get()
            ->map(function ($trip) {
                return [
                    'id' => $trip->id,
                    'city' => $trip->city->name,
                    'country' => $trip->city->country,
                    'start_date' => $trip->start_date,
                    'end_date' => $trip->end_date,
                ];
            });

        // return response()->json(Auth::user()->trips);
        return response()->json($trips);
    }
}
