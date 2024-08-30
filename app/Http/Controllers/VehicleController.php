<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Vehicle;
use Illuminate\Support\Facades\DB;
class VehicleController extends Controller
{
    public function create($spbu_id){
        $type_vehicles = DB::table('type_vehicles')->get();
        return Inertia::render('Admin/VehicleForm', [
            'spbu_id' => $spbu_id,
            'type_vehicles' => $type_vehicles,
        ]);
    }

    public function destroy($vehicle_id){
        $vehicle = Vehicle::find($vehicle_id);
        Vehicle::destroy($vehicle_id);
        return back()->with('message', 'This vehicle is successfully deleted!');
    }

    public function edit($vehicle_id){
        $vehicle = Vehicle::find($vehicle_id);
        $type_vehicles = DB::table('type_vehicles')->get();

        return Inertia::render('Admin/VehicleForm', [
            'vehicle' => $vehicle,
            'type_vehicles' => $type_vehicles,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'spbu_id' => 'required',
            'type_vehicle_id' => 'required',
        ]);

        $vehicle = Vehicle::create($validated);

        return back()->with('message', 'Vehicle successfully created');
    }

    public function update(Request $request, $vehicle_id){
        $vehicle = Vehicle::find($vehicle_id);

        $validated = $request->validate([
            'type_vehicle_id' => 'required',
        ]);

        Vehicle::where('vehicle_id', $vehicle_id)->update($validated);

        return back()->with('message', 'Data updated successfully');
    }
}
