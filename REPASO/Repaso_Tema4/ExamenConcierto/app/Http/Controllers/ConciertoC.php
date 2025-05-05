<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConciertoC extends Controller{

    function inicioMetodo(){
        return 'pagina de inicio';
    }

    function entradasM($idC){
        return 'pagina de entradas del concierto '.$idC;
    }

    function borrarConciertoM($idC){
        return 'pagina de borrar entradas del concierto '.$idC;
    }
}
