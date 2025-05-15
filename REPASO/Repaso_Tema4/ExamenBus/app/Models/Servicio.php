<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model{
    //belongTo significa que "1:1"

    function billetes(){
        return $this->belongsTo(Billete::class);
    }
}
