<?php

use App\Http\Controllers\RecursoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('inicio');
});


//creamos las rutas
Route::post('reserva', [ReservaController::class,'store'])->withoutMiddleware([VerifyCsrfToken::class]);//ruta donde define los metodos CRUD sin verificar el token
Route::get('reserva', [ReservaController::class,'index'] )->name('inicio');
Route::get('recurso', [RecursoController::class,'recurso']);
