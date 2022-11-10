<?php

use App\Http\Controllers\TestamentoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
