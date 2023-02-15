<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

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

Route::get('/teste', function(){
    return "Teste com sucesso";
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/pedido', [PedidoController::class, 'store']);
    Route::get('/pedido', [PedidoController::class, 'index']);
    Route::get('/pedido/{id}', [PedidoController::class, 'show']);
    Route::get('/pedido-criado', [PedidoController::class, 'pedido_criado']);
    Route::put('/pedido/{id}', [PedidoController::class, 'update']);
    Route::delete('/pedido/{id}', [PedidoController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

