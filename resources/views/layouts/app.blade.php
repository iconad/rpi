<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

 <title>Online Digital Printing Shop in UAE | Printo - @yield('title')</title>
        <meta name="description" content="@yield('description')Printo offers Online Digital printing &amp; affordable services to businesses in Dubai, Sharjah, Abu Dhabi &amp; all across the Gulf. Call: 06 534 1113">
        
        <meta name="keywords" content="@yield('keywords')online digital printing shop, print shop, printing services, printing near me, photo printing, printing press, print online dubai, print shop near me, Printo Online,  digital printing dubai, digital printing sharjah, uae digital printing, printing press in uae, printing press in Sharjah, printing press in dubai, offset printing in uae, offset printing Sharjah, offset printing dubai, printing companies in uae, printing companies in Sharjah, printing companies in dubai, large format printing, large format printing dubai, printing services,
     printing press, digital printing, digital printing uae, online printing, offset printing, online printing services dubai, online business card printing dubai">
    

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
