<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de Chamados</title>
    <link href="/assets/css/main.css" rel="stylesheet"> {{-- Adapte o caminho conforme a sua integração --}}

    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <header>
        </header>

    <main class="container"> {{-- Use classes do Design System --}}
        @yield('content')
    </main>

    <footer>
        </footer>

    @livewireScripts
    <script src="/assets/js/scripts.js"></script> {{-- Adapte o caminho --}}
</body>
</html>