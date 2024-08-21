<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Spbu;
use App\Models\Dispenser;
use App\Models\Cctv;
use App\Models\Detection;
use App\Models\Vehicle;

class SpbuController extends Controller
{
    public function index($spbu_id)
    {
        $spbu = $this->fetchSpbu($spbu_id);
        $dispensers = $this->fetchModel(Dispenser::class, $spbu_id);
        $cctvs = $this->fetchModel(Cctv::class, $spbu_id);
        $detections = $this->fetchModel(Detection::class, $spbu_id);
        $vehicles = $this->fetchModel(Vehicle::class, $spbu_id);
        
        $fireDetections = $detections->where('type_detection_id', 1);
        $fraudDetections = $detections->where('type_detection_id', 2);
        $objectDetections = $detections->where('type_detection_id', 3);

        $totalWoman = $cctvs->sum('woman');
        $totalMan = $cctvs->sum('man');

        $totalMotor = $vehicles->where('type_vehicle_id', 1)->count();
        $totalCar = $vehicles->where('type_vehicle_id', 2)->count();
        $totalBus = $vehicles->where('type_vehicle_id', 3)->count();
        $totalTruck = $vehicles->where('type_vehicle_id', 4)->count();

        return Inertia::render('Spbu', [
            'spbu' => $spbu,
            'dispensers' => $dispensers,
            'cctvs' => $cctvs,
            'detections' => $detections,
            'vehicles' => $vehicles,

            'totalWoman' => $totalWoman,
            'totalMan' => $totalMan,
            
            'totalMotor' => $totalMotor,
            'totalCar' => $totalCar,
            'totalBus' => $totalBus,
            'totalTruck' => $totalTruck,

            'fireDetections' => $fireDetections,
            'fraudDetections' => $fraudDetections,
            'objectDetections' => $objectDetections,
        ]);
    }

    public function create(){
        return Inertia::render('Admin/CreateSPBU', [
        ]);
    }

    public function edit($spbu_id){
        $spbu = $this->fetchSpbu($spbu_id);
        $dispensers = $this->fetchModel(Dispenser::class, $spbu_id);
        return Inertia::render('Admin/Edit', [
            'spbu' => $spbu,
            'dispensers' => $dispensers,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:spbus',
            'road' => 'required',
            'city' => 'required',
            'province' => 'required',
            'island' => 'required',
        ]);

        $spbu = Spbu::create($validated);

        return Redirect::route('analysis.search')->with('message', 'Spbu successfully created');
    }

    public function update(Request $request, $spbu_id){
        $spbu = Spbu::find($spbu_id);

        $validated = $request->validate([
            'name' => 'required|unique:spbus,name,' . $spbu_id . ',spbu_id',
            'road' => 'required',
            'city' => 'required',
            'province' => 'required',
            'island' => 'required',
        ]);

        Spbu::where('spbu_id', $spbu_id)->update($validated);
        
        return Redirect::route('spbu.index', [$spbu])->with('message', 'Data updated successfully');
    }

    public function destroy($spbu_id){
        $spbu = Spbu::find($spbu_id);
        Spbu::destroy($spbu_id);
        $msg =  $spbu['name'] . ' deleted';
        return Redirect::route('analysis.search')->with('message', $msg);
    }

    public function fetchSpbu($spbu_id){
        $spbu = Spbu::find($spbu_id);
        return $spbu;
    }
    
    public function fetchModel($model, $spbu_id)
    {
        return $model::where('spbu_id', $spbu_id)->orderByRaw('updated_at - created_at ASC')->get();
    }
}