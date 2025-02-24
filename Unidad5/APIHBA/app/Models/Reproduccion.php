<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reproduccion extends Model {
    //belongsTo() define una relación de "Muchos a Uno"

    function clientes(){
        return $this->belongsTo(Cliente::class);
    }

    function contenidos(){
        return $this->belongsTo(Contenido::class);
    }
}
