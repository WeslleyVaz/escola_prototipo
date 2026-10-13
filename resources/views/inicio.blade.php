@extends('layouts.auth')

@section('title', 'Acesso ao Sistema Escolar')

@section('content')
    <main class="auth-stage auth-stage-landing">
        <header class="landing-brand">
            <img class="auth-logo" src="{{ asset('sesi-logo.png') }}" alt="SESI" width="286" height="286">
        </header>

        <nav class="landing-actions" aria-label="Tipo de acesso">
            <a class="btn sesi-pill" href="{{ route('login-inspetoras') }}">Inspetoras</a>
            <a class="btn sesi-pill" href="{{ route('login-gestao') }}">Gestão</a>
        </nav>
    </main>
@endsection
