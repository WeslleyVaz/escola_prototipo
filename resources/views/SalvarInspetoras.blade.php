@extends('layouts.app')

@section('title', 'Cadastrar Inspetor(a)')
@section('page-heading', 'Cadastrar Inspetor(a)')
@section('active-page', 'inicio')
@section('navigation-role', 'coordination')
@section('role-label', 'Coordenação')
@section('role-initial', 'C')

@section('content')
    <section class="section-intro">
        <h2>Cadastro de inspetor(a)</h2>
        <p>Preencha os dados para criar o acesso da inspetor(a).</p>
    </section>

    <form id="form-salvar-inspetora" class="row g-3" novalidate>
        <div class="col-md-6">
            <label for="nome" class="form-label">Nome completo</label>
            <input type="text" class="form-control" id="nome" name="nome" maxlength="255" required>
        </div>
        <div class="col-md-6">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" inputmode="numeric" maxlength="14" required>
        </div>
        <div class="col-md-6">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" minlength="6" required>
        </div>
        <div class="col-md-6">
        <label for="imagem" class="form-label">imagem</label>
        <input class="form-control form-control-sm" type="file" id="imagem" name=imagem>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-sesi" id="SalvarI">Salvar inspetor(a)</button>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        
    </form>

    @vite(['resources/js/cadastro_funcionario.js'])
@endsection