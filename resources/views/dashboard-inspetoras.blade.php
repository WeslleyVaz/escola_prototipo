@extends('layouts.app')

@section('title', 'Painel de Controle')
@section('page-heading', 'Painel de Controle')
@section('active-page', 'inicio')
@section('navigation-role', 'inspector')
@section('user-name', 'Amanda Silva')
@section('role-label', 'Inspetora Escolar')
@section('role-initial', 'A')

@section('content')
    @php
        $occurrences = [
            ['12/10/2026', '08:15', 'Pietro Oliveira Alves', '2ªA', 'Desrespeito ao professor em sala de aula'],
            ['12/10/2026', '09:30', 'Ana Júlia de Souza', '1ªB', 'Celular retirado durante avaliação'],
            ['11/10/2026', '14:10', 'Matheus Henrique Lima', '9ªA', 'Não realizou a tarefa solicitada'],
            ['11/10/2026', '15:45', 'Rafael Augusto Costa', '8ªA', 'Desentendimento no pátio durante intervalo'],
            ['10/10/2026', '11:30', 'Felipe Gabriel Martins', '7ªA', 'Saída sem autorização prévia'],
        ];
    @endphp

    <section class="stat-grid stat-grid-three" aria-label="Resumo escolar">
        <article class="stat-card">
            <div class="stat-card-label">Total de alunos cadastrados <i class="bi bi-people"></i></div>
            <strong class="stat-value">247</strong>
            <small class="stat-note">Cadastrados na turma</small>
        </article>
        <article class="stat-card">
            <div class="stat-card-label">Ocorrências do dia <i class="bi bi-exclamation-triangle"></i></div>
            <strong class="stat-value">12</strong>
            <small class="stat-note">+3 novas na última hora</small>
        </article>
        <article class="stat-card">
            <div class="stat-card-label">Saídas antecipadas do mês <i class="bi bi-box-arrow-up-right"></i></div>
            <strong class="stat-value">34</strong>
            <small class="stat-note">Média de 1,2 por dia</small>
        </article>
    </section>

    <section class="section-heading-row">
        <h2>Últimas Ocorrências</h2>
        <a class="btn btn-sesi" href="{{ route('registrar-ocorrencia') }}">Registrar Ocorrência</a>
    </section>

    <div class="table-responsive data-table-wrap">
        <table class="table data-table">
            <thead>
                <tr><th>Data</th><th>Horário</th><th>Aluno</th><th>Turma</th><th>Situação</th></tr>
            </thead>
            <tbody>
                @foreach ($occurrences as $occurrence)
                    <tr>
                        <td>{{ $occurrence[0] }}</td>
                        <td>{{ $occurrence[1] }}</td>
                        <td>{{ $occurrence[2] }}</td>
                        <td>{{ $occurrence[3] }}</td>
                        <td>{{ $occurrence[4] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
