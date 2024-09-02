<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IslandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Island::exists('island_id')){
            Island::create(['name' => 'Jawa']);
            Island::create(['name' => 'Kalimantan']);
            Island::create(['name' => 'Sumatera']);
            Island::create(['name' => 'Sulawesi']);
            Island::create(['name' => 'Papua']);
        }
    }
}
