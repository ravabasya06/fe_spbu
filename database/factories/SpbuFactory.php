<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spbu>
 */
class SpbuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Pertamina ' . fake()->city(),
            'road' => fake()->address(),
            'city' => fake()->city(),
            'province' => fake()->state(),
            'island' => fake()->word(),
        ];
    }
}
