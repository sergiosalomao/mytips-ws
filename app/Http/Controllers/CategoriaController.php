<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Categoria $categoria)
    {
        $dados = $categoria->get();
        return response()->json($dados, 200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $dados = $request->all();
        $dados = Categoria::create($dados);
        return response()->json("Salvo com sucesso",200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Categoria::find($id);
        return response()->json($dados,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, $id)
    {
        $dadosRequest = $request->all();
        $dados = Categoria::find($id);
        $dados->update($dadosRequest);
        return response()->json("Atualizado com sucesso",200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $dados = Categoria::find($id); 
        $dados->delete();
        return response()->json("Registro excluido",200);
    }
}
