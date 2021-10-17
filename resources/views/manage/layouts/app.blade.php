<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>App Name - @yield('title')</title>
        <meta name="description" content="@yield('Printo offers Online Digital printing &amp; affordable services to businesses in Dubai, Sharjah, Abu Dhabi &amp; all across the Gulf. Call: 06 534 1113')">
        <meta name="keywords" content="@yield('online digital printing shop, print shop, printing services, printing near me, photo printing, printing press, print online dubai, print shop near me, Printo Online,  digital printing dubai, digital printing sharjah, uae digital printing, printing press in uae, printing press in Sharjah, printing press in dubai, offset printing in uae, offset printing Sharjah, offset printing dubai, printing companies in uae, printing companies in Sharjah, printing companies in dubai, large format printing, large format printing dubai, printing services,
     printing press, digital printing, digital printing uae, online printing, offset printing, online printing services dubai, online business card printing dubai')">

    <link href="{{ asset('css/manage/app.css') }}" rel="stylesheet">
    @livewireStyles
    @yield('headlinks')
</head>
<body>
    <div id="app">

        <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Desktop sidebar -->
        <x-manage.side-bar />

        <div class="flex flex-col flex-1 w-full">

          <x-manage.top-navbar />

          <main class="h-full overflow-y-auto">
              <div class="container px-6 mx-auto grid">
                <main>
                    @yield('content')
                </main>
              </div>
          </main>

        </div>

      </div>

    </div>
    <!-- Scripts -->
    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <script src="{{ asset('js/manage/app.js') }}"></script>
    @livewireScripts
    @yield('scripts')
</body>
</html>
