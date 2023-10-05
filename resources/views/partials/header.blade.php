<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.min.css">
    <title>Printo Home Page</title>
    <style>
        
    div#app {
        overflow-x: hidden;
    }

    p.newitemsbox-price.text-xs.md\:text-lg.text-dark-gray {
        color: grey;
        font-size: 1rem;
    }

    #mobileMenu {
        /* ... other styles ... */
        background-color: black;
        z-index: 999;
        height: 100vh !important;
        transition: transform 0.3s ease-in-out;

    }

    .translate-x-full {
        transform: translateX(100%);
    }

    .text-1-3rem {
        font-size: 1.3rem;
    }

    .logo-slide {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
        /* Set the desired height for logos */
    }

    .logo-img {
        max-height: 100%;
        max-width: 100%;
    }

    .text-1-4rem {
        font-size: 1.4rem;
    }

    .iti {
        width: 100%;
    }

    .swiper-slide-printo {
        flex: 0 0 auto;
        width: 300px;
        padding: 20px;
        margin-right: 20px;
        border: 1px solid black;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .text-left {
        text-align: left !important;
    }

    .rating {
        font-size: 24px;
        margin-bottom: 10px;
        color: black;
    }

    body {
        font-family: 'Manrope', sans-serif;
        overflow-x: hidden;
    }

    p.box-name {
        font-size: 1.3rem;
    }

    .toggle-icon {
        width: 24px;
        height: 24px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease-in-out;
        border: 1px solid black;
        border-radius: 50%;
    }

    .toggle-icon::before,
    .toggle-icon::after {
        content: "";
        position: absolute;
        width: 12px;
        height: 2px;
        background-color: transparent !important;
        transition: all 0.3s ease-in-out;
    }

    .toggle-icon::before {
        transform: rotate(90deg);
    }

    .toggle-icon.opened::before {
        transform: rotate(0deg);
    }

    .toggle-icon.opened::before {
        transform: rotate(0deg);
        background-color: #000;
        /* Keep the same color for the minus icon */
    }

    .toggle-icon.opened::after {
        display: none;
    }

    /* Change pagination dot color */

    .swiper-pagination-bullet {
        background-color: black;
        /* Change to black */
    }

    /* Change pagination dot active color */

    .swiper-pagination-bullet-active {
        background-color: black;
        /* Change to black */
    }

    /* Change navigation arrow color */

    .swiper-button-next,
    .swiper-button-prev {
        color: black;
        /* Change to black */
    }

    /* Style for the pagination dots */

    .swiper-pagination {
        position: absolute;
        /* bottom: 20px; */
        /* Adjust this value as needed */
        padding-top: 20px;
        /* Add padding to the top to create space */
    }

    /* Container for the swiper */

    .swiper-container-parent {
        position: relative;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }

    /* Style for the swiper container */

    .swiper-container {
        width: 100%;
        max-width: 1920px;
        padding-bottom: 40px;
        /* Optional: set a maximum width for the slider */
    }

    /* Style for the pagination dots */

    .swiper-pagination {
        position: relative;
        bottom: 20px;
    }

    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
    }

    .slide-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .slide-content {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 1rem;
        text-align: center;
    }

    p.box-name {
        padding-top: 1rem;
    }

    .printoborder {
        width: 20rem;
    }

    .reviewsh {
        height: 50px;
    }

    /* Desktop Styles */

    @media screen and (min-width: 768px) {
        .letsstartmargin {
            margin-left: -4.2px
        }

        .swiper-container {
            padding-bottom: 0px !important;
        }


        .letstalk {
            padding-left: 8rem;
            padding-right: 8rem;
        }

        .categoryboxes {
            padding-right: 7.5rem;
        }

        .bestseller {
            padding-right: 4.5rem;
        }

        .premiumdesign {
            padding-right: 4rem;
        }

        .toppicks {
            padding-right: 4.5rem;
        }

        .faqitems {
            margin-left: -20px;
        }

        section.faq.flex.flex-col.md\:flex-row.p-4.md\:p-8 {
            padding-left: 3rem;
        }

        .newitems {
            margin-right: 3rem;
            margin-left: 1rem;
            padding: 3rem;
        }

        .formsection {

            padding: 3rem;
        }

        .support {
            margin-left: -0.7rem;
        }

        .contactus {
            margin-left: -3rem;
        }

        .logo {
            width: 11rem;
            height: auto;
        }
    }

    @media screen and (max-width: 767px) {
        p.newitemsbox-price.text-xs.md\:text-lg.text-dark-gray {
            color: grey;
            font-size: 0.6rem;
            margin-bottom: 10px;
        }

        .reviewsh {
            font-size: 0.8rem !important;
        }

        .logoheader {
            width: 5rem;
            height: auto;
        }

        .box-price {
            color: #444;
            margin-top: -15px !important;
        }

        .newitemsbox-price {
            color: #444;
            margin-top: 8px !important;
        }

        .logo {
            width: 30%;
            height: auto;
        }

        .whatsapp-button {
            width: fit-content;
            margin-bottom: 0px !important;

        }

        .box-info {
            font-size: 0.5rem;
        }

        .letstalk {
            font-size: 0.5rem !important;
        }

        .mobilewhatsappimage {
            height: 150px !important;
        }

        .answerfaq {
            margin-left: 1rem !important;
            width: 80% !important;
        }

        .faqmobile {
            width: 85%;
        }

        .faqbutton {
            width: 100% !important;
        }

        .whatsapptexticon {
            width: 15px !important;
            height: 15px !important;
        }

        .whatsapp-button {
            display: inline-flex;
            align-items: center;
            /* background-color: #3AAA34; */
            color: white;
            margin-bottom: -30px;
            padding: 5px 0px;
            border-radius: 4px;
            margin-top: 30px !important;
            font-size: 1rem;
            border-radius: 999px;
            text-decoration: none;
            /* padding-left: 1rem !important;
            padding-right: 1rem !important; */
        }

        .newitemswhatsapp {
            display: inline-flex;
            align-items: center;
            /* background-color: #3AAA34; */
            color: white;
            margin-bottom: -30px;
            padding: 5px 0px;
            border-radius: 4px;
            margin-top: 0px !important;
            font-size: 1rem;
            border-radius: 999px;
            text-decoration: none;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }

        .slidehidemobile {
            display: none;
        }

        .no-padding-mobile {
            padding-left: 0;
            padding-right: 0;
        }


        .swiper-button-next,
        .swiper-button-prev {
            font-size: 1rem;
        }

        .faqbutton {
            text-align: left;
        }



        .whatsappbanner .text-7xl {
            font-size: 3.5rem;
            /* Adjust the font size as needed */
            line-height: 1.2;
            /* Adjust the line height as needed */
            padding-top: 10rem;
            /* Adjust the padding as needed */
        }

        .whatsappbanner .py-20 {
            padding-top: 10rem;
            /* Adjust the padding as needed */
        }

        .whatsappbanner .px-24 {
            padding: 1rem 2rem;
            /* Adjust the padding as needed */
        }

        .whatsappbanner .rounded-full {
            border-radius: 50%;
            /* Adjust the border radius as needed */
        }

        .whatsappbanner .ml-2 {
            margin-left: 1rem;
            /* Adjust the margin as needed */
        }
    }


    @media (max-width: 1440px) {
        /* Target 13-inch MacBook */

        .text-macbook {
            font-size: 2rem;
            line-height: 2.3rem;
        }

        .whatsapptexticon {
            width: 25px;
            height: 25px;

        }

        .whatsapptext {
            font-size: 0.5rem;
        }

        p.box-name {
            font-size: 1rem;
        }

    }

    /* Styles for 15.6 inches screen (1920x1080 resolution) */
    @media screen and (min-width: 1920px) and (min-height: 1080px) {
        .whatsapptexticon {
            width: 20px;
            height: 20px;
        }

        .whatsapptext {
            font-size: 0.6rem;
        }

        p.box-name {
            font-size: 1rem;
        }
    }

    .box-price {
        color: #444;
        margin-top: 8px;
    }

    .box-info {
        color: #aaa;
        margin-top: 4px;
    }

    .whatsapp-button {
        display: inline-flex;
        align-items: center;
        /* background-color: #3AAA34; */
        color: white;
        margin-bottom: -30px;
        padding: 6px 12px;
        border-radius: 4px;
        margin-top: 10px;
        font-size: 1rem;
        border-radius: 999px;
        text-decoration: none;
        /* padding-left: 2rem;
        padding-right: 2rem; */
    }

    /* .whatsapp-icon {
        margin-right: 8px;
    } */

    .whatsapp-button {
        display: flex;
        align-items: center;
    }
    /* Add this CSS to your stylesheet */



    .faqbutton {
        width: 90%;
    }

    .answerfaq {
        width: 90%;
        margin-bottom: 2rem;
        margin-left: 1.8rem;
    }

    .topbar {
        padding-left: 4.8rem;
        padding-right: 4.9rem;
    }
    .flex-height {
    height: 350px;
}
.right-bg {
    background-color: #F1F6F5;
}
    </style>
    @yield('headlinks')
</head>
{{-- y[^M8@XV>Yp],/bJ --}}


<body class="overflow-x-hidden bg-white">
    <div id="app">
        <!-- <div>
            <x-topnav />
        </div> -->

        <main>
            <div class="container mx-auto max-w-full">
                <header class="bg-white shadow-lg hidden md:block">
                    <!-- Top Bar -->
                    <div class="topbar bg-black py-2 text-white text-center flex justify-between items-center text-lg">
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-white mr-2"></i>
                            <p class="text-sm"><a href="mailto:info@printo.ae">info@printo.ae</a></p>
                            <i class="fas fa-headphones text-white mx-4 mr-2"></i>
                            <p class="text-sm"><a href="tel:+971 6 534 1113"> +971 6 534 1113</a></p>
                        </div>
                        <div class="flex items-center">
                            <ul class="flex list-none p-0">
                                <li class="mr-12 text-sm">
                                    <a href="https://printo.ae/estimate">Estimate</a>
                                </li>
                                <li class="mr-12 text-sm">
                                    <a href="https://printo.ae/comingsoon">Blog</a>
                                </li>
                                <li class="text-sm">
                                    <a href="https://printo.ae/about-us">About Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <!-- Navigation with Search Bar -->
                    <nav class="bg-white text-black py-4 px-14 md:px-15 flex justify-between items-center">
                        <div class="flex items-center md:ml-4">
                            <!-- Add your logo here -->
                            <a href="https://printo.ae/"><img src="{{ asset('images/home/logo.png') }}" alt="Printo"
                                    class="h-16 w-30"></a>
                        </div>

                        <div class="md:hidden">
                            <button id="mobile-menu-button" class="text-gray-700 hover:text-red-300 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0,0,256,256">
                                    <path
                                        d="M256 166.32v-76.64q0-6.17-4.38-10.54t-10.54-4.38h-236.16q-6.16 0-10.54 4.38t-4.38 10.54v76.64q0 6.16 4.38 10.54t10.54 4.38h236.16q6.16 0 10.54-4.38t4.38-10.54z" />
                                </svg>
                            </button>
                        </div>



                        <ul id="mobile-menu" class="hidden md:flex space-x-6 flex-nowrap pl-4 pr-2">

                            <li><a href="https://printo.ae/categories/print-products"
                                    class="text-gray-800 hover:text-gray-600">Printing</a></li>
                            <li><a href="https://printo.ae/categories/packaging"
                                    class="text-gray-800 hover:text-gray-600">Packaging</a></li>
                            <li><a href="https://printo.ae/categories/banners-displays"
                                    class="text-gray-800 hover:text-gray-600">Banners & Displays</a></li>
                            <li><a href="https://printo.ae/comingsoon"
                                    class="text-gray-800 hover:text-gray-600">Merch</a></li>
                            <li><a href="https://printo.ae/comingsoon"
                                    class="text-gray-800 hover:text-gray-600">Corporate</a></li>
                            <li><a href="https://printo.ae/categories/wallpapers"
                                    class="text-gray-800 hover:text-gray-600">Wallpapers</a></li>




                        </ul>
                        <div class="hidden md:flex relative items-center">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0,0,256,256">
                                    <g transform="translate(64,64) scale(0.5,0.5)">
                                        <g fill="#000000" fill-rule="nonzero">
                                            <g transform="scale(5.12,5.12)">
                                                <path
                                                    d="M21,3c-9.37891,0 -17,7.62109 -17,17c0,9.37891 7.62109,17 17,17c3.71094,0 7.14063,-1.19531 9.9375,-3.21875l13.15625,13.125l2.8125,-2.8125l-13,-13.03125c2.55469,-2.97656 4.09375,-6.83984 4.09375,-11.0625c0,-9.37891 -7.62109,-17 -17,-17zM21,5c8.29688,0 15,6.70313 15,15c0,8.29688 -6.70312,15 -15,15c-8.29687,0 -15,-6.70312 -15,-15c0,-8.29687 6.70313,-15 15,-15z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <input type="text" placeholder=" "
                                class="border-2 border-gray-700 rounded-l-full rounded-r-full px-4 py-2 pl-12 pr-10">
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-700 mr-4">
                                Search
                            </span>
                        </div>
                    </nav>
                </header>


                <!-- Header for mobile -->
                <header class="sm:hidden flex items-center justify-between p-4 bg-white">
                    <div class="flex items-center">
                        <a href="https://printo.ae/"> <img src="{{ asset('images/home/logo.png') }}" alt="Printo"
                                class="w-16 logoheader h-8 mr-4"></a>
                        <div class="hidden sm:block">
                            <input type="text" placeholder="Search" class="bg-gray-200 px-2 py-1 rounded-md">
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button id="searchButton" class="mr-6">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                viewBox="0 0 50 50">
                                <path
                                    d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z">
                                </path>
                            </svg>
                        </button>
                        <button id="menuButton">
                            <div class="w-6 h-px bg-gray-600 mb-1"></div>
                            <div class="w-6 h-px bg-gray-600 mb-1"></div>
                            <div class="w-6 h-px bg-gray-600"></div>
                        </button>
                    </div>
                </header>

                <!-- Search bar (hidden by default) -->
                <div id="searchBar" class="hidden p-4 bg-white shadow-md">
                    <input type="text" placeholder="Search" class="w-full bg-gray-200 px-2 py-1 rounded-md">
                </div>

                <!-- Mobile menu (hidden by default) -->
                <div id="mobileMenu"
                    class="sm:hidden fixed inset-y-0 right-0 w-1/2 h-screen p-4 transform translate-x-full">
                    <ul class="space-y-4">
                        <li><a href="https://printo.ae/categories/print-products"
                                class="text-white">Printing</a></li>
                        <li><a href="https://printo.ae/categories/packaging"
                                class="text-white">Packaging</a></li>
                        <li><a href="https://printo.ae/categories/banners-displays"
                                class="text-white">Banners & Displays</a></li>
                        <li><a href="https://printo.ae/comingsoon" class="text-white">Merch</a>
                        </li>
                        <li><a href="https://printo.ae/comingsoon"
                                class="text-white">Corporate</a></li>
                        <li><a href="https://printo.ae/categories/wallpapers"
                                class="text-white">Wallpapers</a></li>
                        <li><a href="https://printo.ae/estimate" class="text-white">Estimate</a>
                        </li>
                        <li><a href="https://printo.ae/comingsoon" class="text-white">Blog</a>
                        </li>
                        <li><a href="https://printo.ae/about-us" class="text-white">About
                                Us</a></li>
                    </ul>
                    <button id="closeMenuButton" class="text-white absolute top-4 right-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <script>
                const searchButton = document.getElementById('searchButton');
                const searchBar = document.getElementById('searchBar');
                const menuButton = document.getElementById('menuButton');
                const mobileMenu = document.getElementById('mobileMenu');
                const closeMenuButton = document.getElementById('closeMenuButton');

                searchButton.addEventListener('click', () => {
                    searchBar.classList.toggle('hidden');
                });

                // Toggle menu visibility using existing classes
                menuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('translate-x-full');
                });

                closeMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.add('translate-x-full');
                });
                </script>