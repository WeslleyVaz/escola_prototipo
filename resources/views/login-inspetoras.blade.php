@extends('layouts.auth')

@section('title', 'Login Inspetoras')

@section('content')
    <main class="auth-stage auth-stage-login">
        <header class="login-brand">
            <img class="auth-logo" src="{{ asset('sesi-logo.png') }}" alt="SESI" width="286" height="286">
        </header>

        <section class="login-panel" aria-labelledby="login-title">
            <span class="login-emblem" aria-hidden="true"><i class="bi bi-shield-check"></i></span>
            <h1 id="login-title">Login Inspetoras</h1>

            <form class="login-form" id="login-inspetoras">
                <label class="form-label" for="cpf-inspetora">CPF</label>
                <div class="input-with-icon">
                    <i class="bi bi-person" aria-hidden="true"></i>
                    <input class="form-control" id="cpf-inspetora" type="text" inputmode="numeric" autocomplete="username" placeholder="000.000.000-00" required>
                </div>

                <label class="form-label" for="senha-inspetora">Senha</label>
                <div class="input-with-icon">
                    <i class="bi bi-lock" aria-hidden="true"></i>
                    <input class="form-control" id="senha-inspetora" type="password" autocomplete="current-password" placeholder="Sua senha de acesso" required>
                    <button class="input-action" type="button" aria-label="Mostrar senha"><i class="bi bi-eye"></i></button>
                </div>

                <button class="btn sesi-pill login-submit" id="btnentrar" type="submit">Entrar</button>
            </form>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    @vite(['resources/js/login.js'])
@endsection