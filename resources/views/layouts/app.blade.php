<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistema Escolar SESI')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="{{ asset('css/sistema.css') }}" rel="stylesheet">
</head>
<body class="app-page portal-{{ trim($__env->yieldContent('navigation-role', 'coordination')) }} page-{{ request()->route()->getName() }}">
    <div class="portal-shell">
        @include('layouts.partials.sidebar', [
            'activePage' => trim($__env->yieldContent('active-page')),
            'navigationRole' => trim($__env->yieldContent('navigation-role', 'coordination')),
        ])

        <div class="portal-column">
            <header class="portal-topbar">
                <h1 class="portal-heading">@yield('page-heading', 'Sistema Escolar')</h1>
                <div class="portal-user visually-hidden">
                    <span class="role-indicator" aria-hidden="true">@yield('role-initial', 'C')</span>
                    <span class="portal-user-copy">
                        <strong>@yield('user-name', 'Coordenação')</strong>
                        <small>@yield('role-label', 'Sistema Escolar')</small>
                    </span>
                </div>
            </header>

            <main class="page-content">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="{{ asset('sistema.js') }}" defer></script>
</body>
</html>
