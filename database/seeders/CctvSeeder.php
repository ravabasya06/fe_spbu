<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cctv;
use App\Models\Spbu;

class CctvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spbus = Spbu::all();

        foreach ($spbus as $spbu) {
            $lastlength = Cctv::where('spbu_id', $spbu->spbu_id)->count() + 1;
            $totalcctv = $lastlength + rand(3, 5);

            for ($i = $lastlength; $i <= $totalcctv; $i++) {
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
