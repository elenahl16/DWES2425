<?php

use App\Http\Controllers\CitaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('citas', [CitaController::class,'store'] )->middleware('auth:sanctum');//creamos una cita

