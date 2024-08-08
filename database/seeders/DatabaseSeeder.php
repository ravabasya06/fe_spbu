<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Spbu;
use App\Models\Dispenser;
use App\Models\Cctv;
use App\Models\Vehicle;
use App\Models\Detection;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TypeDetectionSeeder::class);
        $this->call(TypeVehicleSeeder::class);

        Spbu::factory(6)->create();
        Dispenser::factory(30)->create();
        Cctv::factory(30)->create();
        Vehicle::factory(50)->create();
        Detection::factory(50)->create();

        // TypeVehicle::create(['type' => 'Motor']);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Spbu::factory()->create([
        // 'name' => 'Pertamina Bekasi',
        // 'road' => 'Jl. Galaxy',
        // 'city' => 'Bekasi Selatan',
        // 'province' => 'Bekasi',
        // 'island' => 'Jawa Barat',
        // ]);
    }
}
