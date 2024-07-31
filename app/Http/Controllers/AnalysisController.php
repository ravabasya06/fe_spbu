<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Spbu;

class AnalysisController extends Controller
{
    public function index(){
        $spbus = Spbu::orderByRaw('updated_at - created_at DESC')->get();
        return Inertia::render('Analysis', [
            'spbus' => $spbus,
        ]);
    }
}
