<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipRequest;
use App\Tip;

class TipController extends Controller
{
    
    public function index(Request $request,Tip $tips)
    {
        $dados = $tips->newQuery();
        
        if ($request->filled('categoria'))  $dados->whereIn('categoria_id',  $request->categoria);
        if ($request->filled('titulo'))  $dados->where('titulo', 'like', '%' . $request->titulo . '%');
        if ($request->filled('descricao'))  $dados->where('descricao', 'like', '%' . $request->descricao . '%');

        $dados = $dados->with(['categoria'])->orderBy('id', 'asc')->get();
      
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
