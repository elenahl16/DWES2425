<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //relacion 1:n entre producto y carrito
    //un producto puede tener varios registros en carrito

    function productosCarrito(){
        return $this->hasMany(Carrito::class)->get();
    }

    //relacion 1:n entre producto y pedido
    //un producto puede tener varios registros en carrito
    function pedidos(){
        return $this->hasMany(Carrito::class)->get();
    }
}
