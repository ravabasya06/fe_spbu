<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cctv;
use App\Models\Spbu;

class CCTVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spbus = Spbu::all(); // Fetch all SPBUs

        foreach ($spbus as $spbu) {
            $numberOfCCTVs = rand(3, 8); // Random number of CCTVs for each SPBU

            for ($i = 1; $i <= $numberOfCCTVs; $i++) {
                Cctv::create([
                    'spbu_id' => $spbu->spbu_id,
                    'cctv_number' => $i,
                    'status' => fake()->boolean(),
                    'man' => fake()->numberBetween(1, 19),
                    'woman' => fake()->numberBetween(1, 19),
                    'link' => fake()->imageUrl(640, 480, 'CCTV', true),
                ]);
            }
        }
    }
}
