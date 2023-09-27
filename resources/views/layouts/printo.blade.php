<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
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

            .about-font {
                font-size: 0.7rem !important;
                line-height: 0.9rem !important;
                

        }
        .phone-block {
            padding: 0.2rem !important;
        }
        .contact-phone {
            margin-top: 0.4rem !important;
            font-size: 0.6rem !important;
            width: 15rem !important;
        }
        .contact-p {
    margin-top: 0.2rem !important;
    color: grey !important;
    font-size: 0.4rem !important;
}
.title-font {
    font-size: 0.5rem !important;

}
h3.mobile-font-one.font-semibold.mb-2 {
    font-size: 1rem;
}
h2.mobile-font-two {
    font-size: 0.5rem !important;
}
p.mobile-font-three {
    font-size: 0.5rem;
}
.project-padding {
    margin-bottom: 3.3rem !important;
}
.reach {
    border-radius: 0rem !important;
}
            /* Add more styles as needed */
        }
        .clients {
            background-color: #F2F9FA;
            height: fit-content;
            padding: 1rem;
        }
        .Projects {
            background-color: #FDFAFB;
            height: fit-content;
            padding: 1rem;
        }
        .happyclients {
            background-color: #FDFDFA;
            height: fit-content;
            padding: 1rem;
        }
        .contact-form {
            background-color: #F1F6F5;
            padding: 1rem;
        }
        .reach {
            background-color: #F1F6F5;
            height: fit-content;
        }
        .clientsblock {
            padding-top: 15rem;
            padding-right: 8rem;
        }
        .project-padding {
            margin-bottom: 3.5rem;
        }
        .form-blocks {
            margin-top: -7rem;
        }
        .contact-phone {
            width: 60rem;
        }
        .phone-block {
            padding: 2rem;
        }
        .phone-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .icon-title {
        display: flex;
        align-items: center;
    }

    .icon {
        margin-right: 0.5rem;
    }

    .contact-p {
    margin-top: 1rem;
    color: grey;
}
.how-contact {
    margin-top: 2rem;
    color: grey;
    font-size: 1.3rem;
}
.reach {
    border-radius: 5rem;
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