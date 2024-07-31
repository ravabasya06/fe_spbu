<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Spbu;
use App\Models\TypeVehicle;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
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
            'type_vehicle_id' => TypeVehicle::inRandomOrder()->first()->type_vehicle_id,
        ];
    }
}
