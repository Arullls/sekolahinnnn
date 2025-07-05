<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Api\SiswaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::delete('/menu/{id}', [MenuController::class, 'destroy']);



Route::middleware('auth:sanctum')->group(function () {

    Route::get('/siswa', [SiswaApiController::class, 'index']);
    Route::delete('/siswa/{id}', [SiswaApiController::class, 'destroy']);
    Route::post('/siswa', [SiswaApiController::class, 'store']);
});
