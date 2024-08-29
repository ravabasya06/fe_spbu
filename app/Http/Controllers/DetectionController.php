<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Spbu;
use App\Models\Detection;

class DetectionController extends Controller
{
    public function destroy($detection_id){
        $detection = Detection::find($detection_id);
        Detection::destroy($detection_id);
        return back()->with('message', 'This Detection is successfully deleted!');
    }
}
