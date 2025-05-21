<?php

use App\Http\Controllers\LibroC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Vamos a crear un grupo de rutas que van a ser gestionadas por el controlador LibroC
Route::controller(LibroC::class)->group(function () {
    
    // Ruta que muestra todos los libros en la vista inicio
    Route::get('inicio', 'inicioM')->name('rI');

    // Ruta que recibe el formulario para crear un nuevo libro
    Route::post('libro', 'crearLibro')->name('rL');
});
