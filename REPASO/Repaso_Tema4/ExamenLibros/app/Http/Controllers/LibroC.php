<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;


class LibroC extends Controller
{
    function inicioM()
    {
        //primero lo que tenemos que hacer es una consulta para mostrar todos los libros que hay recuperandolos
        $libro = Libro::all();
        return view('vistaInicio', compact('libro'));
    }

    function crearLibro(Request $r)
    {

        //Primero lo que hago es validar el titulo
        $r->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'numEjemplares' => 'required',
            'fecha' => 'required',
        ]);

        try {
            //hacemos una consulta donde vamos a comprobar si existe un libro con el mismo
            //valor que se escriba en el formulario
            $l = Libro::where('titulo', $r->titulo)->first();

            //si el libro existe, nos muestra un mensaje de error
            if ($l != null) {
                return back()->with('mensaje', 'Error, ya existe un libro con ese titulo');
            }
            //si no existe creamos un libro
            $libro = new Libro();

            $libro->titulo = $r->titulo; //? "Guarda en el campo titulo del objeto $libro
            //?el valor que viene del formulario ($r->titulo)."
            $libro->autor = $r->autor;
            $libro->num_ejemplares = $r->numEjemplares;
            $libro->fechaPublicacion = $r->fecha;
            $libro->save();

            return redirect()->route('rI');
        } catch (\Throwable $th) {
            return back()->with('mensaje', $th->getMessage());
        }
    }
}
