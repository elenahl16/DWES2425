<?php

use App\Http\Controllers\ConductorC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Vamos a crear un grupo de ruta para el controlador de Conductor
Route::controller(ConductorC::class)->group(function () {

    //*Utilizamos get para ver los datos, post para añadir, put para modificar y delete para borrar
    //? Route::get('nombreRuta,'nombreMetodo')->name('nombreAlias'); el alia

    Route::get('inicio','inicioM')->name('rI');
    Route::post('servicio', 'verServicio')->name('rS');
    Route::get('billete/{idC}','mostrarBillete')->name('rB');
    Route::post('ventaBillete/{idS}','venderBillete')->name('rv');
});
