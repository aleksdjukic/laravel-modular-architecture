<?php

use Illuminate\Support\Facades\Route;
use Modules\Job\app\Http\Controllers\JobController;

Route::prefix('api/v1')->group(function () {
    Route::get('jobs', [JobController::class, 'index']);
    Route::get('jobs/{id}', [JobController::class, 'show']);

    Route::middleware('auth:api')->group(function () {
        Route::post('jobs', [JobController::class, 'store']);
        Route::put('jobs/{id}', [JobController::class, 'update']);
        Route::delete('jobs/{id}', [JobController::class, 'destroy']);
    });
});
