<?php

namespace App\Http\Controllers;

use App\Models\Versao;
use Illuminate\Http\Request;

class VersaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Versao::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Versao::create($request->all())) {
            return response()->json([
                'message' => 'Versāo criado com sucesso!'
            ], 201);

            return response()->json([
                'message' => 'Erro ao criar versāo!'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($versao)
    {
        $versao = Versao::find($versao);
        if ($versao) {
            $versao->idioma;
            $versao->livros;
            return $versao;
        }

        return response()->json([
            'message' => 'Idioma não encontrado!'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versao)
    {
        $versao = Versao::find($versao);
        if ($versao) {
            $versao->update($request->all());
            return $versao;
        }

        return response()->json([
            'message' => 'Erro ao atualizar versāo!'
        ], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($versao)
    {
        if (Versao::destroy($versao)) {
            return response()->json([
                'mensage' => 'Versāo deletada com sucesso.'
            ], 200);
        }

        return response()->json([
            'mensage' => 'Erro ao deletar versāo'
        ], 404);
    }

}
