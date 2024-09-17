<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeDispenser;

class TypeDispenserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!TypeDispenser::exists('type_dispenser_id')){
            TypeDispenser::create(['type' => 'Pertalite']);
            TypeDispenser::create(['type' => 'Pertamax']);
            TypeDispenser::create(['type' => 'Pertamax Turbo']);
            TypeDispenser::create(['type' => 'Pertamax Green 95']);
            TypeDispenser::create(['type' => 'Pertamina Dex']);
            TypeDispenser::create(['type' => 'Dexlite']);
        }
    }
}
