<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductosC extends Controller
{
    function __construct()
    {
        //Comprobar si hay us logueado con Middelware Auth
        $this->middleware('auth');
    }

    function verProductos()
    {

        //recuperamos los productos (equivale a select * from productos) y lo devuelve en un array
        //el compact es para pasar datos
        $productos = Producto::all();
        return view('productos/verProductos', compact('productos'));
        //return view('productos/verProductos',('productos'=>$productos));
    }

    function addCarrito(Request $request)
    { //se pone request cuando hacemos una ruta con post
        //Comprueba si hay stock y en caso afirmativo inserta el producto en el carrito

        //obtener los datos del producto, equivale a select * from productos where id=idP
        $p = Producto::find($request->btnAdd);
        if ($p != null) {
            if ($p->stock > 0) {

            } else {
                return back()->with('error,No hay stock del producto' . $p->nombre);
            }
        }else{
            return back()->with('error,No hay stock del producto' . $request->btnAdd );
        }
    }
}
