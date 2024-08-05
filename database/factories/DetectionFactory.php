<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Spbu;
use App\Models\Cctv;
use App\Models\TypeDetection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detection>
 */
class DetectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $spbu = Spbu::inRandomOrder()->first();
        $cctv = Cctv::where('spbu_id', $spbu->spbu_id)->inRandomOrder()->first();

        return [
            'spbu_id' => $spbu->spbu_id,
            'cctv_id' => $cctv->cctv_id,
            'type_detection_id' => TypeDetection::inRandomOrder()->first()->type_detection_id,
        ];
    }
}
