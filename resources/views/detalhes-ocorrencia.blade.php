@extends('layouts.app')

@section('title', 'Detalhes da Ocorrência')
@section('page-heading', 'Detalhes da Ocorrência')
@section('active-page', 'ocorrencias')
@section('navigation-role', 'coordination')
@section('role-label', 'Coordenação')
@section('role-initial', 'C')

@section('content')
    <p class="content-description">Consulte as informações completas do registro.</p>

    <section class="details-card">
        <h2>Informações da ocorrência</h2>
        <dl class="details-grid">
            <div><dt>Aluno</dt><dd>Pietro Oliveira Alves</dd></div>
            <div><dt>Turma</dt><dd>2ªA</dd></div>
            <div><dt>Data</dt><dd>29/09/2026</dd></div>
            <div><dt>Horário</dt><dd>08:15</dd></div>
            <div><dt>Inspetora responsável</dt><dd>Amanda Silva</dd></div>
            <div><dt>Tipo</dt><dd>Atraso</dd></div>
            <div><dt>Descrição</dt><dd>O aluno chegou após o início da primeira aula.</dd></div>
            <div><dt>Procedimento realizado</dt><dd>A ocorrência foi registrada e encaminhada à coordenação.</dd></div>
        </dl>
    </section>

    <div class="detail-actions">
        <a class="btn btn-text" href="{{ route('consulta-ocorrencias') }}"><i class="bi bi-arrow-left"></i> Voltar</a>
        <a class="btn btn-sesi btn-small" href="{{ route('registrar-ocorrencia') }}">Editar ocorrência</a>
    </div>
@endsection
