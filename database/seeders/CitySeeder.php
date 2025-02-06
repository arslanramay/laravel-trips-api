<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder {
    public function run() {
        $cities = [
            ['name' => 'New York', 'country' => 'USA', 'latitude' => 40.7128, 'longitude' => -74.0060],
            ['name' => 'Paris', 'country' => 'France', 'latitude' => 48.8566, 'longitude' => 2.3522],
            ['name' => 'Tokyo', 'country' => 'Japan', 'latitude' => 35.6895, 'longitude' => 139.6917],
            ['name' => 'Sydney', 'country' => 'Australia', 'latitude' => -33.8688, 'longitude' => 151.2093],
            ['name' => 'Cape Town', 'country' => 'South Africa', 'latitude' => -33.9249, 'longitude' => 18.4241],
            ['name' => 'Toronto', 'country' => 'Canada', 'latitude' => 43.651070, 'longitude' => -79.347015],
            ['name' => 'Rio de Janeiro', 'country' => 'Brazil', 'latitude' => -22.9068, 'longitude' => -43.1729],
            ['name' => 'Moscow', 'country' => 'Russia', 'latitude' => 55.7558, 'longitude' => 37.6173],
            ['name' => 'Beijing', 'country' => 'China', 'latitude' => 39.9042, 'longitude' => 116.4074],
            ['name' => 'Dubai', 'country' => 'UAE', 'latitude' => 25.276987, 'longitude' => 55.296249],
            ['name' => 'Mumbai', 'country' => 'India', 'latitude' => 19.0760, 'longitude' => 72.8777],
            ['name' => 'Mexico City', 'country' => 'Mexico', 'latitude' => 19.4326, 'longitude' => -99.1332],
            ['name' => 'Rome', 'country' => 'Italy', 'latitude' => 41.9028, 'longitude' => 12.4964],
            ['name' => 'Seoul', 'country' => 'South Korea', 'latitude' => 37.5665, 'longitude' => 126.9780],
            ['name' => 'Singapore', 'country' => 'Singapore', 'latitude' => 1.3521, 'longitude' => 103.8198],
            ['name' => 'Buenos Aires', 'country' => 'Argentina', 'latitude' => -34.6037, 'longitude' => -58.3816],
            ['name' => 'Nairobi', 'country' => 'Kenya', 'latitude' => -1.286389, 'longitude' => 36.817223],
            ['name' => 'Berlin', 'country' => 'Germany', 'latitude' => 52.5200, 'longitude' => 13.4050],
            ['name' => 'Jakarta', 'country' => 'Indonesia', 'latitude' => -6.2088, 'longitude' => 106.8456],
            ['name' => 'Bangkok', 'country' => 'Thailand', 'latitude' => 13.7563, 'longitude' => 100.5018],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
