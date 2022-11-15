<?php

use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\VersiculoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

route::get('/teste', function(){
    return "Teste com sucesso!";
});

route::get('/testamento', [TestamentoController::class, 'index']);

route::get('/testamento/{id}', [TestamentoController::class, 'show']);

route::put('/testamento/{id}', [TestamentoController::class, 'update']);

route::post('/testamento', [TestamentoController::class, 'store']);

route::delete('/testamento/{id}', [TestamentoController::class, 'destroy']);


route::get('/livro', [LivroController::class, 'index']);

route::get('/livro/{id}', [LivroController::class, 'show']);

route::put('/livro/{id}', [LivroController::class, 'update']);

route::post('/livro', [LivroController::class, 'store']);

route::delete('/livro/{id}', [LivroController::class, 'destroy']);


route::get('/versiculos', [VersiculoController::class, 'index']);

route::get('/versiculos/{id}', [VersiculoController::class, 'show']);

route::put('/versiculos/{id}', [VersiculoController::class, 'update']);

route::post('/versiculos', [VersiculoController::class, 'store']);

route::delete('/versiculos/{id}', [VersiculoController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
