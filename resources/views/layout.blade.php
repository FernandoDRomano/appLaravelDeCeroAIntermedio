<!DOCTYPE html>
<html lang="{{ App::setLocale('es') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- TOKEN CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo', 'Titulo por defecto')</title>

    {{-- CARGO EL CSS FINAL DE PRODUCCIÓN, PROCESADO POR LARAVEL MIX --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>
<body>

    <div id="app" class="d-flex flex-column h-screen justify-content-between">

        <header>
            @include('partials._navegacion')
            @include('partials._mensajeSesion')        
        </header>

        <main class="py-3">
            @yield('contenido')
        </main>

        <footer class="text-center text-black-50 shadow-sm py-3 bg-white">
            <p class="mb-0 font-weight-bold">{{ config('app.name') }} | Todos los derechos reservados {{ date('Y') }}</p>
        </footer>

    </div>

    
    {{-- CARGO EL SCRIPT FINAL DE PRODUCCIÓN, PROCESADO POR LARAVEL MIX --}}
    <script src="{{ mix('js/app.js') }}" defer></script>

    {{-- SCRIPTS ADICIONALES DE CADA LAYOUT --}}
    @yield('script')
</body>
</html>