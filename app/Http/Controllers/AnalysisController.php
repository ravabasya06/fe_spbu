<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Spbu;

class AnalysisController extends Controller
{
    public function index(){
        $spbus = Spbu::orderByRaw('updated_at - created_at DESC')->paginate(16);
        return Inertia::render('Analysis', [
            'spbus' => $spbus,
            'results' => $spbus, 
            'query' => null,
        ]);
    }
    public function search(Request $request){
        $query = $request->input('search_query');
        $spbu = Spbu::join('islands', 'spbus.island_id', '=', 'islands.island_id')
        ->join('provinces', 'spbus.province_id', '=', 'provinces.province_id')
        ->select('spbus.spbu_id', 'spbus.name', 'spbus.road', 'spbus.city',
         'provinces.name as province_name', 'islands.name as island_name');
         
        $results = $spbu
            ->where('spbus.spbu_id', 'LIKE', "%{$query}%")
            ->orWhere('spbus.name', 'LIKE', "%{$query}%")
            ->orWhere('spbus.road', 'LIKE', "%{$query}%")
            ->orWhere('spbus.city', 'LIKE', "%{$query}%")
            ->orWhere('provinces.name', 'LIKE', "%{$query}%")
            ->orWhere('islands.name', 'LIKE', "%{$query}%")
            ->get();
        
        return Inertia::render('Analysis', [
            'spbus' => [], 
            'results' => $results,
            'query' => $query,
        ]);
    }
}
