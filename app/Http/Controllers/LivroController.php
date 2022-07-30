<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function obterTodos()
    {
        $livros = Livro::all();

        return response()->json(["livros" => $livros], 200);
    }

    public function salvar(Request $request)
    {
        $livro = Livro::create($request->all());

        return response()->json(["livro" => $livro], 201);
    }

    public function excluir($id)
    {
        $livro = Livro::find($id);

        if (empty($livro)) {
            return response()->json("Livro não encontrado!");
        }

        Livro::destroy($id);

        return response()->json("Livro excluido com sucesso.");

    }
}

