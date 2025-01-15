<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Ruta sin autenticacion
Route::post('login', [LoginController::class,'login']);
Route::post('registro',[LoginController::class,'registro']);

//Ruta con autenticacion
Route::post('logout', [LoginController::class,'login'])->middleware('auth:sanctum');
Route::get('registro', [PedidoController::class,'registro'])->middleware('auth:sanctum');
Route::get('logout', [LoginController::class,'login'])->middleware('auth:sanctum');
Route::post('registro', [LoginController::class,'registro'])->middleware('auth:sanctum');

