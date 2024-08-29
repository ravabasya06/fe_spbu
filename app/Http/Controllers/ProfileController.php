<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return Inertia::render('Profile', [
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('login')->with('message', 'You logged out of an account');
    }

    public function destroy($id){
        $theuser = User::find($id);
        User::destroy($id);
        return Redirect::route('login')->with('message', 'Successfully deleted your account!');
    }
}
