<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rainbow Printing') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/admin.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('headlinks')
</head>
{{-- y[^M8@XV>Yp],/bJ --}}
<body>
    <div class="px-3 sm:px-6 md:px-12 xl:px-0 md:max-w-screen-xl mx-auto" id="app">
        <div>
            <x-topnav />
        </div>
        <nav class="mb-5">
            <x-navbar />
        </nav>
        <main>
            @yield('content')
        </main>


        <footer class="mt-12">
            <x-main-footer />
        </footer>
    </div>

    <!-- Scripts -->
    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
</body>
</html>
