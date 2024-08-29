<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetectionController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/detection/{id}/edit', [DetectionController::class, 'edit']);
    Route::put('/detection/{id}', [DetectionController::class, 'update']);
    Route::delete('/detection/{id}', [DetectionController::class, 'destroy']);  
    Route::post('/detection', [detectionController::class, 'store'])->name('detection.store');
    Route::get('/spbu/{id}/detection', [DetectionController::class, 'create'])->name('detection.create');
});
