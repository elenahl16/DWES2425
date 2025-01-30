<?php

use App\Http\Controllers\RecursoController;
use App\Http\Controllers\ReservaController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('inicio');
});


Route::post('reserva', [ReservaController::class,'reserva'])->withoutMiddleware([VerifyCsrfToken::class]);
Route::get('reserva', [ReservaController::class,'index'] )->name('inicio');
Route::get('recurso', [RecursoController::class,'recurso'] );
