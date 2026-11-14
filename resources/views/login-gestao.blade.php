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

            <form class="login-form" id="login-gestao">
                <label class="form-label" for="cpf-gestao">CPF</label>
                <div class="input-with-icon">
                    <i class="bi bi-person" aria-hidden="true"></i>
                    <input class="form-control" id="cpf-gestao" type="text" inputmode="numeric" autocomplete="username" placeholder="000.000.000-00" required>
                </div>

                <label class="form-label" for="senha-gestao">Senha</label>
                <div class="input-with-icon">
                    <i class="bi bi-lock" aria-hidden="true"></i>
                    <input class="form-control" id="senha-gestao" type="password" autocomplete="current-password" placeholder="Sua senha de acesso" required>
                    <button class="input-action" type="button" aria-label="Mostrar senha"><i class="bi bi-eye"></i></button>
                </div>

                <button class="btn sesi-pill login-submit" type="submit">Entrar</button>
            </form>
        </section>
    </main>
@endsection
