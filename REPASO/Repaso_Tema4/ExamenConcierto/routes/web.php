<?php

use App\Http\Controllers\ConciertoC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('rI');
});

//Creamos un grupo de ruta para el controlador de ConciertoC
Route::controller(ConciertoC::class)->group(
    function (){
        //Utilizamos get para ver los datos, post para añadir
        // Route::get('nombreRuta,'nombreMetodo')->name('nombreAlias');

        Route::get('inicio','inicioM')->name('rI');
        Route::get('entradas','entradasM')->name('rE');
        Route::post('entradas/{idConcierto}','venderM')->name('rV');
        Route::delete('concierto/{idConcierto}','borrarM')->name('rB');
    }
);