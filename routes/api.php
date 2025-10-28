<?php

use Illuminate\Http\Request;
use App\Http\Controllers\User\AuthController;

Route::post('register', [AuthController::class, 'registration']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Route::post('logout', [AuthController::class, 'logout']);
});
