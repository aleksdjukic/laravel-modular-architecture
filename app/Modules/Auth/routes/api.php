<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\app\Http\Controllers\AuthController;

Route::prefix('api/v1/auth')->group(function () {

    // 🔓 PUBLIC
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // 🔐 AUTHENTICATED
    Route::middleware('auth:api')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
    });
});
