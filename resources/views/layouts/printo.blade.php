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
        color: lightgrey !important;
    }

    p.text-xs.pt-6.md\:pt-0.md\:text-4xl.lg\:text-8xl.font-bold.leading-tight.mb-3.md\:mb-4.commingsoontitle {
        line-height: 3.6rem;
    }



    @media (max-width: 768px) {

        span.whitespace-nowrap.commingsoondesc {
            font-size: 0.4rem;
            color: grey;
        }

        p.text-xs.pt-6.md\:pt-0.md\:text-4xl.lg\:text-8xl.font-bold.leading-tight.mb-3.md\:mb-4.commingsoontitle {
            font-size: 1.75rem;
            line-height: 1rem;
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

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
    // Get the current URL
    const currentURL = window.location.href;

    // Define the mapping of URLs to content
    const contentMapping = {
        'categories/print-products': {
            title: 'Printing.',
            subtitle: 'Precision in Every Impression.'
        },
        'categories/packaging': {
            title: 'Packaging.',
            subtitle: 'Wrap Your Brand With Care.'
        },
        'categories/banners-displays': {
            title: 'Banners & Displays.',
            subtitle: 'Make a Statement. Anywhere.'
        },
        'categories/wallpapers': {
            title: 'Wallpapers.',
            subtitle: 'Walls that Speak Your Style.'
        }
    };

    // Check if the current URL is in the mapping
    if (currentURL in contentMapping) {
        const categoryContent = contentMapping[currentURL];
        const categoryContainer = document.getElementById('category-content');

        // Insert the HTML content based on the URL
        categoryContainer.innerHTML = `
                <h1 class="text-4xl md:text-5xl mb-1">${categoryContent.title}</h1>
                <p class="text-4xl md:text-5xl mb-6">${categoryContent.subtitle}</p>
            `;
    } else {
        // Handle the case where the URL is not in the mapping
        console.error('URL not found in mapping');
    }
    </script>
</body>

</html>