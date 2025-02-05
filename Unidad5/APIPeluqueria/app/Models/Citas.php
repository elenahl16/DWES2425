<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model{
    //aqui tenemos que tener en cuenta las relaciones en la base de datos
    //lo que estamos diciendo es que el modelo cita tiene una relacion de "uno a muchos"
    //por eso utilizamos la funcion hasMany para definir la relacion entre lo modelos

    function detalle_citas(){
        return $this->hasMany(Detalle_Cita::class);
    }
}
