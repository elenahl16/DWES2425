<?php

namespace App\Http\Controllers;

use App\Models\Piloto;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class PilotoC extends Controller
{
    function inicioM() {

        //aqui lo que hago es recuperar todos los datos de la base de datos
        $pilotos = Piloto::all();

        //*hago
        return view('vistaInicio', compact('pilotos'));
    }

    function crearPiloto(Request $r)
    {
        //validamos los datos del formulario con request

        $r->validate([
            'nombre' => 'required',
            'nacionalidad' => 'required',
            'escuderia' => 'required'
        ]);

        try {
            //una vez hemos valido creamos un objeto piloto
            $piloto = new Piloto();
            $piloto->nombre = $r->nombre;
            $piloto->nacionalidad = $r->nacionalidad;
            $piloto->escuderia = $r->escuderia;
            $piloto->save();

            return redirect()->route('rI');
        } catch (\Throwable $th) {
            return back()->with('mensaje', $th->getMessage());
        }
    }

    function editar($idP){

        $piloto = Piloto::find($idP);

        return view('vistaPiloto', compact('piloto'));
    }

    function borrarPiloto($idP)
    {

        try {
            //borramos por el id del piloto
            $piloto = Piloto::find($idP);
            $piloto->delete();

            return back()->with('rI', 'Piloto borrado Correctamente');
        } catch (\Throwable $th) {
            return back()->with('mensaje', $th->getMessage());
        }
    }

    function modificarPiloto(Request $r, $idP)
    {

        //validamos los datos del formulario

        $r->validate([
            'nombre' => 'required',
            'nacionalidad' => 'required',
            'escuderia' => 'required'
        ]);

        try {
            $piloto = Piloto::find($idP);

            $piloto = new Piloto();
            $piloto->nombre = $r->nombre;
            $piloto->nacionalidad = $r->nacionalidad;
            $piloto->escuderia = $r->escuderia;

            if ($piloto->save()) {

                return redirect()->route('rI', $idP);
            }
        } catch (\Throwable $th) {
            return back()->with('mensaje', $th->getMessage());
        }
    }
}
