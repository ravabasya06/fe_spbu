<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpbuController;
use App\Http\Controllers\AnalysisController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PagesController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/analysis', [AnalysisController::class, 'index']);
Route::get('/analysis', [AnalysisController::class, 'search'])->name('analysis.search');
Route::get('/spbu/{id}', [SpbuController::class, 'index']);

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/register', [UserController::class, 'register']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);