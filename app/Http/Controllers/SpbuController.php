<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Spbu;

class SpbuController extends Controller
{
    public function index($spbu_id)
    {
        $spbu = Spbu::findOrFail($spbu_id);
        $dispensers = $this->fetchModel('dispensers', $spbu_id)->orderBy("dispenser_number")->get();
        $cctvs = $this->fetchModel('cctvs', $spbu_id)->orderBy("cctv_number")->get();

        $detections = $this->fetchDetection($spbu_id)->get();

        $vehicles = $this->fetchModel('vehicles', $spbu_id)->get();
        
        $fireDetections = $this->fetchDetection($spbu_id)->where('type_detection_id', 1)->get();
        $fraudDetections = $this->fetchDetection($spbu_id)->where('type_detection_id', 2)->get();
        $objectDetections = $this->fetchDetection($spbu_id)->where('type_detection_id', 3)->get();

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
        $islands = DB::table('islands')->get();
        $provinces = DB::table('provinces')->get();
        return Inertia::render('Admin/CreateSPBU', [
            'islands' => $islands,
            'provinces' => $provinces,
        ]);
    }

    public function edit($spbu_id){
        $islands = DB::table('islands')->get();
        $provinces = DB::table('provinces')->get();

        $spbu = Spbu::findOrFail($spbu_id);
        $dispensers = $this->fetchModel('dispensers', $spbu_id)->orderBy("dispenser_number")->get();
        $cctvs = $this->fetchModel('cctvs', $spbu_id)->orderBy("cctv_number")->get();

        $detections = $this->fetchDetection($spbu_id)->get();

        $vehicles = $this->fetchModel('vehicles', $spbu_id)->get();
        
        $fireDetections = $this->fetchDetection($spbu_id)->where('type_detection_id', 1)->get();
        $fraudDetections = $this->fetchDetection($spbu_id)->where('type_detection_id', 2)->get();
        $objectDetections = $this->fetchDetection($spbu_id)->where('type_detection_id', 3)->get();

        $motorVehicles = $this->fetchModel('vehicles', $spbu_id)->where('type_vehicle_id', 1)->get();
        $carVehicles = $this->fetchModel('vehicles', $spbu_id)->where('type_vehicle_id', 2)->get();
        $busVehicles = $this->fetchModel('vehicles', $spbu_id)->where('type_vehicle_id', 3)->get();
        $truckVehicles = $this->fetchModel('vehicles', $spbu_id)->where('type_vehicle_id', 4)->get();
        return Inertia::render('Admin/Edit', [
            'islands' => $islands,
            'provinces' => $provinces,

            'spbu' => $spbu,
            'dispensers' => $dispensers,
            'cctvs' => $cctvs,

            'fireDetections' => $fireDetections,
            'fraudDetections' => $fraudDetections,
            'objectDetections' => $objectDetections,

            'motorVehicles' => $motorVehicles,
            'carVehicles' => $carVehicles,
            'busVehicles' => $busVehicles,
            'truckVehicles' => $truckVehicles,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:spbus',
            'road' => 'required',
            'city' => 'required',
            'province_id' => 'required',
            'island_id' => 'required',
        ]);

        $spbu = Spbu::create($validated);

        return Redirect::route('analysis.search')->with('message', 'Spbu successfully created');
    }

    public function update(Request $request, $spbu_id){
        $spbu = Spbu::findOrFail($spbu_id);

        $validated = $request->validate([
            'name' => 'required|unique:spbus,name,' . $spbu_id . ',spbu_id',
            'road' => 'required',
            'city' => 'required',
            'province_id' => 'required',
            'island_id' => 'required',
        ]);

        Spbu::where('spbu_id', $spbu_id)->update($validated);
        
        return Redirect::route('spbu.index', [$spbu])->with('message', 'Data updated successfully');
    }

    public function destroy($spbu_id){
        $spbu = Spbu::findOrFail($spbu_id);
        Spbu::destroy($spbu_id);
        $msg =  $spbu['name'] . ' deleted';
        return Redirect::route('analysis.search')->with('message', $msg);
    }
    
    public function fetchModel($model, $spbu_id)
    {
        return DB::table($model)->where('spbu_id', $spbu_id)->orderByRaw('created_at ASC');
    }

    public function fetchDetection($spbu_id)
    {
        return DB::table('detections')
        ->join('cctvs', 'detections.cctv_id', '=', 'cctvs.cctv_id')
        ->select('detections.detection_id', 'detections.spbu_id', 'cctvs.cctv_number', 'detections.type_detection_id', 'detections.created_at', 'detections.updated_at')
        ->where('detections.spbu_id', $spbu_id);
    }
}