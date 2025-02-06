<?php

namespace Database\Seeders;

use App\Models\WeatherPreference;
use Illuminate\Database\Seeder;

class WeatherPreferenceSeeder extends Seeder
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
        WeatherPreference::create([
            'user_id' => 1, // John Doe
            'temp_min' => 10,
            'temp_max' => 25,
        ]);

        WeatherPreference::create([
            'user_id' => 2, // Anna Smith
            'temp_min' => 20,
            'temp_max' => 30,
        ]);

        WeatherPreference::create([
            'user_id' => 3, // Tom Johnson
            'temp_min' => 15,
            'temp_max' => 28,
        ]);
    }
}
