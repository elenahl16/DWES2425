<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        //recuperamos  los datos

        try {
            return Recurso::all();

        } catch (\Throwable $th) {
            return response()->json('Error'.$th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'id'=>'required',
            'nombre'=>'required',
            'tipo'=>'required|in: Salas,Ordenadores,Discos Duros,Coche'
        ]);

        try {
            //creamos el objeto de la clase reserva
            //request es para capturar los datos enviados
            $recurso=new Recurso();

            $recurso->id=$request->id;
            $recurso->nombre=$request->empleado;
            $recurso->tipo=$request->fechaI;


            if($recurso->save()){
                return $recurso;
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
    public function show(Recurso $recurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recurso $recurso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recurso $recurso)
    {
        //
    }
}
