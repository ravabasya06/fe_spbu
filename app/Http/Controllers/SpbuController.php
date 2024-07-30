<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Spbu;

class SpbuController extends Controller
{
    public function index(){
        $title = 'Analysis';
        $spbus = Spbu::orderBy('spbu_id', 'ASC')->get();
        return Inertia::render('Analysis', [
            'title' => $title,
            'spbus' => $spbus,
        ]);
    }
    public function show(Spbu $spbu){
        $title = 'Profile Spbu';
        return Inertia::render('Spbu', [
            'title' => $title,
            'spbu' => $spbu
        ]);
    }
}
