<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

 <title>Online Digital Printing Shop in UAE | Printo - @yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
    

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

    <!-- Global site tag (gtag.js) - Google Analytics --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-210033925-1"></script>
     <script> window.dataLayer = window.dataLayer || []; 
    function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-210033925-1'); </script> 
    @yield('scripts')
</body>
</html>
