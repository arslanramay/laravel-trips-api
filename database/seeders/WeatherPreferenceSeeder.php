<?php

namespace Database\Seeders;

use App\Models\WeatherPreference;
use Illuminate\Database\Seeder;

class WeatherPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WeatherPreference::create([
            'user_id' => 1, // Tom
            'temp_min' => 10,
            'temp_max' => 25,
        ]);

        WeatherPreference::create([
            'user_id' => 2, // Anna
            'temp_min' => 20,
            'temp_max' => 30,
        ]);

        WeatherPreference::create([
            'user_id' => 3, // Paul
            'temp_min' => 15,
            'temp_max' => 28,
        ]);
    }
}
