<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{

    function concierto(){
        //Relación 1:N entre conciertos y libro
        return $this->belongsTo(Concierto::class);
    }
}
