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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
