<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller {


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        $request->validate([
            'city_id'       => 'required|exists:cities,id',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after:start_date',
        ]);

        $trip = Trip::create(array_merge($request->all(), ['user_id' => Auth::id()]));

        return response()->json($trip);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        return response()->json(Auth::user()->trips);
    }
}

