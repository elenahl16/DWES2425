<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TareaController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //este metodo lo que va hacer es recuperar todas las tares y devolverlas en formato json

        try {
            $tarea=Tarea::all();
            return $tarea;

        } catch (\Throwable $th) {
            return response()->json('Error:'.$th->getMessage(),500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //Crear una tarea, validar datos
        $request->validate(
            [
            'fecha'=>'required',
            'hora'=>'required',
            'descripcion'=>'required',
            'prioridad'=>'required',
        ]
        );

        try {
            //crear una objeto tarea

            $t=new Tarea();
            if(isset($request->prioridad)){
                $t->prioridad=$request->prioridad;
            }

            $t->fecha=$request->fecha;
            $t->hora=$request->hora;
            $t->descripcion=$request->descripcion;

            if($t->save()){
                return response()->json(['mensaje'=>'Tarea creada','tarea'=>$t],201);
            }
            else{
                return response()->json('Error: No se ha creado la tarea',500);
            }
        } catch (\Throwable $th) {
            return response()->json('Error:'.$th->getMessage(),500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea){
        //Mostrar una tarea

        try {
            return $tarea;

        } catch (\Throwable $th) {
            return response()->json('Error:'.$th->getMessage(),500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea){
        //Modificar la tarea

        $request->validate(
            [
            'prioridad'=>'in:Alta,Media,Baja'
        ]
        );

        try {
            //crear una objeto tarea

            if(isset($request->fecha) and $tarea->fecha != $request->fecha){
                $tarea->fecha=$request->fecha;
            }
            if(isset($request->hora) and $tarea->hora != $request->hora){
                $tarea->hora=$request->hora;
            }
            if(isset($request->descripcion) and $tarea->descripcion != $request->descripcion){
                $tarea->descripcion=$request->descripcion;
            }
            if(isset($request->finalizada) and $tarea->finalizada != $request->finalizada){
                $tarea->prioridad=$request->prioridad;
            }
            if(isset($request->prioridad) and $tarea->prioridad != $request->prioridad){
                $tarea->finalizada=$request->finalizada;
            }

            //guardamos los cambios
            if($tarea->save()){
                return response()->json(['mensaje'=>'Tarea creada','tarea'=>$tarea],201);
            }
            else{
                return response()->json('Error: No se ha creado la tarea',500);
            }

        } catch (\Throwable $th) {
            return response()->json('Error:'.$th->getMessage(),500);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea){
        //borrar tarea

        try {
            if($tarea->delete()){
                return response()->json('Tarea borrada',204);
            }

        } catch (\Throwable $th) {
            return response()->json('Error:'.$th->getMessage(),500);
        }
    }
}
