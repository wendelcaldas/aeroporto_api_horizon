<?php

use App\Http\Controllers\AeroportoController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\VooController;
use App\Http\Controllers\PassagemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/aeroportos/{id?}', [AeroportoController::class, 'buscaAeroporto']);

Route::get('/classes', [ClassesController::class, 'listarClasses']);
Route::post('/classe/cadastrar', [ClassesController::class, 'criarClasse']);
Route::post('/classe/desativar', [ClassesController::class, 'desativaClasse']); 
Route::post('/classe/ativar', [ClassesController::class, 'ativaClasse']);

Route::post('/voo/cadastrar', [VooController::class, 'cadastrarVoo']);
Route::post('/voo/atualizar-partida', [VooController::class, 'alteraHorarioVoo']);
Route::post('/voo/cancelar', [VooController::class, 'cancelarVoo']);
Route::get('/voos', [VooController::class, 'listaVoo']);

Route::post('/passagem/preco', [PassagemController::class, 'alterarValorPassagem']);