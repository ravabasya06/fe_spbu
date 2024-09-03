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
        $spbus = Spbu::all();

        foreach ($spbus as $spbu) {
            $lastlength = Dispenser::where('spbu_id', $spbu->spbu_id)->count() + 1;
            $totaldispenser = $lastlength + rand(3, 5);

            for ($i = $lastlength; $i <= $totaldispenser; $i++) {
                Dispenser::factory()->create([
                    'spbu_id' => $spbu->spbu_id,
                    'dispenser_number' => $i,
                    'queue' => fake()->numberBetween(1, 15),
                ]);
            }
        }
    }
}
