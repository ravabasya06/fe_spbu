<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Province::exists('province_id')){
            // Jawa
            Province::create(['name' => 'Jawa Barat', 'island_id' => '1']);
            Province::create(['name' => 'Jawa Tengah', 'island_id' => '1']);
            Province::create(['name' => 'Jawa Timur', 'island_id' => '1']);
            Province::create(['name' => 'Banten', 'island_id' => '1']);
            Province::create(['name' => 'DKI Jakarta', 'island_id' => '1']);
            Province::create(['name' => 'DI Yogyakarta', 'island_id' => '1']);

            // Kalimantan
            Province::create(['name' => 'Kalimantan Barat', 'island_id' => '2']);
            Province::create(['name' => 'Kalimantan Tengah', 'island_id' => '2']);
            Province::create(['name' => 'Kalimantan Selatan', 'island_id' => '2']);
            Province::create(['name' => 'Kalimantan Timur', 'island_id' => '2']);
            Province::create(['name' => 'Kalimantan Utara', 'island_id' => '2']);

            // Sumatera
            Province::create(['name' => 'Aceh', 'island_id' => '3']);
            Province::create(['name' => 'Sumatera Utara', 'island_id' => '3']);
            Province::create(['name' => 'Sumatera Barat', 'island_id' => '3']);
            Province::create(['name' => 'Riau', 'island_id' => '3']);
            Province::create(['name' => 'Jambi', 'island_id' => '3']);
            Province::create(['name' => 'Bengkulu', 'island_id' => '3']);
            Province::create(['name' => 'Sumatera Selatan', 'island_id' => '3']);
            Province::create(['name' => 'Kepulauan Bangka Belitung', 'island_id' => '3']);
            Province::create(['name' => 'Lampung', 'island_id' => '3']);
            Province::create(['name' => 'Kepulauan Riau', 'island_id' => '3']);

            // Sulawesi
            Province::create(['name' => 'Sulawesi Utara', 'island_id' => '4']);
            Province::create(['name' => 'Gorontalo', 'island_id' => '4']);
            Province::create(['name' => 'Sulawesi Tengah', 'island_id' => '4']);
            Province::create(['name' => 'Sulawesi Barat', 'island_id' => '4']);
            Province::create(['name' => 'Sulawesi Selatan', 'island_id' => '4']);
            Province::create(['name' => 'Sulawesi Tenggara', 'island_id' => '4']);

            // Papua
            Province::create(['name' => 'Papua', 'island_id' => '5']);
            Province::create(['name' => 'Papua Barat', 'island_id' => '5']);
            Province::create(['name' => 'Papua Tengah', 'island_id' => '5']);
            Province::create(['name' => 'Papua Pegunungan', 'island_id' => '5']);
            Province::create(['name' => 'Papua Selatan', 'island_id' => '5']);
            Province::create(['name' => 'Papua Barat Daya', 'island_id' => '5']);
        }
    }
}
