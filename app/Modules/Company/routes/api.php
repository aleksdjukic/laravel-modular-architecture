<?php

use Illuminate\Support\Facades\Route;
use Modules\Company\app\Http\Controllers\CompanyController;

Route::prefix('api/v1')->middleware('auth:api')->group(function () {
    Route::post('companies', [CompanyController::class, 'store']);
    Route::put('companies/{id}', [CompanyController::class, 'update']);
});
