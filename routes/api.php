<?php

use App\Http\Controllers\Api\V1\MovementController;
use App\Http\Controllers\Api\V1\PersonalRecordController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/movements', [MovementController::class, 'index']);
    Route::get('/personal-record/{movement_id}', [PersonalRecordController::class, 'index']);
});
