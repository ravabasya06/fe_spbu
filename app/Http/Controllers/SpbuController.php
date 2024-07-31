<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Spbu;
use App\Models\Dispenser;
use App\Models\Cctv;
use App\Models\Detection;
use App\Models\Vehicle;

class SpbuController extends Controller
{
    public function index($spbu_id){
        $spbu = $this->fetchspbu($spbu_id);
        $dispensers = $this->fetchdispensers($spbu_id);
        $cctvs = $this->fetchcctvs($spbu_id);
        $detections = $this->fetchdetections($spbu_id);
        $vehicles = $this->fetchvehicles($spbu_id);

        $totalWoman = $cctvs->sum('woman');
        $totalMan = $cctvs->sum('man');
        $totalMan = $cctvs->sum('man');
        $totalMan = $cctvs->sum('man');
        $grandTotal = $totalWoman + $totalMan;

        $totalFire = $detections->where('type_detection_id', '=', '1')->count('detection_id');
        $totalFraud = $detections->where('type_detection_id', '=', '2')->count('detection_id');
        $totalObject = $detections->where('type_detection_id', '=', '3')->count('detection_id');
        
        $totalVehicle = $vehicles->count('vehicle_id');

        return Inertia::render('Spbu', [
            'spbu' => $spbu,
            'dispensers' => $dispensers,
            'cctvs' => $cctvs,

            'totalWoman' => $totalWoman,
            'totalMan' => $totalMan,
            'grandTotal' => $grandTotal,

            'totalFire' => $totalFire,
            'totalFraud' => $totalFraud,
            'totalObject' => $totalObject,

            'totalVehicle' => $totalVehicle,
        ]);
    }

    public function fetchspbu($spbu_id){
        $spbu = Spbu::find($spbu_id);
        return $spbu;
    }

    public function fetchdispensers($spbu_id){
        $dispensers = Dispenser::orderByRaw('updated_at - created_at ASC')
        ->where('spbu_id', '=', $spbu_id)->get();
        return $dispensers;
    }

    public function fetchcctvs($spbu_id){
        $cctvs = Cctv::orderByRaw('updated_at - created_at ASC')
        ->where('spbu_id', '=', $spbu_id)->get();
        return $cctvs;
    }

    public function fetchdetections($spbu_id){
        $detections = Detection::orderByRaw('updated_at - created_at ASC')
        ->where('spbu_id', '=', $spbu_id)->get();
        return $detections;
    }

    public function fetchvehicles($spbu_id){
        $vehicles = Vehicle::orderByRaw('updated_at - created_at ASC')
        ->where('spbu_id', '=', $spbu_id)->get();
        return $vehicles;
    }
}
