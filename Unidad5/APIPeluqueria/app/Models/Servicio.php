<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model{
    //aqui creo una relacion de muchos a uno de la tabla detalle_Cita

    function detalle_cita(){
        return $this->belongsTo(Detalle_Cita::class);
    }

}
