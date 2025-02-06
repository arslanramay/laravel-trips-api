<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
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
        City::create(['name' => 'New York', 'country' => 'USA', 'latitude' => 40.7128, 'longitude' => -74.0060]);
        City::create(['name' => 'Paris', 'country' => 'France', 'latitude' => 48.8566, 'longitude' => 2.3522]);
        City::create(['name' => 'Tokyo', 'country' => 'Japan', 'latitude' => 35.6895, 'longitude' => 139.6917]);
        City::create(['name' => 'Sydney', 'country' => 'Australia', 'latitude' => -33.8688, 'longitude' => 151.2093]);
        City::create(['name' => 'Cape Town', 'country' => 'South Africa', 'latitude' => -33.9249, 'longitude' => 18.4241]);
    }
}
