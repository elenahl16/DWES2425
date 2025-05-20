<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\Servicio;
use Illuminate\Http\Request;


class ConductorC extends Controller
{
    function inicioM()
    {
        //aqui lo que hacemos en el metodo es que nos rediriga a la vista inicio
        return view('vistaInicio');
    }

    function verServicio(Request $r){

        //primero comprobamos que se ha rellenado el dni lo hacemos con validate,
        // utilizamos find cuando queremos buscar por clave primaria

        $r->validate([
            'dni' => 'required'
        ]);

        try {
            //despues tenemos que hacer una consulta con where a la tabla conductor y
            // ponemos first porque solo queremos obtener el primer registro que cumpla la condicion de la consulta
            $conductor = Conductor::where('dni', $r->dni)->first();

            //comprobamos que ese conductor exista, si no existe le
            if ($conductor == null) {
                return back()->with('mensaje', 'Error no existe ningun conductor con ese dni');

            } else {
                //si existe comprobamos que ese conductor tiene servicios cuando tenemos que hacer una
                //consulta que tenga and se pone otro where
                $servicio = Servicio::where('fecha', date('Y-m-d'))->where('conductor_id', $r->dni)->first();

                //si no hay servicio,creamos el servicio y lo hacemos llamando a la clase Servicio
                if ($servicio == null) {
                    $s = new Servicio();

                    //vamos rellenando los datos de servicio
                    $s->conductor_id = $conductor->id; //? aqui lo que hago es guardar en el objeto de la clase servicio
                    //? el id de conductor, que sacamos del objeto conductor de la consulta que hemos echo arriba el id
                    $s->fecha = date('Y-m-d');
                    $s->recaudacion = 0;
                    $s->save(); //guardamos para insertarlo

                } else {
                    //si hay servicio tenemos que redirigir a una ruta con parametros
                    return redirect()->route('rB', $conductor->id);
                }
            }
        } catch (\Throwable $th) {
            return back()->with('mensaje', $th->getMessage());
        }
    }

    function mostrarBillete($idC){

        try {
            //primero tenemos que recuperar el conductor
            $conductor=Conductor::find($idC);

            //comprobamos que el conductor existe
            if($conductor == null){
                return back()->with('mensaje', 'Error no existe ningun conductor con ese dni');

            }else{
                //si existe comprobamos el servicio, hacemois una consulta con where comprobando el dni del conductor y la fecha
                $servicio=Servicio::where('conductor_id',$conductor->id)->where('fecha', date('Y-m-d'))->first();

                if($servicio==null){
                    return back()->with('mensaje', 'Error no existe ningun conductor con ese dni');
                }else{

                    return view('vistaServicio',compact($conductor,$servicio));
                }

            }

        } catch (\Throwable $th) {
            return back()->with('mensaje', $th->getMessage());
        }

    }
}
