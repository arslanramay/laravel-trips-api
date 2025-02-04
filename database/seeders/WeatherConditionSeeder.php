<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WeatherCondition;

class WeatherConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
//    public function run(): void
//    {
//        //
//    }

    public function run() {
        $weatherData = [
            ['city_id' => 1, 'month' => 'June', 'avg_temp' => 25, 'humidity' => 60, 'precipitation' => 10], // New York
            ['city_id' => 2, 'month' => 'June', 'avg_temp' => 18, 'humidity' => 65, 'precipitation' => 15], // Paris
            ['city_id' => 3, 'month' => 'June', 'avg_temp' => 30, 'humidity' => 70, 'precipitation' => 5], // Tokyo
            ['city_id' => 4, 'month' => 'June', 'avg_temp' => 22, 'humidity' => 55, 'precipitation' => 20], // Sydney
            ['city_id' => 5, 'month' => 'June', 'avg_temp' => 28, 'humidity' => 50, 'precipitation' => 8], // Cape Town
        ];

        foreach ($weatherData as $data) {
            WeatherCondition::create($data);
        }
    }
}
