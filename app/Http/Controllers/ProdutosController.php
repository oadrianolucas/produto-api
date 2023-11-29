<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produtos::all();
        return response()->json($produtos);
    }

    public function store(Request $request)
    {
        $produto = new Produtos();
        $produto->name = $request->input('name');
        $produto->price = $request->input('price');
        $produto->description = $request->input('description');
        $produto->save();

        return response()->json(["message" => "Produto cadastrado com sucesso."], 201);
    }

    public function update(Request $request, $id)
    {
        $produto = Produtos::find($id);
        if (!$produto) {
            return response()->json(["message" => "Produto não encontrado."], 404);
        }

        $produto->name = $request->input('name');
        $produto->price = $request->input('price');
        $produto->description = $request->input('description');
        $produto->save();

        return response()->json(["message" => "Produto atualizado com sucesso."], 200);
    }

    public function show($id)
    {
        $produto = Produtos::find($id);
        if (!$produto) {
            return response()->json(["message" => "Produto não encontrado."], 404);
        }
        return response()->json($produto);
    }

    public function destroy($id)
    {
        $produto = Produtos::find($id);
        if (!$produto) {
            return response()->json(["message" => "Produto não encontrado."], 404);
        }

        $produto->delete();

        return response()->json(["message" => "Produto excluído com sucesso."], 200);
    }
}
