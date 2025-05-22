<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <title>@yield('page-title', 'Sistema de Chamados')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistema de Gestão de Chamados" name="description" />
    <meta content="Ali Mohammed" name="author" />

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    
    {{-- CSS do sistema --}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/tablesaw/tablesaw.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/head.js') }}"></script>


    {{-- Livewire & Vite --}}
    @livewireStyles
    @vite(['resources/css/app.css'])
</head>

<body>
    <div id="wrapper">
        {{-- MENU LATERAL --}}
        <div class="app-menu">
            <div class="logo-box">
                <a href="{{ route('dashboard') }}" class="logo-light">
                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="logo-lg">
                </a>
            </div>

            <div class="scrollbar">
                <ul class="menu">
                    <li class="menu-title">Menu</li>

                    <li class="menu-item">
                        <a href="{{ route('categories.index') }}" class="menu-link">
                            <span class="menu-icon"><i data-feather="tag"></i></span>
                            <span class="menu-text">Categorias</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('tickets.index') }}" class="menu-link">
                            <span class="menu-icon"><i data-feather="book-open"></i></span>
                            <span class="menu-text">Chamados</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- CONTEÚDO PRINCIPAL --}}
        <div class="content-page">
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-1">
                        <div class="logo-box">
                            <a href="{{ route('dashboard') }}" class="logo-light">
                                <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="logo-lg">
                            </a>
                        </div>

                        <button class="button-toggle-menu"><i class="mdi mdi-menu"></i></button>

                        <ul class="topbar-menu d-flex align-items-center ms-auto">
                            <li>
                                <span class="text-muted">Bem-vindo, {{ auth()->user()->name ?? 'Convidado' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- CONTEÚDO DINÂMICO --}}
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                    {{ $slot ?? '' }}
                </div>
            </div>

            {{-- RODAPÉ --}}
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <script>document.write(new Date().getFullYear())</script> © Sistema de Chamados - Ali Mohammed
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{-- JS --}}
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tablesaw/tablesaw.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tablesaw.init.js') }}"></script>

    {{-- Livewire & Alpine --}}
    @livewireScripts
    @vite(['resources/js/app.js'])
</body>
</html>
