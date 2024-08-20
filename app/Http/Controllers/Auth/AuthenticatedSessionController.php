<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt($this->credentials($request))) {
            $request->session()->regenerate();

            return Redirect::route('home')->with('message', 'You are now logged in!');
        }

        throw ValidationException::withMessages([
            'name' => trans('auth.failed'),
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
    }

    protected function credentials(Request $request)
    {
        return $request->only('name', 'password');
    }
}
