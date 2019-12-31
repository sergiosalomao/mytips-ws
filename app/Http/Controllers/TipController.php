<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipRequest;
use App\Tip;

class TipController extends Controller
{
    
    public function index()
    {
        $dados = Tip::get();
        return response()->json($dados,200);
    }

    public function store(TipRequest $request)
    {
        $dados = $request->all();
        Tip::create($dados);
        return response()->json("salvo com sucesso",200);
    }

    public function show($id)
    {
        $dados = Tip::find($id);
        return response ()->json($dados,200);
    }

    public function update(TipRequest $request, $id)
    {
        $dados = Tip::find($id);
        $dados->update($request->all());
        return response()->json("atualizado com sucesso");
    }

    public function destroy($id)
    {
        $dados = Tip::find($id);
        $dados->delete();
        return response()->json("Registro excluido com sucesso",200);
    }
}
