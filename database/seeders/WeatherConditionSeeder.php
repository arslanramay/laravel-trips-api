<?php

namespace Database\Seeders;

use App\Models\WeatherCondition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeatherConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //    public function run(): void
    //    {
    //        //
    //    }

    public function run()
    {
        //        $weatherData = [
        //            ['city_id' => 1, 'month' => 'June', 'avg_temp' => 25, 'humidity' => 60, 'precipitation' => 10], // New York
        //            ['city_id' => 2, 'month' => 'June', 'avg_temp' => 18, 'humidity' => 65, 'precipitation' => 15], // Paris
        //            ['city_id' => 3, 'month' => 'June', 'avg_temp' => 30, 'humidity' => 70, 'precipitation' => 5], // Tokyo
        //            ['city_id' => 4, 'month' => 'June', 'avg_temp' => 22, 'humidity' => 55, 'precipitation' => 20], // Sydney
        //            ['city_id' => 5, 'month' => 'June', 'avg_temp' => 28, 'humidity' => 50, 'precipitation' => 8], // Cape Town
        //        ];

        //        foreach ($weatherData as $data) {
        //            WeatherCondition::create($data);
        //        }

        // Generate 100 records dynamically
        for ($i = 6; $i <= 100; $i++) {
            $weatherData[] = [
                'city_id' => rand(1, 5), // Assuming 20 cities exist
                'month' => ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'][array_rand(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])],
                'avg_temp' => rand(10, 45),
                'humidity' => rand(40, 80),
                'precipitation' => rand(0, 30),
            ];
        }

        DB::table('weather_conditions')->insert($weatherData);
    }
}
