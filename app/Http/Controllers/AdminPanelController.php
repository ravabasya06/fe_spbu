<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Spbu;

class AdminPanelController extends Controller
{
    public function index(){
        return Inertia::render('Admin/AdminPanel', [
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:spbus',
            'road' => 'required',
            'city' => 'required',
            'province' => 'required',
            'island' => 'required',
        ]);

        $spbu = Spbu::create([
            'name' => $request->name,
            'road' => $request->road,
            'city' => $request->city,
            'province' => $request->province,
            'island' => $request->island,
        ]);

        return Redirect::route('analysis.search')->with('message', 'Spbu created');
    }

    public function edit($spbu_id){
        $spbu = $this->fetchSpbu($spbu_id);

        return Inertia::render('Admin/Edit', [
            'spbu' => $spbu,
        ]);
    }

    public function update(Request $request, $spbu_id){
        $spbu = Spbu::find($spbu_id);
        Spbu::where('spbu_id', $spbu_id)->update([
            'name' => $request->name, 
            'road' => $request->road, 
            'city' => $request->city,
            'province' => $request->province, 
            'island' => $request->island,
        ]);
        
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
