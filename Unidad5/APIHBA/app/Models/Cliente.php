<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    //aqui hacemos la relacion muchos a muchos de la tabla reproduciones

    function reproducciones(){
        return $this->hasMany(Reproduccion::class)->get();
    }

}
