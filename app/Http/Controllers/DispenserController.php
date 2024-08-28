<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Spbu;
use App\Models\Dispenser;

class DispenserController extends Controller
{
    public function create($spbu_id){
        return Inertia::render('Admin/DispenserForm', [
            'spbu_id' => $spbu_id,
        ]);
    }

    public function destroy($dispenser_id){
        $dispenser = Dispenser::find($dispenser_id);
        Dispenser::destroy($dispenser_id);
        return back()->with('message', 'This dispenser is successfully deleted!');
    }

    public function edit($dispenser_id){
        $dispenser = Dispenser::find($dispenser_id);

        return Inertia::render('Admin/DispenserForm', [
            'dispenser' => $dispenser,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no' => 'required',
            'spbu_id' => 'required',
            'queue' => 'required',
        ]);

        $dispenser = Dispenser::create($validated);

        return back()->with('message', 'Dispenser successfully created');
    }

    public function update(Request $request, $dispenser_id){
        $dispenser = Dispenser::find($dispenser_id);

        $validated = $request->validate([
            'queue' => 'required',
        ]);

        Dispenser::where('dispenser_id', $dispenser_id)->update($validated);

        return back()->with('message', 'Data updated successfully');
    }
}
