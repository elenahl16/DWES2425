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


        return  response()->json(Reserva::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        /**En store es donde vamos a crear las reservas despues tenemos que hacer las validaciones,
          hacer un objeto de reserva, luego rellenarlos con los datos que viene en el request y luego guardarlos en la base de datos*/

         //1. tenemos que validar los datos
         $request->validate([]);
         try {

         } catch (\Throwable $th) {
            //throw $th;
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
