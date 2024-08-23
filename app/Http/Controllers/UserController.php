<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return Inertia::render('Admin/UserManager', [
            'users' => $users,
        ]);
    }

    public function edit($id){
        $theuser = User::find($id);
        return Inertia::render('Admin/User', [
            'theuser' => $theuser,
        ]);
    }

    public function update(Request $request, $id){
        $theuser = User::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:users,name,' . $id . ',id',
            'isAdmin' => 'required',
        ]);

        User::where('id', $id)->update($validated);
        return Redirect::route('user.index')->with('message', 'Data updated successfully!');
    }

    public function destroy($id){
        $theuser = User::find($id);
        User::destroy($id);
        $msg =  'User ' . $theuser['name'] . ' successfully deleted';
        return Redirect::route('user.index')->with('message', $msg);
    }
}
