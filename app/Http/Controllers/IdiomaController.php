<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Idioma::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Idioma::create($request->all())) {
            return response()->json([
                'message' => 'Idioma criado com sucesso!'
            ], 201);

            return response()->json([
                'message' => 'Erro ao criar o idioma!'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idioma)
    {
        $idioma = Idioma::find($idioma);
        if ($idioma) {
            $idioma->versoes;
            return $idioma;
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
    public function update(Request $request, $idioma)
    {
        $idioma = Idioma::find($idioma);
        if ($idioma) {
            $idioma->update($request->all());
            return $idioma;
        }

        return response()->json([
            'message' => 'Erro ao atualizar idioma!'
        ], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idioma)
    {
        if (Idioma::destroy($idioma)) {
            return response()->json([
                'mensage' => 'idioma deletado com sucesso.'
            ], 200);
        }

        return response()->json([
            'mensage' => 'Erro ao deletar idioma'
        ], 404);
    }

}
