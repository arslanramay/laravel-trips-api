<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Tom Thomas',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Anna Harper',
            'email' => 'anna@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Paul Smith',
            'email' => 'paul@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
