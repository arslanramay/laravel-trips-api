<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller {

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
//    public function index(Request $request) {
//        $cities = City::whereHas('weatherConditions', function ($query) use ($request) {
//            $query->whereBetween('avg_temp', [$request->temp_min, $request->temp_max]);
//        })->get();
//
//        return response()->json($cities);
//    }

    public function index() {
        return $cities = City::all();
    }
}
