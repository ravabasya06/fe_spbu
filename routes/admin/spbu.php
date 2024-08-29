<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpbuController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/spbu/{id}/edit', [SpbuController::class, 'edit']);
    Route::put('/spbu/{id}', [SpbuController::class, 'update']);
    Route::delete('/spbu/{id}', [SpbuController::class, 'destroy']);
    Route::post('/spbu', [SpbuController::class, 'store'])->name('spbu.store');
    Route::get('/create', [SpbuController::class, 'create'])->name('spbu.create');
});