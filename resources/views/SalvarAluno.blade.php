@extends('layouts.app')

@section('title', 'Cadastrar aluno(a)')
@section('page-heading', 'Cadastrar aluno(a)')
@section('active-page', 'inicio')
@section('navigation-role', 'coordination')
@section('role-label', 'Coordenação')
@section('role-initial', 'C')

@section('content')
    <section class="section-intro">
        <h2>Cadastro de aluno(a)</h2>
        <p>Preencha os dados para salvar o aluno(a).</p>
    </section>

    <form id="form-salvar-inspetora" class="row g-3" novalidate>
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome completo</label>
            <input type="text" class="form-control" id="nome" name="nome" maxlength="255" required>
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">Responsavel</label>
            <input type="text" class="form-control" id="cpf" name="cpf" inputmode="numeric" maxlength="14" required>
        </div>
        <div class="col-md-6">
            <label for="senha" class="form-label">RM</label>
            <input type="password" class="form-control" id="senha" name="senha" minlength="6" required>
        </div>
        <div class="col-md-6">
            <label for="senha" class="form-label">Turma</label>
            <input type="password" class="form-control" id="senha" name="senha" minlength="6" required>
        </div>
        <div class="col-md-6">
        <label for="imagem" class="form-label">imagem</label>
        <input class="form-control form-control-sm" type="file" id="imagem" name=imagem>
        </div>
        <div class="col-md-6">
            <label for="senha" class="form-label">Numero do responsavel</label>
            <input type="password" class="form-control" id="senha" name="senha" minlength="6" required>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-sesi" id="salvar-inspetora">Salvar aluno(a)</button>
        </div>
        <div class="col-12" id="resultado-cadastro" role="status" aria-live="polite"></div>
        
        <div class="form-field">
       
        </div>
        
    </form>

    @vite(['resources/js/cadastro_alunos.js'])
@endsection