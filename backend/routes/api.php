<?php
use App\Http\Controllers\HealthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/health', HealthController::class);
Route::prefix('v1')->group(function () {
    Route::apiResource('clientes', \App\Http\Controllers\ClienteController::class);
});
