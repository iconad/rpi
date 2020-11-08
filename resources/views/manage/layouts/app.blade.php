<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rainbow Printing') }}</title>

    <link href="{{ asset('css/manage/app.css') }}" rel="stylesheet">
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

    @yield('scripts')
</body>
</html>
