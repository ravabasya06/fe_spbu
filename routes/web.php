<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\SpbuController;

// General
Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/analysis', [AnalysisController::class, 'index'])->name('analysis.index');
    Route::get('/spbu/{id}', [SpbuController::class, 'index'])->name('spbu.index');
});

// User
require __DIR__.'/auth.php';
require __DIR__.'/profile.php';
require __DIR__.'/admin/usermanager.php';

// SPBU
require __DIR__.'/admin/spbu.php';
require __DIR__.'/admin/dispenser.php';
require __DIR__.'/admin/cctv.php';
require __DIR__.'/admin/detection.php';
require __DIR__.'/admin/vehicle.php';