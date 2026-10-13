@extends('layouts.app')

@section('title', 'Registrar Saída Antecipada')
@section('page-heading', 'Registrar Saída Antecipada')
@section('active-page', 'saidas')
@section('navigation-role', 'coordination')
@section('role-label', 'Coordenação')
@section('role-initial', 'C')

@section('content')
    <p class="content-description">Preencha os dados para registrar a saída do aluno.</p>

    <section class="form-card departure-form-card">
        <h2>Dados da saída</h2>

        <form class="form-grid">
            <label class="field-group">
                <span>Aluno</span>
                <select class="form-select"><option>Selecione o aluno</option></select>
            </label>
            <label class="field-group">
                <span>Turma</span>
                <input class="form-control" type="text" placeholder="Preenchido automaticamente" readonly>
            </label>
            <label class="field-group">
                <span>Data</span>
                <input class="form-control" type="text" placeholder="DD/MM/AAAA">
            </label>
            <label class="field-group">
                <span>Horário de saída</span>
                <input class="form-control" type="text" placeholder="00:00">
            </label>
            <label class="field-group">
                <span>Responsável pela retirada</span>
                <input class="form-control" type="text" placeholder="Nome completo">
            </label>
            <label class="field-group">
                <span>Motivo</span>
                <select class="form-select"><option>Selecione o motivo</option></select>
            </label>
            <label class="field-group field-full">
                <span>Observações</span>
                <textarea class="form-control" rows="3" placeholder="Informações adicionais (opcional)"></textarea>
            </label>

            <div class="form-actions field-full">
                <a class="btn btn-light-outline" href="{{ route('saidas-antecipadas') }}">Cancelar</a>
                <button class="btn btn-sesi" type="button">Registrar saída</button>
            </div>
        </form>
    </section>
@endsection
