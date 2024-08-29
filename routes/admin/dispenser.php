<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DispenserController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dispenser/{id}/edit', [DispenserController::class, 'edit']);
    Route::put('/dispenser/{id}', [DispenserController::class, 'update']);
    Route::delete('/dispenser/{id}', [DispenserController::class, 'destroy']);
    Route::post('/dispenser', [DispenserController::class, 'store'])->name('dispenser.store');
    Route::get('/spbu/{id}/dispenser', [DispenserController::class, 'create'])->name('dispenser.create');
});