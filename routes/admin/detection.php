<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetectionController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::delete('/detection/{id}', [DetectionController::class, 'destroy']);  
});
