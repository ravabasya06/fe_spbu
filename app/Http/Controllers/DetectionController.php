<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Spbu;
use App\Models\Detection;

class DetectionController extends Controller
{
    public function create($spbu_id){
        $cctvs = $this->fetchModel('cctvs', $spbu_id)->orderBy("cctv_number")->get();
        return Inertia::render('Admin/DetectionForm', [
            'spbu_id' => $spbu_id,
            'cctvs' => $cctvs
        ]);
    }

    public function destroy($detection_id){
        $detection = Detection::find($detection_id);
        Detection::destroy($detection_id);
        return back()->with('message', 'This Detection is successfully deleted!');
    }

    public function fetchModel($model, $spbu_id)
    {
        return DB::table($model)->where('spbu_id', $spbu_id)->orderByRaw('created_at ASC');
    }
}
