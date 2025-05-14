<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{

    function concierto(){
        //Relación 1:N entre conciertos y entrada
        return $this->belongsTo(Concierto::class);
    }
}
