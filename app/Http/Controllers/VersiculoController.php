<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Versiculo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Versiculo::create($request->all())) {
            return response()->json([
                'mensage' => 'Versiculo cadastrado com sucesso.'
            ], 200);
        }

        return response()->json([
            'mensage' => 'Erro ao cadastrar versiculo'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function show($versiculo)
    {
        $versiculo = Versiculo::find($versiculo);
        if ($versiculo) {
            return $versiculo;
        }

        return response()->json([
            'mensage' => 'Erro ao pesquisar o versiculo'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versiculo)
    {

        $versiculo = Versiculo::find($versiculo);

        if ($versiculo) {
            $versiculo->update($request->all());

            return $versiculo;
        }

        return response()->json([
            'mensage' => 'Erro ao atualizar o versiculo'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($versiculo)
    {
        if (Versiculo::destroy($versiculo)) {
            return response()->json([
                'mensage' => 'Versiculo deletado com sucesso.'
            ], 200);
        }

        return response()->json([
            'mensage' => 'Erro ao deletar versiculo'
        ], 404);
    }
}
