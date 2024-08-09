<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpbuController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [PagesController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/analysis', [AnalysisController::class, 'index']);
    Route::get('/analysis', [AnalysisController::class, 'search'])->name('analysis.search');
    Route::get('/spbu/{id}', [SpbuController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/register', [UserController::class, 'register']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);