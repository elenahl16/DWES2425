<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


/*
Route::post('reserva',[ReservaController::class, 'crearReserva'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::get('reserva', [ReservaController::class, 'obtenerReserva'])->name('inicio');
Route::get('recurso', [RecursoController::class, 'obtenerRecurso']);
*/
