<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosC extends Controller{

    //Comprobar si hay us loqueado con Middelware Auth
    //$this->middleware('auth');
}

function verProducto(){
    return view('productos/verProductos');
}
