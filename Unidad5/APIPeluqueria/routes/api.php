<?php

use App\Http\Controllers\CitasController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//hay que hacer uno por get para obtener los datos
Route::get('citas', [CitasController::class,'index'] );

//creamos la ruta, con post para crear
Route::post('citas', [CitasController::class,'store'])->withoutMiddleware([VerifyCsrfToken::class]);

//Ver citas: Mostrará los datos de la cita, así como el importe total de la misma
//(suma de los precios de su detalle. 0 si aún no hay detalle)


//obtener detalle cita
Route::get('detalleCita', [CitasController::class,'obtenerDetalleCita']);
