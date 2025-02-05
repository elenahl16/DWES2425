<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CitasController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //Aqui recupero todas las citas que vamos a tener

        try {
            return Citas::all();

        } catch (\Throwable $th) {
            return response()->json('Error'.$th);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //con el metodo store por defecto es donde crearemos las citas
        //primero tenemos que hacer las validaciones

        $request->validate([
            'fecha'=>'required',
            'hora'=>'required',
            'cliente'=>'required'
        ]);

        try {
            //creamos un objeto de la clase citas
            //request es para capturar los datos enviados
            $c= new Citas();
            $c->fecha=$request->fecha;//aqui lo que estamos es guardando en el objeto de la clase cita y le asignamos la fecha
            $c->hora=$request->hora;
            $c->cliente=$request->cliente;

            if($c->save()){
                return $c;
            }
            else{
                return response()->json('Error, no se ha podido crear la cita');
            }

        } catch (\Throwable $th) {
            return response()->json('Error:'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citas $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citas $citas)
    {
        //
    }
}
