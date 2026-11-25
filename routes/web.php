<?php

use App\Http\Controllers\DashboardGestaoController;
use App\Http\Controllers\DashboardInspetorasController;
use App\Http\Controllers\inspetoraController;
use App\Http\Middleware\LogadoGestaoMiddleware;
use App\Http\Middleware\LogadoWebMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::view('/', 'inicio')->name('inicio');

Route::view('/login-inspetoras', 'login-inspetoras')->name('login-inspetoras');
Route::view('/login-gestao', 'login-gestao')->name('login-gestao');

Route::view('/dashboard-inspetoras', 'dashboard-inspetoras')->name('dashboard-inspetoras');
Route::view('/dashboard-coordenacao', 'dashboard-coordenacao')->name('dashboard-coordenacao');

Route::view('/alunos', 'alunos', ['isManagement' => false])->name('alunos');
Route::view('/alunos-gestao', 'alunos', ['isManagement' => true])->name('alunos-gestao');

Route::view('/ocorrencias', 'ocorrencias')->name('ocorrencias');

Route::view('/confirmar-ocorrencia', 'registrar-ocorrencia')->name('confirmar-ocorrencia');
Route::view('/consulta-ocorrencias', 'consulta-ocorrencias')->name('consulta-ocorrencias');
Route::view('/detalhes-ocorrencia', 'detalhes-ocorrencia')->name('detalhes-ocorrencia');

Route::view('/saidas-antecipadas', 'saidas-antecipadas')->name('saidas-antecipadas');
Route::view('/registrar-saida-antecipada', 'registrar-saida-antecipada')->name('registrar-saida-antecipada');

Route::view('/relatorios', 'relatorios')->name('relatorios');

// login inspetoras//
Route::redirect('/login_teste', '/login-inspetoras')->name('login_teste');
Route::get('/dashboard-inspetoras', [DashboardInspetorasController::class, 'index_inspetora'])->middleware(LogadoWebMiddleware::class)->name('dashboard-inspetoras');

// login gestao//
Route::get('/dashboard-coordenacao', [DashboardGestaoController::class, 'index_gestao'])->middleware(LogadoGestaoMiddleware::class)->name('dashboard-coordenacao');

// salvar inspetora//
Route::get('/salvar_inspetora', [inspetoraController::class, 'salvar_inspetoras'])->middleware(LogadoGestaoMiddleware::class);

//registro de ocorrencia//
Route::get('/registrar-ocorrencia', [inspetoraController::class, 'registrar_ocorrencia'])->name('registrar-ocorrencia');
Route::get('/confirmar-ocorrencia', [inspetoraController::class, 'registrar-ocorrencia'])->name('confirmar-ocorrencia');

//mostrar tabela teste//
Route::get('/TabelaTeste', [AlunoController::class, 'TabelaTeste'])->middleware(LogadoWebMiddleware::class);

//salvar aluno//
Route::get('/SalvarAluno', [AlunoController::class, 'salvar_aluno'])->middleware(LogadoGestaoMiddleware::class);