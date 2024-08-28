<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Spbu;
use App\Models\Cctv;

class CctvController extends Controller
{
    public function create($spbu_id){
        return Inertia::render('Admin/CCTVForm', [
            'spbu_id' => $spbu_id,
        ]);
    }

    public function destroy($cctv_id){
        $cctv = Cctv::find($cctv_id);
        Cctv::destroy($cctv_id);
        return back()->with('message', 'This CCTV is successfully deleted!');
    }

    public function edit($cctv_id){
        $cctv = Cctv::find($cctv_id);

        return Inertia::render('Admin/CCTVForm', [
            'cctv' => $cctv,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'spbu_id' => 'required',
            'cctv_number' => 'required',
            'status' => 'required',
            'man' => 'required',
            'woman' => 'required',
            'link' => 'required',
        ]);

        $cctv = Cctv::create($validated);

        return back()->with('message', 'CCTV successfully created');
    }

    public function update(Request $request, $cctv_id){
        $cctv = Cctv::find($cctv_id);

        $validated = $request->validate([
            'status' => 'required',
            'man' => 'required',
            'woman' => 'required',
            'link' => 'required',
        ]);

        Cctv::where('cctv_id', $cctv_id)->update($validated);

        return back()->with('message', 'Data updated successfully');
    }
}
