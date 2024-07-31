<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Spbu;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cctv>
 */
class CctvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'spbu_id' => Spbu::inRandomOrder()->first()->spbu_id,
            'status' => fake()->boolean(), 
            'man' => fake()->numberBetween(1, 19),
            'woman' => fake()->numberBetween(1, 19),
        ];
    }
}
