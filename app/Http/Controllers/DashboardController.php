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
        $spbus = DB::table('spbus')
            ->join('vehicles', 'spbus.spbu_id', '=', 'vehicles.spbu_id')
            ->select(
                'spbus.spbu_id', 
                'spbus.name',
                'spbus.latitude', 
                'spbus.longitude',
                //today
                DB::raw('count(CASE WHEN DATE(vehicles.created_at) = CURDATE() THEN 1 END) as today_vehicle_count'),
                DB::raw('count(CASE WHEN vehicles.type_vehicle_id = 1 AND DATE(vehicles.created_at) = CURDATE() THEN 1 END) as today_motor_count'),
                DB::raw('count(CASE WHEN vehicles.type_vehicle_id = 2 AND DATE(vehicles.created_at) = CURDATE() THEN 1 END) as today_car_count'),
                DB::raw('count(CASE WHEN vehicles.type_vehicle_id = 3 AND DATE(vehicles.created_at) = CURDATE() THEN 1 END) as today_bus_count'),
                DB::raw('count(CASE WHEN vehicles.type_vehicle_id = 4 AND DATE(vehicles.created_at) = CURDATE() THEN 1 END) as today_truck_count'),
                //30min
                DB::raw('SUM(CASE WHEN vehicles.created_at >= NOW() - INTERVAL 30 MINUTE THEN 1 ELSE 0 END) as recent_vehicle_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 1 AND vehicles.created_at >= NOW() - INTERVAL 30 MINUTE THEN 1 ELSE 0 END) as recent_motor_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 2 AND vehicles.created_at >= NOW() - INTERVAL 30 MINUTE THEN 1 ELSE 0 END) as recent_car_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 3 AND vehicles.created_at >= NOW() - INTERVAL 30 MINUTE THEN 1 ELSE 0 END) as recent_bus_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 4 AND vehicles.created_at >= NOW() - INTERVAL 30 MINUTE THEN 1 ELSE 0 END) as recent_truck_count')
            )
            ->groupBy('spbus.spbu_id', 'spbus.name', 'spbus.latitude', 'spbus.longitude')
            ->get();
            
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
    public function showspbu($id){
        $spbu = Spbu::find($id);
        $totalMotorToday = DB::table('vehicles')
        ->where('spbu_id', $id)
        ->whereDate('created_at', now()->today())
        ->where('type_vehicle_id', 1)
        ->count();
        return Inertia::render('Dashboard', [
            'spbu' => $spbu,
            'totalMotorToday' => $totalMotorToday,
        ]);
    }
}
