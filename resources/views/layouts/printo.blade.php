<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include your stylesheets and other meta tags here -->
    @yield('headlinks')
    <style>
    span.whitespace-nowrap.commingsoondesc {
        font-size: 1.3rem;
        color: grey;
    }


    @media (max-width: 768px) {

        span.whitespace-nowrap.commingsoondesc {
            font-size: 0.4rem;
            color: grey;
        }

        p.text-xs.pt-6.md\:pt-0.md\:text-4xl.lg\:text-8xl.font-bold.leading-tight.mb-3.md\:mb-4.commingsoontitle {
            font-size: 1.75rem;
        }

        /* Add more styles as needed */
    }
    </style>

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