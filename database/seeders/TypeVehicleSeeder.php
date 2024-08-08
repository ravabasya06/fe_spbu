<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeVehicle;

class TypeVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!TypeVehicle::exists('type_detection_id')){
            TypeVehicle::create(['type' => 'Motor']);
            TypeVehicle::create(['type' => 'Car']);
            TypeVehicle::create(['type' => 'Bus']);
            TypeVehicle::create(['type' => 'Truck']);
        }
    }
}
