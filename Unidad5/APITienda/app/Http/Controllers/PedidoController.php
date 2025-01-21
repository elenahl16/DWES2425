<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\CountValidator\Exact;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //Devolver pedidos de usuario logueados

        try {
            return Pedido::where('user_id',Auth::user()->id)->get();

        } catch (\Throwable $th) {
            return response()->json('Error: '.$th->getMessage(),500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        //Antes vamos hacer las validaciones
        $request->validate([
            'producto'=>'required',
            'cantidad'=>'required'
        ]);
        //Crear pedido
        try {
            DB::transaction(function () use ($request){
                //Obtenemos el producto y validamos el stock

                $p=Producto::find($request->producto);
                if($p!=null and $p->stock=$request->cantidad){
                    $pedido = new Pedido();
                    $pedido->producto_id=$p->id;
                    $pedido->cantidad=$request->cantidad;
                    $pedido->precioU=$p->precio;
                    $pedido->user_id=Auth::user()->id;

                    //creamos el pedido
                    if($pedido->save()){

                        //Actualizamos el stock del productp
                        $p->stock=$pedido->cantidad;
                        if($p->save()){
                           //return response()->json($pedido,200);
                        }
                    }

                }else {
                    throw new Exception('El producto no existe o no hay stock');
                }
            });

            return response()->json('Pedido creado',200);

        } catch (\Throwable $th) {

            return response()->json('Error: '.$th->getMessage(),500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
