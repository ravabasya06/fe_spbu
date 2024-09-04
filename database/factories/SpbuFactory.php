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
        switch($province->island_id){
            case 1:
                $latitude = rand(-6.8*10, -8*10) / 10;
                $longitude = rand(105.3*10, 114.3*10) / 10;
                break;
            case 2:
                $latitude = rand(-1*10, 4.3*10) / 10;
                $longitude = rand(110*10, 117*10) / 10;
                break;
            case 3:
                $latitude = rand(-5.4*10, 5.6*10) / 10;
                $longitude = rand(95.4*10, 105.3*10) / 10; 
                break;
            case 4:
                $latitude = rand(-1*10, -5.3*10) / 10;
                $longitude = rand(119.4*10, 120*10) / 10;
                break;
            case 5:
                $latitude = rand(-2*10, -9*10) / 10;
                $longitude = rand(137.5*10, 140.9*10) / 10;
                break;
            default:
                $latitude = null;
                $longitude = null;
                break;
        }
        return [
            'name' => 'Pertamina ' . $street,
            'road' => 'Jl. ' . $street . ' No. ' . $faker->numberBetween(1, 80),
            'city' => $faker->city(),
            'province_id' => $province->province_id,
            'island_id' => $province->island_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];
    }
}
