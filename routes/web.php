<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpbuController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DispenserController;
use App\Http\Controllers\CctvController;

Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/analysis', [AnalysisController::class, 'index'])->name('analysis.index');
    Route::get('/analysis', [AnalysisController::class, 'search'])->name('analysis.search');
    Route::get('/spbu/{id}', [SpbuController::class, 'index'])->name('spbu.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
    Route::get('/password', [PasswordController::class, 'index'])->name('password.index');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/spbu/{id}/edit', [SpbuController::class, 'edit']);
    Route::put('/spbu/{id}', [SpbuController::class, 'update']);
    Route::delete('/spbu/{id}', [SpbuController::class, 'destroy']);
    Route::post('/spbu', [SpbuController::class, 'store'])->name('spbu.store');
    Route::get('/create', [SpbuController::class, 'create'])->name('spbu.create');

    Route::get('/dispenser/{id}/edit', [DispenserController::class, 'edit']);
    Route::put('/dispenser/{id}', [DispenserController::class, 'update']);
    Route::delete('/dispenser/{id}', [DispenserController::class, 'destroy']);
    Route::post('/dispenser', [DispenserController::class, 'store'])->name('dispenser.store');
    Route::get('/spbu/{id}/dispenser', [DispenserController::class, 'create'])->name('dispenser.create');

    Route::get('/cctv/{id}/edit', [CctvController::class, 'edit']);
    Route::put('/cctv/{id}', [CctvController::class, 'update']);
    Route::delete('/cctv/{id}', [CctvController::class, 'destroy']);
    Route::post('/cctv', [CctvController::class, 'store'])->name('cctv.store');
    Route::get('/spbu/{id}/cctv', [CctvController::class, 'create'])->name('cctv.create');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
});