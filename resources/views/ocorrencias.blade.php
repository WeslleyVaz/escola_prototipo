@extends('layouts.app')

@section('title', 'Ocorrências Disciplinares')
@section('page-heading', 'Ocorrências Disciplinares')
@section('active-page', 'ocorrencias')
@section('navigation-role', 'inspector')
@section('user-name', 'Amanda Silva')
@section('role-label', 'Inspetora Escolar')
@section('role-initial', 'A')

@section('content')
    @php
        $occurrences = [
            ['12/10/2026', '08:15', 'Pietro Oliveira Alves', '2ªA', 'Indisciplina', 'Desrespeito ao professor em sala de aula', 'Pendente'],
            ['12/10/2026', '08:30', 'Ana Júlia de Souza', '1ªB', 'Uso de celular', 'Celular retirado durante avaliação em sala...', 'Resolvido'],
            ['11/10/2026', '14:10', 'Matheus Henrique Lima', '9ªA', 'Dever de casa', 'Não realizou as tarefas solicitadas', 'Em análise'],
            ['11/10/2026', '15:45', 'Rafael Augusto Costa', '8ªA', 'Desentendimento', 'Desavença verbal no pátio externo', 'Resolvido'],
            ['10/10/2026', '11:30', 'Felipe Gabriel Martins', '7ªA', 'Saída de sala', 'Aluno saiu sem autorização', 'Pendente'],
            ['10/10/2026', '14:20', 'Beatriz Souza Santos', '3ªB', 'Atraso Retorno', 'Atraso injustificado no retorno do intervalo', 'Resolvido'],
            ['09/10/2026', '10:45', 'Lucas Silva Oliveira', '2ªC', 'Uniforme incompleto', 'Acessório não permitido no uniforme', 'Resolvido'],
            ['09/10/2026', '16:15', 'Juliana Mendes Lima', '1ªA', 'Material ausente', 'Persistência na falta do livro de matemática', 'Em análise'],
        ];
    @endphp

    <div class="page-lead">
        <label class="search-field occurrence-search"><span class="visually-hidden">Pesquisar aluno ou RM</span><i class="bi bi-search" aria-hidden="true"></i><input class="form-control" type="search" placeholder="Pesquisar aluno ou RM..." data-table-search></label>
        <a class="btn btn-sesi" href="{{ route('registrar-ocorrencia') }}">Nova Ocorrência</a>
    </div>

    <section class="filter-card" aria-label="Pesquisar e filtrar ocorrências">

        <label class="filter-field">
            <span>TURMA</span>
            <select class="form-select"><option>Todas as Turmas</option></select>
        </label>
        <label class="filter-field">
            <span>TIPO DE OCORRÊNCIA</span>
            <select class="form-select"><option>Todos os Tipos</option></select>
        </label>
        <label class="filter-field">
            <span>DATA</span>
            <select class="form-select"><option>Selecione o Período</option></select>
        </label>
    </section>

    <div class="table-responsive data-table-wrap">
        <table class="table data-table">
            <thead>
                <tr><th>Data</th><th>Horário</th><th>Aluno</th><th>Turma</th><th>Tipo</th><th>Descrição</th><th>Situação</th></tr>
            </thead>
            <tbody>
                @foreach ($occurrences as $occurrence)
                    <tr>
                        <td>{{ $occurrence[0] }}</td>
                        <td>{{ $occurrence[1] }}</td>
                        <td>{{ $occurrence[2] }}</td>
                        <td>{{ $occurrence[3] }}</td>
                        <td>{{ $occurrence[4] }}</td>
                        <td>{{ $occurrence[5] }}</td>
                        <td><span class="status-badge status-{{ \Illuminate\Support\Str::slug($occurrence[6]) }}">{{ $occurrence[6] }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
