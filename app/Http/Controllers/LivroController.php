<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Livro::create($request->all())) {
            return response()->json([
                'mensage' => 'Livro cadastrado com sucesso.'
            ], 200);
        }

        return response()->json([
            'mensage' => 'Erro ao cadastrar livro'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($livro)
    {
        $livro = Livro::find($livro);
        if ($livro) {

            $livro->testamento;
            $livro->versiculo;
            $livro->versao;

            return $livro;
        }

        return response()->json([
            'mensage' => 'Erro ao pesquisar o livro'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $livro)
    {
        $livro = Livro::find($livro);

        if ($livro) {
            $livro->update($request->all());

            return $livro;
        }

        return response()->json([
            'mensage' => 'Erro ao atualizar o livro'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($livro)
    {
        if (Livro::destroy($livro)) {
            return response()->json([
                'mensage' => 'Livro deletado com sucesso.'
            ], 200);
        }

        return response()->json([
            'mensage' => 'Erro ao deletar livro'
        ], 404);
    }
}
