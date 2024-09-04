<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Spbu;
use App\Models\Island;
use App\Models\Province;


class DashboardController extends Controller
{
    public function index(){
        $islands = Island::select('island_id', 'name', 'count')->get();
        $provinces = Province::select('province_id', 'name', 'island_id', 'count')->get();
        $spbus = Spbu::all();

        foreach ($islands as $island) {
            $count = Spbu::where('island_id', $island->island_id)->count();
            $island->where('island_id', $island->island_id)->update(['count' => $count]);
        }

        foreach ($provinces as $province) {
            $count = Spbu::where('province_id', $province->province_id)->count();
            $province->where('province_id', $province->province_id)->update(['count' => $count]);
        }
        
        return Inertia::render('Dashboard', [
            'islands' => $islands,
            'provinces' => $provinces,
            'spbus' => $spbus,
        ]);
    }
}
