<?php

use App\Http\Controllers\Api\DriverAuthController;
use App\Http\Controllers\Api\DriverScanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/driver/auth', [DriverAuthController::class, 'auth']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/scan/{qrToken}', [DriverScanController::class, 'show']);
    Route::post('/scan/{qrToken}/confirm', [DriverScanController::class, 'confirm']);
});