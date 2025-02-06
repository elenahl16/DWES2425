<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //El index es donde vamos a recuperar todas las reservas que tenemos en la base de datos y devolverlas en formato json

        try {
            return Reserva::all();

        } catch (\Throwable $th) {
            return response()->json('Error'.$th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        /**En store es donde vamos a crear las reservas despues tenemos que hacer las validaciones,
          hacer un objeto de reserva, luego rellenarlos con los datos que viene en el request y luego guardarlos en la base de datos*/

         //1. tenemos que validar los datos
        $request->validate([
            'id'=>'required',
            'empleado'=>'required',
            'fechaI'=>'required',
            'fehcaF'=>'required',
            'recurso_id'=>'required'
        ]);

        try {
            //creamos el objeto de la clase reserva
            //request es para capturar los datos enviados
            $reserva=new Reserva();

            $reserva->id=$request->id;
            $reserva->empleado=$request->empleado;
            $reserva->fechaI=$request->fechaI;
            $reserva->fechaF=$request->fechaF;
            $reserva->recurso_id=$request->recurso_id;

            if($reserva->save()){
                return $reserva;
            }else{
                return response()->json('Error, no se ha podido crear la reserva');
            }

        } catch (\Throwable $th) {
            return response()->json('Error'.$th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        //
    }
}
