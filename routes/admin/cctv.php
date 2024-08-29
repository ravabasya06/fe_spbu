<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CctvController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/cctv/{id}/edit', [CctvController::class, 'edit']);
    Route::put('/cctv/{id}', [CctvController::class, 'update']);
    Route::delete('/cctv/{id}', [CctvController::class, 'destroy']);
    Route::post('/cctv', [CctvController::class, 'store'])->name('cctv.store');
    Route::get('/spbu/{id}/cctv', [CctvController::class, 'create'])->name('cctv.create');
});