<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dispenser;
use App\Models\Spbu;

class DispenserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spbus = Spbu::all(); // Fetch all SPBUs

        foreach ($spbus as $spbu) {
            $numberOfDispensers = rand(3, 8); // Random number of CCTVs for each SPBU

            for ($i = 1; $i <= $numberOfDispensers; $i++) {
                Dispenser::factory()->create([
                    'spbu_id' => $spbu->spbu_id,
                    'dispenser_number' => $i,
                    'queue' => fake()->numberBetween(1, 15),
                ]);
            }
        }
    }
}
