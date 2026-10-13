@extends('layouts.app')

@section('title', 'Consulta de Ocorrências')
@section('page-heading', 'Consulta de Ocorrências')
@section('active-page', 'ocorrencias')
@section('navigation-role', 'coordination')
@section('role-label', 'Coordenação')
@section('role-initial', 'C')

@section('content')
    @php
        $occurrences = [
            ['29/09/2026', '08:15', 'Pietro Oliveira Alves', '2ªA', 'Amanda Silva', 'Atraso'],
            ['28/09/2026', '09:30', 'Ana Júlia de Souza', '1ªB', 'Marcos Santos', 'Indisciplina'],
            ['27/09/2026', '14:10', 'Matheus Henrique Lima', '9ªA', 'Amanda Silva', 'Tarefa'],
            ['26/09/2026', '15:45', 'João Pedro Oliveira', '3ªA', 'Marcos Santos', 'Desentendimento'],
            ['25/09/2026', '11:30', 'Rafael Augusto Costa', '8ªA', 'Juliana Martins', 'Saída de sala'],
        ];
    @endphp

    <p class="content-description">Registros realizados pelas inspetoras e cuidadoras.</p>

    <section class="filter-panel">
        <h2>Pesquisar e filtrar</h2>
        <div class="filter-row">
            <label class="search-field">
                <span class="visually-hidden">Aluno ou RM</span>
                <i class="bi bi-search" aria-hidden="true"></i>
                <input class="form-control" type="search" placeholder="Aluno ou RM">
            </label>
            <label class="filter-field"><span class="visually-hidden">Turma</span><select class="form-select"><option>Todas as turmas</option></select></label>
            <label class="filter-field"><span class="visually-hidden">Data inicial</span><input class="form-control" type="text" placeholder="Data inicial"></label>
            <label class="filter-field"><span class="visually-hidden">Data final</span><input class="form-control" type="text" placeholder="Data final"></label>
            <button class="btn btn-sesi" type="button">Filtrar</button>
        </div>
    </section>

    <section class="table-section">
        <h2>Ocorrências registradas</h2>
        <div class="table-responsive data-table-wrap">
            <table class="table data-table data-table-plain">
                <thead><tr><th>Data</th><th>Horário</th><th>Aluno</th><th>Turma</th><th>Responsável</th><th>Tipo</th></tr></thead>
                <tbody>
                    @foreach ($occurrences as $occurrence)
                        <tr>
                            @foreach ($occurrence as $value)
                                <td>@if ($loop->index === 2)<a class="table-detail-link" href="{{ route('detalhes-ocorrencia') }}">{{ $value }}</a>@else{{ $value }}@endif</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
