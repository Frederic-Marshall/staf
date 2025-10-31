<?php

use Illuminate\Http\Request;
use App\Http\Controllers\User\AuthController;


Route::prefix('users')->group(function () {
    Route::post('registration', [AuthController::class, 'registration']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
    });
});
