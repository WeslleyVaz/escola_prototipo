<?php

use App\Http\Controllers\OcorrenciasController;
use App\Http\Controllers\inspetoraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//OCORRENCIAS
Route::get('/ver_ocorrencia', [OcorrenciasController::class, 'ver_ocorrencia']);

Route::post('/salvar_ocorrencias', [OcorrenciasController::class, 'salvar_ocorrencias']);

Route::post('/alterar_ocorrencia', [OcorrenciasController::class, 'alterar_ocorrencia']);

Route::delete('/deletar_ocorrencia', [OcorrenciasController::class, 'deletar_ocorrencia']);

Route::get('/listar_ocorrencias', [OcorrenciasController::class, 'listar_ocorrencias']);

Route::get('/listar_ocorrencias_simples', [OcorrenciasController::class, 'listar_ocorrencias_aluno']);


//INSPETORAS

Route::post('/salvar_inspetora', [inspetoraController::class, 'salvar_inspetora']);

Route::get('/ver_inspetora', [inspetoraController::class, 'ver_inspetora']);

Route::get('/listar_inspetoras', [inspetoraController::class, 'listar_inspetoras ']);