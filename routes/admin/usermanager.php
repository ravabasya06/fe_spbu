<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
    Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
});