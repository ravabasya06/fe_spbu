<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;

Route::middleware('auth')->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy']);
    Route::get('/password', [PasswordController::class, 'index'])->name('password.index');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});