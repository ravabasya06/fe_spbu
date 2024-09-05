<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $islands = DB::table('islands')
        ->leftJoin('spbus', 'islands.island_id', '=', 'spbus.island_id')
        ->select(
            'islands.island_id', 
            'islands.name', 
            DB::raw('COUNT(spbus.spbu_id) as spbu_count')
        )
        ->groupBy('islands.island_id', 'islands.name')
        ->get();

        $provinces = DB::table('provinces')
        ->leftJoin('spbus', 'provinces.province_id', '=', 'spbus.province_id')
        ->select(
            'provinces.province_id', 
            'provinces.name',
            'provinces.island_id',
            DB::raw('COUNT(spbus.spbu_id) as spbu_count')
        )
        ->groupBy('provinces.province_id', 'provinces.name', 'provinces.island_id')
        ->get();

        $spbus = DB::table('spbus')
            ->join('vehicles', 'spbus.spbu_id', '=', 'vehicles.spbu_id')
            ->select(
                'spbus.spbu_id', 
                'spbus.name',
                'spbus.latitude', 
                'spbus.longitude',
                //today
                DB::raw('SUM(CASE WHEN DATE(vehicles.created_at) = CURDATE() THEN 1 ELSE 0 END) as today_vehicle_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 1 AND DATE(vehicles.created_at) = CURDATE() THEN 1 ELSE 0 END) as today_motor_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 2 AND DATE(vehicles.created_at) = CURDATE() THEN 1 ELSE 0 END) as today_car_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 3 AND DATE(vehicles.created_at) = CURDATE() THEN 1 ELSE 0 END) as today_bus_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 4 AND DATE(vehicles.created_at) = CURDATE() THEN 1 ELSE 0 END) as today_truck_count'),
                //30min
                DB::raw('SUM(CASE WHEN vehicles.created_at >= NOW() - INTERVAL 30 MINUTE THEN 1 ELSE 0 END) as recent_vehicle_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 1 AND vehicles.created_at >= NOW() - INTERVAL 30 MINUTE THEN 1 ELSE 0 END) as recent_motor_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 2 AND vehicles.created_at >= NOW() - INTERVAL 30 MINUTE THEN 1 ELSE 0 END) as recent_car_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 3 AND vehicles.created_at >= NOW() - INTERVAL 30 MINUTE THEN 1 ELSE 0 END) as recent_bus_count'),
                DB::raw('SUM(CASE WHEN vehicles.type_vehicle_id = 4 AND vehicles.created_at >= NOW() - INTERVAL 30 MINUTE THEN 1 ELSE 0 END) as recent_truck_count')
            )
            ->groupBy('spbus.spbu_id', 'spbus.name', 'spbus.latitude', 'spbus.longitude')
            ->get();
        
        return Inertia::render('Dashboard', [
            'islands' => $islands,
            'provinces' => $provinces,
            'spbus' => $spbus,
        ]);
    }
}
