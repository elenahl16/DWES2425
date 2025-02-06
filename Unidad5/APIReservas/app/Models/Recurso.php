<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model{
    //aqui tenemos una relacion de uno a muchos

    function reserva(){
        return $this->belongsTo(Reserva::class);
    }
}
