<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpbuController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AdminPanelController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('auth')->group(function(){
    Route::get('/', [PagesController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/analysis', [AnalysisController::class, 'index'])->name('analysis');
    Route::get('/analysis', [AnalysisController::class, 'search'])->name('analysis.search');
    Route::get('/spbu/{id}', [SpbuController::class, 'index'])->name('spbu.index');
    Route::get('/spbu/{id}/edit', [SpbuController::class, 'edit']);
    Route::put('/spbu/{id}', [SpbuController::class, 'update']);
    Route::delete('/spbu/{id}', [SpbuController::class, 'destroy']);
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
    Route::get('/password', [PasswordController::class, 'index'])->name('password');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::middleware(['auth', 'admin'])->group(function () {
});
Route::get('/adminpanel', [AdminPanelController::class, 'index'])->name('adminpanel');

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/register', [UserController::class, 'register']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);