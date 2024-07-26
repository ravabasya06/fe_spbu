<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function index(){
        $title = 'Home';
        $name = 'Inertia';
        return Inertia::render('Home', [
            'title' => $title,
            'name' => $name
        ]);
    }
    public function about(){
        $title = 'About';
        $name = 'Arif';
        return Inertia::render('About', [
            'title' => $title,
            'name' => $name
        ]);
    }
}
