<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Servicio;

class Conductor extends Model
{
    //aqui vamos hacer laS Relaciones que hay entre las tablas
    //hasMany significa que la relacion tiene "Muchos a Uno"

    function servicios(){

        return $this->hasMany(Servicio::class)->get();
    }
}
