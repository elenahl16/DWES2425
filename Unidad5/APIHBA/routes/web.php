<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContenidoController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    return view('welcome');
});

//creamos la ruta por get para obtener los todos los contenidos
Route::get('/contenido',[ContenidoController::class,'index']);

Route::post('/reproducciones',[ClienteController::class,'obtenerReproducciones'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::post('/ver',[ClienteController::class,'reproducir'])->withoutMiddleware([VerifyCsrfToken::class]);
