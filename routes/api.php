<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\gestaoController;
use App\Http\Controllers\inspetoraController;
use App\Http\Controllers\Ocorrencias_gestaoController;
use App\Http\Controllers\Ocorrencias_inspetorasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// OCORRENCIA FOR GESTAO
Route::get('/ver_ocorrencia', [Ocorrencias_gestaoController::class, 'ver_ocorrencia']);

Route::put('/alterar_ocorrencia', [Ocorrencias_gestaoController::class, 'alterar_ocorrencia']);

Route::delete('/deletar_ocorrencia', [Ocorrencias_gestaoController::class, 'deletar_ocorrencia']);

Route::get('/listar_ocorrencias', [Ocorrencias_gestaoController::class, 'listar_ocorrencias']);

Route::get('/listar_ocorrencias_simples', [Ocorrencias_gestaoController::class, 'listar_ocorrencias_simples']);

// INSPETORAS

Route::post('/salvar_inspetora', [inspetoraController::class, 'salvar_inspetora']);

Route::get('/ver_inspetora', [inspetoraController::class, 'ver_inspetora']);

Route::get('/listar_inspetoras', [inspetoraController::class, 'listar_inspetoras']);

// alunos
Route::post('/salvar_aluno', [AlunoController::class, 'salvar_aluno']);

// gestao
Route::post('/salvar_gestao', [gestaoController::class, 'salvar_gestao']);
Route::get('/listar_gestao', [gestaoController::class, 'listar_gestao']);

// OCORRENCIA FOR INSPETORA
Route::post('/salvar_ocorrencias', [Ocorrencias_inspetorasController::class, 'salvar_ocorrencias']);
