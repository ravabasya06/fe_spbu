<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Spbu;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dispenser>
 */
class DispenserFactory extends Factory
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
            'dispenser_number' => fake()->numberBetween(1, 15),
            'queue' => fake()->numberBetween(1, 15),
        ];
    }
}
