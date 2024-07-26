<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){
        $title = 'Users';
        $users = User::orderBy('id', 'DESC')->get();
        return Inertia::render('User/Index', [
            'title' => $title,
            'users' => $users
        ]);
    }
    public function show(User $user){
        // $user = User::find($id);
        $title = 'Profile';
        return Inertia::render('User/Detail', [
            'title' => $title,
            'user' => $user
        ]);
    }
    public function register(){
        $title = 'Register';
        return Inertia::render('User/Register', [
            'title' => $title,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            // unique:users, users nya dari table di db
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
        ]);
        #cara pertama
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();

        #cara kedua (recommended)
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->input('password')), 
        // ]);

        #cara ketiga (harus isi $fillable di Models/User.php) (highest priority)
        $post = $request->all();
        $post['password'] = Hash::make('password');
        User::create($post);
        return Redirect::route('user.index')->with('message', 'User created');
    }
    public function edit($id){
        $user = User::find($id);
        $title = 'Edit Profile';
        return Inertia::render('User/Edit', [
            'title' => $title,
            'user' => $user,
        ]);
    }
    public function update(Request $request, $id){
        $request->validate([
            // unique:users, users nya dari table di db
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|email',
        ]);

        User::where('id', $id)->update(['name' => $request->name, 'email' => $request->email]);
        
        return Redirect::route('user.index')->with('message', 'User updated');
    }
    public function destroy($id){
        #cara 1
        $user = User::find($id);
        $msg = 'User '. $user['name'] . ' deleted';
        $user->delete();
        #cara 2 (takut nabrak function)
        // User::destroy($id);
        return Redirect::route('user.index')->with('message', $msg);
    }
}
