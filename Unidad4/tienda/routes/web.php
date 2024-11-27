<?php

use App\Http\Controllers\LoginC;
use App\Http\Controllers\ProductosC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inicio', function () {
    return view('inicio');
});

Route::controller(LoginC::class)->group(
    function(){
        Route::get('login', 'vistaLogin')->name('login');
        Route::post('login', 'loguear')->name('loguear');
        Route::get('registrar', 'vistaRegistro')->name('vistaRegistro');
        Route::post('registrar', 'registrar')->name('registrar');
        Route::get('cerrar', 'cerrarSesion')->name('cerrar');
    }
);


Route::controller(ProductosC::class)->group(
    function(){
        Route::get('/inicio','verProducto')->name('inicio')->middleware('auth');
    }
);