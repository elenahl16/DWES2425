<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concierto extends Model{
    //en el modelo hacemos las relaciones que tienen entre si las tablas

    function entradas(){
        //Relación 1:N entre conciertos y libro
        return $this->hasMany(Concierto::class);
    }
}
