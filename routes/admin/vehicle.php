<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/vehicle/{id}/edit', [VehicleController::class, 'edit']);
    Route::put('/vehicle/{id}', [VehicleController::class, 'update']);
    Route::delete('/vehicle/{id}', [VehicleController::class, 'destroy']);
    Route::post('/vehicle', [VehicleController::class, 'store'])->name('vehicle.store');
    Route::get('/spbu/{id}/vehicle', [VehicleController::class, 'create'])->name('vehicle.create');
});