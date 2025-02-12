<?php

use App\Http\Controllers\RecursoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('inicio');
});


//creamos las rutas
Route::get('reserva', [ReservaController::class,'index']);

//crear reserva
Route::post('reserva', [ReservaController::class,'store'])->withoutMiddleware([VerifyCsrfToken::class]);//ruta donde define los metodos CRUD sin verificar el token
//obtener los recursos existentes, los tenemos que recuperar
Route::get('recurso', [RecursoController::class,'index']);
