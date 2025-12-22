<?php

use Illuminate\Support\Facades\Route;
use Modules\Application\app\Http\Controllers\ApplicationController;

Route::prefix('api/v1')->group(function () {
    // Public: candidate applies for job
    Route::post('applications', [ApplicationController::class, 'store']);

    // Protected (company owner/admin): list/manage applications
    Route::middleware('auth:api')->group(function () {
        Route::get('applications', [ApplicationController::class, 'index']);
        Route::get('applications/{id}', [ApplicationController::class, 'show']);
        Route::patch('applications/{id}/status', [ApplicationController::class, 'updateStatus']);
        Route::delete('applications/{id}', [ApplicationController::class, 'destroy']);
    });
});
