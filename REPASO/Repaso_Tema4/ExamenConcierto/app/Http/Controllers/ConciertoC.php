<?php

namespace App\Http\Controllers;

use App\Models\Concierto;
use App\Models\Entrada;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConciertoC extends Controller
{
    function inicioM()
    {
        $conciertos = Concierto::orderBy('titulo')->get();
        //Otra forma de ponerlo return view('vistaInicio',['conciertos'=>$conciertos]);
        return view('vistaInicio', compact('conciertos'));
    }

    function entradasM(Request $r)
    {
        //obtenemos los datos del concierto, el request van a estar todos los campos del formulario
        $concierto = Concierto::find($r->c);

        if ($concierto == null) {
            return 'El concierto no existe';
        }
        return view('vistaEntrada', compact('concierto'));
    }

    function venderM(Request $r, $idC)
    {

        //* con el objeto de request $r hacemos las validaciones, la | lo que hace es unir
        $r->validate(['email' => 'required', 'numEntradas' => 'required|numeric|min:1|max:4']);

        try {
            //chequeamos q hay entradas suficientes, con el find
            $c = Concierto::find($idC);
            if ($c == null) {
                throw new Exception('El concierto no existe');
            }
            //como esta condicion no se puede hacer con validate en laravel, lo hacemos con un if donde nos dice
            //si el aforo es menor al numero de entradas nos muestra error
            if($c->aforo < $r->numEntradas){
                throw new Exception('El concierto no existe');

            }

            //*hacemos una transaccion para cree la venta y actualice el aforo
            DB::transaction(function () use($r,$c) {
                //creamos la entrada
                $e=new Entrada();

                //estamos rellenado los valores de la entrada
                $e->email=$r->email;
                $e->concierto_id=$c->id;
                $e->numEntradas=$r->numEntradas;
                $e->save();//guardamos para insertarlo

                //actualizamos el aforo del concierto
                $c->aforo-=$r->numEntradas;
                $c->save();
            });
        } catch (\Throwable $th) {
            return back()->with('mensaje', $th->getMessage());
        }
    }

    function borrarM($idC) {

        try {

            $concierto=Concierto::find($idC);

            if($concierto != null){
                $entradas=$concierto->entradas();

                if(empty($entradas)){
                    $concierto->delete();

                }else{
                    DB::transaction(function ()use($concierto,$entradas){
                        foreach ($entradas as $e){
                            $e->delete();
                        }

                        $concierto->delete();
                    });
                }


            }else{
                throw new Exception('No existe el concierto');
            }
        } catch (\Throwable $th) {
            return back()->with('mensaje', $th->getMessage());
        }

        return redirect()->route('rI')->with('mensaje','Concierto Borrado');

    }
}
