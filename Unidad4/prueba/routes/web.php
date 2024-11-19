<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('holaMundo');
});

Route::get('/alumnos', function () {
    return 'Bienvenidos Alumnos';
});

Route::get('/alumnos/{nombre}', function ($nombreA) {
    //aqui estoy definiendo una ruta con el nombre 
    return 'Bienvenido ' .$nombreA;
});

Route::get('/alumnos/insertar/{nombre}', function ($nombreA) {
    //aqui estoy definiendo una ruta con el nombre 
    return 'Página para crear alumno ' .$nombreA;
}); 