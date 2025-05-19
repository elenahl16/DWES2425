<?php

namespace App\Http\Controllers;

use App\Models\Conductor as ModelsConductor;
use Conductor;
use Illuminate\Http\Request;

class ConductorC extends Controller
{
    function inicioM(){
        //aqui lo que hacemos en el metodo es que nos rediriga a la vista inicio
        return view('vistaInicio');
    }

    function verServicio(Request $r,$dni){

        //chequeamos que el dni que introduzcan existe, utilizamos find cuando queremos buscar por clave primaria
        



    }
}
