<?php

namespace App\Models;

use App\Http\Controllers\CitasController;
use Illuminate\Database\Eloquent\Model;

class Detalle_Cita extends Model{
    //belongsTo() define una relación de "Muchos a Uno"

    function citas(){
        return $this->belongsTo(Citas::class);
    }

    function servicio(){
        //aqui estamos diciendo que servicio tiene mucho a uno de la tabla servicio
        return $this->belongsTo(Servicio::class);
    }
}
