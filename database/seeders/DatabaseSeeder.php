<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Spbu;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Spbu::factory()->create([
        'name' => 'Pertamina Bekasi',
        'road' => 'Jl. Galaxy',
        'city' => 'Bekasi Selatan',
        'province' => 'Bekasi',
        'island' => 'Jawa Barat',
        ]);
        Spbu::factory(1)->create();
    }
}
