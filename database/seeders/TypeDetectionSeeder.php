<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TypeDetection;

class TypeDetectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!TypeDetection::exists('type_detection_id')){
            TypeDetection::create(['type' => 'Fire']);
            TypeDetection::create(['type' => 'Fraud']);
            TypeDetection::create(['type' => 'Object']);
        }
    }
}
