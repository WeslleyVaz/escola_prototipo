@extends('layouts.app')

@section('title', 'Saídas Antecipadas')
@section('page-heading', 'Saídas Antecipadas')
@section('active-page', 'saidas')
@section('navigation-role', 'inspector')
@section('user-name', 'Amanda Silva')
@section('role-label', 'Inspetora Escolar')
@section('role-initial', 'A')

@section('content')
    @php
        $departures = [
            ['12/10/2026', '11:30', 'Felipe Gabriel Martins', '7ªA', 'Consulta Médica', 'Juliana Martins', 'Amanda Silva'],
            ['12/10/2026', '15:10', 'Matheus Henrique Lima', '9ªA', 'Dores de Cabeça', 'Carlos Eduardo', 'Amanda Silva'],
            ['11/10/2026', '10:15', 'Gustavo Henrique Alves', '5ªA', 'Problema Familiar', 'Patrícia Alves', 'Amanda Silva'],
            ['11/10/2026', '16:30', 'Pietro Oliveira Alves', '2ªA', 'Viagem Programada', 'Cristiano Araujo', 'Amanda Silva'],
            ['10/10/2026', '14:00', 'Rafael Augusto Costa', '8ªA', 'Atendimento Dentista', 'André Luiz Costa', 'Amanda Silva'],
            ['09/10/2026', '09:15', 'Ana Júlia de Souza', '1ªB', 'Mal-estar Geral', 'Maria de Souza', 'Amanda Silva'],
        ];
    @endphp

    <section class="filter-card departure-filters">
        <label class="search-field">
            <span class="visually-hidden">Pesquisar por nome de aluno</span>
            <i class="bi bi-search" aria-hidden="true"></i>
            <input class="form-control" type="search" placeholder="Pesquisar por nome de aluno...">
        </label>
        <label class="filter-field">
            <span class="visually-hidden">Data</span>
            <input class="form-control" type="text" value="12/10/2026">
        </label>
        <a class="btn btn-sesi" href="{{ route('registrar-saida-antecipada') }}">Registrar Saída</a>
    </section>

    <div class="table-responsive data-table-wrap">
        <table class="table data-table">
            <thead>
                <tr><th>Data</th><th>Horário de Saída</th><th>Aluno</th><th>Turma</th><th>Motivo</th><th>Responsável que Retirou</th><th>Autorizado por</th></tr>
            </thead>
            <tbody>
                @foreach ($departures as $departure)
                    <tr>
                        @foreach ($departure as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <aside class="summary-card">
        <span class="summary-icon"><i class="bi bi-exclamation-triangle"></i></span>
        <div><strong>Total do mês: 34 saídas</strong><p>Média controlada de 1,2 liberações antecipadas por dia de aula letivo.</p></div>
    </aside>
@endsection
