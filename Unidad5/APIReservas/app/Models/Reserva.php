<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Reserva extends Model{
    //Aqui hacemos la relacion de "Muchos a Uno"

    function recurso(){
        return $this->hasMany(Recurso::class);
    }
}
