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
        $type_detections = DB::table('type_detections')->get();
        return Inertia::render('Admin/DetectionForm', [
            'spbu_id' => $spbu_id,
            'cctvs' => $cctvs,
            'type_detections' => $type_detections,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'spbu_id' => 'required',
            'cctv_id' => 'required',
            'type_detection_id' => 'required',
        ]);

        $detection = Detection::create($validated);

        return back()->with('message', 'Detection successfully created');
    }

    public function destroy($detection_id){
        $detection = Detection::find($detection_id);
        Detection::destroy($detection_id);
        return back()->with('message', 'This Detection is successfully deleted!');
    }

    public function edit($detection_id){
        $detection = Detection::find($detection_id);
        $cctvs = $this->fetchModel('cctvs', $detection['spbu_id'])->orderBy("cctv_number")->get();
        $type_detections = DB::table('type_detections')->get();

        return Inertia::render('Admin/DetectionForm', [
            'detection' => $detection,
            'cctvs' => $cctvs,
            'type_detections' => $type_detections,
        ]);
    }

    public function update(Request $request, $detection_id){
        $detection = Detection::find($detection_id);

        $validated = $request->validate([
            'cctv_id' => 'required',
            'type_detection_id' => 'required',
        ]);

        Detection::where('detection_id', $detection_id)->update($validated);

        return back()->with('message', 'Data updated successfully');
    }

    public function fetchModel($model, $spbu_id)
    {
        return DB::table($model)->where('spbu_id', $spbu_id)->orderByRaw('created_at ASC');
    }
}
