@extends('layouts.app')

@section('title', 'Registrar Ocorrência')
@section('page-heading', 'Registrar Ocorrência')
@section('active-page', 'ocorrencias')
@section('navigation-role', 'inspector')
@section('user-name', 'Amanda Silva')
@section('role-label', 'Inspetora Escolar')
@section('role-initial', 'A')

@section('content')
    <section class="form-card occurrence-form-card">
        <h2>{{ request()->routeIs('confirmar-ocorrencia') ? 'Confirmar Ocorrência' : 'Nova Ocorrência Disciplinar / Evento' }}</h2>

        <form class="form-grid" data-occurrence-form data-confirmation="{{ request()->routeIs('confirmar-ocorrencia') ? 'true' : 'false' }}" data-confirmation-url="{{ route('confirmar-ocorrencia') }}" data-edit-url="{{ route('registrar-ocorrencia') }}">
            <label class="field-group field-student">
                <span>Aluno</span>
                <span class="field-with-icon">
                    <input class="form-control" type="search" placeholder="Pesquise pelo nome ou RM do aluno">
                    <i class="bi bi-search" aria-hidden="true"></i>
                </span>
            </label>

            <label class="field-group">
                <span>Turma (Auto-preenchido)</span>
                <input class="form-control" type="text" placeholder="Carregando..." readonly>
            </label>

            <label class="field-group">
                <span>Data</span>
                <input class="form-control" type="text" value="12/10/2026">
            </label>

            <label class="field-group">
                <span>Horário</span>
                <input class="form-control" type="text" value="14:15">
            </label>

            <label class="field-group">
                <span>Tipo de Ocorrência</span>
                <select class="form-select"><option>Atraso / Indisciplina</option></select>
            </label>

            <label class="field-group field-full">
                <span>Descrição Detalhada dos Fatos</span>
                <textarea class="form-control" rows="3" placeholder="Relate de forma neutra e clara o ocorrido em detalhes..."></textarea>
            </label>

            <label class="field-group field-full">
                <span>Medidas Tomadas / Encaminhamento</span>
                <textarea class="form-control" rows="3" placeholder="Notificações aos pais, advertências verbais, encaminhamento à coordenação..."></textarea>
            </label>

            <label class="field-group field-full">
                <span>Funcionária Responsável</span>
                <input class="form-control" type="text" value="Amanda Silva (Logada no sistema)" readonly>
            </label>

            <div class="form-actions field-full">
                @if (request()->routeIs('confirmar-ocorrencia'))
                    <a class="btn btn-edit-occurrence" href="{{ route('registrar-ocorrencia') }}">Voltar e editar ocorrência</a>
                    <a class="btn btn-sesi" href="{{ route('ocorrencias') }}">Confirmar Ocorrência</a>
                @else
                    <a class="btn btn-text" href="{{ route('ocorrencias') }}">Cancelar</a>
                <button class="btn btn-sesi" type="submit">Registrar Ocorrência</button>
                @endif
            </div>
        </form>
    </section>
@endsection
