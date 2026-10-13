@php
    $navigationItems = [
        ['key' => 'inicio', 'label' => 'Início', 'icon' => 'bi-house-door', 'route' => $navigationRole === 'coordination' ? 'dashboard-coordenacao' : 'dashboard-inspetoras'],
        ['key' => 'alunos', 'label' => 'Alunos', 'icon' => 'bi-people', 'route' => $navigationRole === 'coordination' ? 'alunos-gestao' : 'alunos'],
        ['key' => 'ocorrencias', 'label' => $navigationRole === 'coordination' ? 'Consultar Ocorrências' : 'Ocorrências', 'icon' => 'bi-book', 'route' => $navigationRole === 'coordination' ? 'consulta-ocorrencias' : 'ocorrencias'],
        ['key' => 'saidas', 'label' => $navigationRole === 'coordination' || request()->routeIs('dashboard-inspetoras') ? 'Saídas antecipadas' : 'Saídas', 'icon' => 'bi-box-arrow-right', 'route' => 'saidas-antecipadas'],
    ];

    if ($navigationRole === 'coordination') {
        $navigationItems[] = ['key' => 'relatorios', 'label' => 'Relatórios', 'icon' => 'bi-bar-chart', 'route' => 'relatorios'];
    }
@endphp

<aside class="portal-sidebar">
    <a class="sidebar-brand" href="{{ route($navigationItems[0]['route']) }}">
        @if ($navigationRole === 'coordination')
            <span class="sidebar-emblem coordination-emblem" aria-hidden="true">S</span>
        @else
            <span class="sidebar-emblem inspector-emblem" aria-hidden="true"><i class="bi bi-shield-check"></i></span>
        @endif
        <span class="brand-copy">
            <strong>{{ $navigationRole === 'coordination' || request()->routeIs('dashboard-inspetoras') ? 'SESI' : 'SESI SENAI' }}</strong>
            <small>{{ $navigationRole === 'coordination' || request()->routeIs('dashboard-inspetoras') ? 'Sistema Escolar' : 'Tatuí - SP' }}</small>
        </span>
    </a>

    <nav class="sidebar-navigation" aria-label="Navegação principal">
        @foreach ($navigationItems as $item)
            <a class="sidebar-link {{ $activePage === $item['key'] ? 'is-active' : '' }}" href="{{ isset($item['route']) ? route($item['route']) : '#' }}">
                <i class="bi {{ $item['icon'] }}" aria-hidden="true"></i>
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <a class="sidebar-logout" href="{{ route('inicio') }}">
        <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
        <span>{{ request()->routeIs('dashboard-inspetoras') ? 'Sair' : 'Sair do Portal' }}</span>
    </a>
</aside>
