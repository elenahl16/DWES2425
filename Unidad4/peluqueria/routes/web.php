<?php

use app\Http\Controllers\CitaC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(CitaC::class)->group(
    function(){
        Route::get('citas','verCitas')->name('verCitas');//get es para ver
        Route::put('citas/{id}','modificarCita')->name('modificarC');//put para modificar citas
        Route::delete('citas/{id}','borrarCita')->name('borrarC');//delete es para borrar
        Route::post('citas','crearCita')->name('crearC'); //post es para crear
        Route::get('detalle/{id}','crearDetalle')->name('crearDetalle');


    }
);