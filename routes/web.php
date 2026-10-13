<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'inicio')->name('inicio');

Route::view('/login-inspetoras', 'login-inspetoras')->name('login-inspetoras');
Route::view('/login-gestao', 'login-gestao')->name('login-gestao');

Route::view('/dashboard-inspetoras', 'dashboard-inspetoras')->name('dashboard-inspetoras');
Route::view('/dashboard-coordenacao', 'dashboard-coordenacao')->name('dashboard-coordenacao');

Route::view('/alunos', 'alunos', ['isManagement' => false])->name('alunos');
Route::view('/alunos-gestao', 'alunos', ['isManagement' => true])->name('alunos-gestao');

Route::view('/ocorrencias', 'ocorrencias')->name('ocorrencias');
Route::view('/registrar-ocorrencia', 'registrar-ocorrencia')->name('registrar-ocorrencia');
Route::view('/confirmar-ocorrencia', 'registrar-ocorrencia')->name('confirmar-ocorrencia');
Route::view('/consulta-ocorrencias', 'consulta-ocorrencias')->name('consulta-ocorrencias');
Route::view('/detalhes-ocorrencia', 'detalhes-ocorrencia')->name('detalhes-ocorrencia');

Route::view('/saidas-antecipadas', 'saidas-antecipadas')->name('saidas-antecipadas');
Route::view('/registrar-saida-antecipada', 'registrar-saida-antecipada')->name('registrar-saida-antecipada');

Route::view('/relatorios', 'relatorios')->name('relatorios');
