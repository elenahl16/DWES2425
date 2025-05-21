<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model{
    //hasMany significa que "1:N"

    function billetes(){
        return $this->hasMany(Billete::class)->get();
    }

    function Conductor(){
        return $this->belongsTo(Conductor::class);

    }
}
