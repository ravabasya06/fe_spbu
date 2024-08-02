<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

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
    
    protected static $islands = [
        'Jawa', 'Sumatera', 'Kalimantan', 'Sulawesi', 'Papua'
    ];

    protected function island()
    {
        return collect(static::$islands)->random();
    }

    public function definition(): array
    {  
        $faker = FakerFactory::create('id_ID');
        $street = $faker->street();
        $state = $faker->state();
        return [
            'name' => 'Pertamina ' . $street,
            'road' => 'Jl. ' . $street . ' No. ' . $faker->numberBetween(1, 80),
            'city' => $faker->city(),
            'province' => $state,
            'island' => self::island(),
        ];
    }
}
