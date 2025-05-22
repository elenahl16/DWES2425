<?php

use App\Http\Controllers\PilotoC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PilotoC::class)->group(
    function(){

    Route::get('inicio','inicioM')->name('rI');
    Route::post('piloto','crearPiloto')->name('rP');
    //? Para modificar tenemos que hacer dos rutas una para recuperar por id los valores que queremos modificar
    Route::get('verModificado/{idP}','editar')->name('rModif');
    Route::put('modificarP/{idP}','modificarPiloto')->name('rM');
    //?

    Route::delete('eliminarP/{idP}','borrarPiloto')->name('rE');

});