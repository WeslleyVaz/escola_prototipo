@extends('layouts.auth')

@section('title', 'Login Gestão')

@section('content')
    <main class="auth-stage auth-stage-login auth-stage-management">
        <header class="login-brand">
            <img class="auth-logo" src="{{ asset('sesi-logo.png') }}" alt="SESI" width="286" height="286">
        </header>

        <section class="login-panel" aria-labelledby="login-title">
            <span class="login-emblem" aria-hidden="true"><i class="bi bi-shield-check"></i></span>
            <h1 id="login-title">Login gestão</h1>

            <form class="login-form">
                <label class="form-label" for="cpf-gestao">CPF</label>
                <div class="input-with-icon">
                    <i class="bi bi-person" aria-hidden="true"></i>
                    <input class="form-control" id="cpf-gestao" type="text" placeholder="000.000.000-00">
                </div>

                <label class="form-label" for="senha-gestao">Senha</label>
                <div class="input-with-icon">
                    <i class="bi bi-lock" aria-hidden="true"></i>
                    <input class="form-control" id="senha-gestao" type="password" placeholder="Sua senha de acesso">
                    <button class="input-action" type="button" aria-label="Mostrar senha"><i class="bi bi-eye"></i></button>
                </div>

                <a class="btn sesi-pill login-submit" href="{{ route('dashboard-coordenacao') }}">Entrar</a>
            </form>
        </section>
    </main>
@endsection
