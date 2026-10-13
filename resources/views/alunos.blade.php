@extends('layouts.auth')

@section('title', 'Alunos')
@section('page-heading', 'Alunos')
@section('active-page', 'alunos')
@section('navigation-role', $isManagement ? 'coordination' : 'inspector')
@section('user-name', $isManagement ? 'Gestão Escolar' : 'Amanda Silva')
@section('role-label', $isManagement ? 'Coordenação' : 'Inspetora Escolar')
@section('role-initial', $isManagement ? 'C' : 'A')

@section('content')
    @php
        $students = [
            ['pietro oliveira alves', '5543', '2ªA', 'Cristiano araujo oliveira', '+55 15 99222-8819'],
            ['Gabriel Henrique Santos', '5821', '1ªA', 'Marcos Antônio Santos', '+55 15 98876-4321'],
            ['João Pedro Oliveira', '5914', '3ªA', 'Ricardo Oliveira', '+55 15 99765-2143'],
            ['Matheus Henrique Lima', '6148', '9ªA', 'Carlos Eduardo Lima', '+55 15 99654-3210'],
            ['Rafael Augusto Costa', '6275', '8ªA', 'André Luiz Costa', '+55 15 98987-6543'],
            ['Felipe Gabriel Martins', '6389', '7ªA', 'Juliana Martins', '+55 15 99821-3456'],
            ['Enzo Miguel Ferreira', '6457', '6ªB', 'Roberto Ferreira', '+55 15 98734-2165'],
            ['Gustavo Henrique Alves', '6523', '5ªA', 'Patrícia Alves', '+55 15 99678-5432'],
            ['Gustavo alves henrique', '7234', '6ªA', 'pratica Alves', '+55 15 99678-5433'],
        ];
    @endphp

    <main class="students-page">
    <header class="students-title">
        <a class="students-brand" href="{{ route($isManagement ? 'dashboard-coordenacao' : 'dashboard-inspetoras') }}" aria-label="Voltar ao painel"><img src="{{ asset('sesi-logo.png') }}" alt="SESI" width="286" height="286"></a>
        <i class="bi bi-people-fill" aria-hidden="true"></i>
        <h2>ALUNOS</h2>
    </header>

    <div class="table-responsive data-table-wrap">
        <table class="table data-table students-table">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>RM:</th>
                    <th>Turma:</th>
                    <th>Nome do responsável:</th>
                    <th>Número responsável:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student[0] }}</td>
                        <td>{{ $student[1] }}</td>
                        <td>{{ $student[2] }}</td>
                        <td>{{ $student[3] }}</td>
                        <td>{{ $student[4] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
