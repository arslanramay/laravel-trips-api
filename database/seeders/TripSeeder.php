<?php

namespace Database\Seeders;

use App\Models\Trip;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Trip::create([
            'user_id' => 1, // Tom
            'city_id' => 1, // New York
            'start_date' => '2025-06-10',
            'end_date' => '2025-06-20',
        ]);

        Trip::create([
            'user_id' => 2, // Anna
            'city_id' => 2, // Paris
            'start_date' => '2025-07-05',
            'end_date' => '2025-07-15',
        ]);

        Trip::create([
            'user_id' => 3, // Paul
            'city_id' => 3, // Tokyo
            'start_date' => '2025-08-01',
            'end_date' => '2025-08-10',
        ]);
    }
}
