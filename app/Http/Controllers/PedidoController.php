<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedido;
//use App\Models\pedidoitem;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pedido::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Pedido::create($request->all())) {
            return response()-> json([
                'message' => 'Pedido cadastrado com sucesso'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastra o pedido'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::where("id", $id)->first();
        if ($pedido) {
            return $pedido;
        }

        return response()->json([
            'message' => 'Registro, não localizado'
        ], 404);
    }

    public function pedido_criado()
    {
        return Pedido::where("CodPedidoStatus", 2)->with('itens')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);

        if ($pedido) {
            $pedido->update($request->all());
            return $pedido;
        }

        return response()->json([
            'message' => 'Erro ao editaro'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Pedido::destroy($id)) {
            return response()->json([
                'message' => 'Registro '.$id.' Deletado com sucesso'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao deletar'
        ], 404);
    }
}
