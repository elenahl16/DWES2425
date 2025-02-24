<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    //belongsTo() define una relación de "Muchos a Uno"

    function reproduciones(){
        return $this->belongsTo(Reproduccion::class);
    }
}
