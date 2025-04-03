<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model{
    //en el modelo vamos hacer las relaciones de las tablas
    use HasFactory;

    function prestamos(){
    //Relación 1:N entre prestamo y libro
    //Un prestamo puede tener varios libros
        return $this->hasMany(Prestamo::class)->get();
    }
}
