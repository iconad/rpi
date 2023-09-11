<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include your stylesheets and other meta tags here -->
    @yield('headlinks')
</head>

<body class="overflow-x-hidden bg-white">
    @include('partials.header')
    <!-- Include your header here -->

    <main>
        @yield('content')
        <!-- This will be replaced by the content of individual pages -->
    </main>

    @include('partials.footer')
    <!-- Include your footer here -->

</body>

</html>