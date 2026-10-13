@extends('layouts.app')

@section('title', 'Dashboard da Coordenação')
@section('page-heading', 'Dashboard da Coordenação')
@section('active-page', 'inicio')
@section('navigation-role', 'coordination')
@section('role-label', 'Coordenação')
@section('role-initial', 'C')

@section('content')
    @php
        $monthlyOccurrences = [
            ['Abr', 40], ['Mai', 57], ['Jun', 48], ['Jul', 70], ['Ago', 62], ['Set', 77],
        ];
    @endphp

    <div class="section-intro">
        <h2>Visão geral</h2>
        <p>Acompanhe os registros e as atividades escolares.</p>
    </div>

    <section class="stat-grid stat-grid-four" aria-label="Indicadores gerais">
        <article class="stat-card stat-card-compact">
            <div class="stat-card-label"><i class="bi bi-people"></i> Alunos cadastrados</div>
            <strong class="stat-value">247</strong>
            <small class="stat-note">Total de alunos</small>
        </article>
        <article class="stat-card stat-card-compact">
            <div class="stat-card-label"><i class="bi bi-exclamation-circle"></i> Ocorrências do mês</div>
            <strong class="stat-value">38</strong>
            <small class="stat-note">Registradas no período</small>
        </article>
        <article class="stat-card stat-card-compact">
            <div class="stat-card-label"><i class="bi bi-box-arrow-up-right"></i> Saídas antecipadas</div>
            <strong class="stat-value">34</strong>
            <small class="stat-note">Neste mês</small>
        </article>
        <article class="stat-card stat-card-compact">
            <div class="stat-card-label"><i class="bi bi-journal-check"></i> Registros recentes</div>
            <strong class="stat-value">12</strong>
            <small class="stat-note">Ocorrências para conferir</small>
        </article>
    </section>

    <section class="dashboard-lower-grid">
        <article class="chart-card">
            <h2>Ocorrências por mês</h2>
            <p>Quantidade de registros</p>
            <div class="bar-chart" role="img" aria-label="Ocorrências por mês">
                @foreach ($monthlyOccurrences as [$month, $value])
                    <div class="bar-chart-column">
                        <span class="bar-chart-value">{{ $value }}</span>
                        <span class="bar-chart-bar" style="height: {{ $value }}%"></span>
                        <span class="bar-chart-label">{{ $month }}</span>
                    </div>
                @endforeach
            </div>
        </article>

        <article class="quick-actions-card">
            <h2>Acesso rápido</h2>
            <div class="quick-actions">
                <a class="btn btn-sesi" href="{{ route('consulta-ocorrencias') }}">Consultar ocorrências <i class="bi bi-arrow-right"></i></a>
                <a class="btn btn-soft-red" href="{{ route('relatorios') }}">Ver relatórios <i class="bi bi-arrow-right"></i></a>
            </div>
            <p>Use os atalhos para consultar os registros e acompanhar os indicadores da escola.</p>
        </article>
    </section>
@endsection
