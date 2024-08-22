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
        $user = User::find($id);
        return Inertia::render('Admin/User', [
            'user' => $user,
        ]);
    }

    public function destroy($id){
        $user = User::find($id);
        User::destroy($id);
        $msg =  'User ' . $user['name'] . ' successfully deleted';
        return Redirect::route('user.index')->with('message', $msg);
    }
}
