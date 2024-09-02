<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use App\Models\Island;
use App\Models\Province;

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
        $faker = FakerFactory::create('id_ID');
        $street = $faker->street();
        $province = Province::inRandomOrder()->first();
        return [
            'name' => 'Pertamina ' . $street,
            'road' => 'Jl. ' . $street . ' No. ' . $faker->numberBetween(1, 80),
            'city' => $faker->city(),
            'province_id' => $province->province_id,
            'island_id' => $province->island_id,
        ];
    }
}
