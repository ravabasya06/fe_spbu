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
            'results' => [], 
            'query' => null,
        ]);
    }
    public function search(Request $request){
        $query = $request->input('search_query');
        $results = Spbu::where('spbu_id', 'LIKE', "%{$query}%")
            ->orWhere('name', 'LIKE', "%{$query}%")
            ->orWhere('road', 'LIKE', "%{$query}%")
            ->orWhere('city', 'LIKE', "%{$query}%")
            ->orWhere('province', 'LIKE', "%{$query}%")
            ->orWhere('island', 'LIKE', "%{$query}%")
            ->get();
        
        return Inertia::render('Analysis', [
            'spbus' => [], 
            'results' => $results,
            'query' => $query,
        ]);
    }
}
