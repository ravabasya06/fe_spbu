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
        $spbu_code = rand(10, 99).'.'.rand(100, 999).'.'.rand(10, 999);
        $street = $faker->street();
        $city = $faker->city();
        $island = Island::inRandomOrder()->first();
        $province = Province::inRandomOrder()->first();
        switch($province->island_id){
            case 1:
                $latitude = rand(-6.8*1000, -8*1000) / 1000;
                $longitude = rand(105.3*1000, 114.3*1000) / 1000;
                break;
            case 2:
                $latitude = rand(-1*1000, 4.3*1000) / 1000;
                $longitude = rand(110*1000, 117*1000) / 1000;
                break;
            case 3:
                $latitude = rand(-5.4*1000, 5.6*1000) / 1000;
                $longitude = rand(95.4*1000, 105.3*1000) / 1000; 
                break;
            case 4:
                $latitude = rand(-1*1000, -5.3*1000) / 1000;
                $longitude = rand(119.4*1000, 120*1000) / 1000;
                break;
            case 5:
                $latitude = rand(-2*1000, -9*1000) / 1000;
                $longitude = rand(137.5*1000, 140.9*1000) / 1000;
                break;
            default:
                $latitude = null;
                $longitude = null;
                break;
        }
        return [
            'name' => 'SPBU Pertamina ' . $spbu_code,
            'road' => 'Jl. ' . $street . ' No.' . $faker->numberBetween(1, 80)
            .', RT.00'.rand(1, 9).'/RW.00'.rand(1, 9).', Kota '.$city.', '.$island->name.' 17'.rand(100, 999), 
            'city' => $city,
            'province_id' => $province->province_id,
            'island_id' => $province->island_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];
    }
}
