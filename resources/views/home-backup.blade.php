@extends('layouts.app')

@section('headlinks')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.min.css">
    <title>Printo Home Page</title>
    <style>
    p.newitemsbox-price.text-xs.md\:text-lg.text-dark-gray {
        color: grey;
        font-size: 1rem;
    }

    #app {
        display: none;
    }

    #mobileMenu {
        /* ... other styles ... */
        background-color: white;
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
            background-color: #3AAA34;
            color: white;
            margin-bottom: -30px;
            padding: 5px 0px;
            border-radius: 4px;
            margin-top: 30px !important;
            font-size: 1rem;
            border-radius: 999px;
            text-decoration: none;
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }

        .newitemswhatsapp {
            display: inline-flex;
            align-items: center;
            background-color: #3AAA34;
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
            border-radius: 50px;
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
        background-color: #3AAA34;
        color: white;
        margin-bottom: -30px;
        padding: 6px 12px;
        border-radius: 4px;
        margin-top: 10px;
        font-size: 1rem;
        border-radius: 999px;
        text-decoration: none;
        padding-left: 2rem;
        padding-right: 2rem;
    }

    .whatsapp-icon {
        margin-right: 8px;
    }

    .whatsapp-button {
        display: flex;
        align-items: center;
    }

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
    </style>
</head>

<body class="overflow-x-hidden bg-white">
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
                            <a href="#">Estimate</a>
                        </li>
                        <li class="mr-12 text-sm">
                            <a href="#">Blog</a>
                        </li>
                        <li class="text-sm">
                            <a href="#">About Us</a>
                        </li>
                    </ul>
                </div>
            </div>


            <!-- Navigation with Search Bar -->
            <nav class="bg-white text-black py-4 px-14 md:px-15 flex justify-between items-center">
                <div class="flex items-center md:ml-4">
                    <!-- Add your logo here -->
                    <a href="#"><img src="{{ asset('images/home/logo.png') }}" alt="Printo" class="h-16 w-30"></a>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-red-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0,0,256,256">
                            <path
                                d="M256 166.32v-76.64q0-6.17-4.38-10.54t-10.54-4.38h-236.16q-6.16 0-10.54 4.38t-4.38 10.54v76.64q0 6.16 4.38 10.54t10.54 4.38h236.16q6.16 0 10.54-4.38t4.38-10.54z" />
                        </svg>
                    </button>
                </div>

                <ul id="mobile-menu" class="hidden md:flex space-x-6 flex-nowrap pl-4 pr-8">
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Printing</a>
                    </li>
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Packaging</a>
                    </li>
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Banners &
                            Displays</a></li>
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Merch</a>
                    </li>
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Corporate</a>
                    </li>
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Wallpapers</a>
                    </li>
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
                <img src="{{ asset('images/home/logo.png') }}" alt="Printo" class="w-16 logoheader h-8 mr-4">
                <div class="hidden sm:block">
                    <input type="text" placeholder="Search" class="bg-gray-200 px-2 py-1 rounded-md">
                </div>
            </div>
            <div class="flex items-center">
                <button id="searchButton" class="mr-6">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
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
        <div id="mobileMenu" class="sm:hidden fixed inset-y-0 right-0 w-1/2 h-screen p-4 transform translate-x-full">
            <ul class="space-y-4">
                <li><a href="#" class="text-gray-800 hover:text-gray-600">Printing</a></li>
                <li><a href="#" class="text-gray-800 hover:text-gray-600">Packaging</a></li>
                <li><a href="#" class="text-gray-800 hover:text-gray-600">Banners & Displays</a></li>
                <li><a href="#" class="text-gray-800 hover:text-gray-600">Merch</a></li>
                <li><a href="#" class="text-gray-800 hover:text-gray-600">Corporate</a></li>
                <li><a href="#" class="text-gray-800 hover:text-gray-600">Wallpapers</a></li>
                <li><a href="#" class="text-gray-800 hover:text-gray-600">Estimate</a></li>
                <li><a href="#" class="text-gray-800 hover:text-gray-600">Blog</a></li>
                <li><a href="#" class="text-gray-800 hover:text-gray-600">About Us</a></li>
            </ul>
            <button id="closeMenuButton" class="text-gray-600 hover:text-gray-800 absolute top-4 right-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>


        <!-- Slider (Hero Banner Style) -->
        <section class="relative overflow-x-hidden">
            <div class="swiper-container swiper-container-responsive">
                <div class="swiper-wrapper">
                    <!-- Slides will be dynamically added here through JavaScript -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <section class="paddingsection py-0 md:py-12 px-6 md:px-10">
            <section class="swiper-container companylogo-carousel">
                <div class="swiper-wrapper flex items-center">
                    <!-- Logo 1 -->
                    <div class="swiper-slide">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/home/1.png') }}" alt="Logo 1" class="logo-image">
                        </div>
                    </div>

                    <!-- Logo 2 -->
                    <div class="swiper-slide">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/home/2.png') }}" alt="Logo 2" class="logo-image">
                        </div>
                    </div>

                    <!-- Logo 3 -->
                    <div class="swiper-slide">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/home/3.png') }}" alt="Logo 3" class="logo-image">
                        </div>
                    </div>

                    <!-- Logo 4 -->
                    <div class="swiper-slide">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/home/4.png') }}" alt="Logo 4" class="logo-image">
                        </div>
                    </div>

                    <!-- Logo 5 -->
                    <div class="swiper-slide">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/home/5.png') }}" alt="Logo 5" class="logo-image">
                        </div>
                    </div>

                    <!-- Logo 6 -->
                    <div class="swiper-slide">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/home/6.png') }}" alt="Logo 6" class="logo-image">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/home/7.png') }}" alt="Logo 6" class="logo-image">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/home/8.png') }}" alt="Logo 6" class="logo-image">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('images/home/9.png') }}" alt="Logo 6" class="logo-image">
                        </div>
                    </div>

                </div>
            </section>
        </section>


        <section class="categoryboxes md:px-10 md:px-7.5 ">
            <div class="flex flex-col md:flex-row space-y-8 md:space-y-0 md:space-x-8 ">
                <!-- Grid Box 1 -->
                <div class="flex-shrink-0 w-full md:w-1/3 px-3 md:px-0 no-padding-mobile  ">
                    <a href="#"> <img src="{{ asset('images/home/printing.jpg') }}" alt="Image 1 "
                            class="w-full h-auto "> </a>
                </div>

                <!-- Grid Box 2 -->
                <div class="flex-shrink-0 w-full md:w-1/3 px-3 md:px-0 no-padding-mobile  ">
                    <a href="#"> <img src="{{ asset('images/home/packaging.jpg') }}" alt="Image 2 "
                            class="w-full h-auto "> </a>
                </div>

                <!-- Grid Box 3 -->
                <div class="flex-shrink-0 w-full md:w-1/3 px-3 md:px-0 no-padding-mobile  ">
                    <a href="#"> <img src="{{ asset('images/home/merch.jpg') }}" alt="Image 3 " class="w-full h-auto ">
                    </a>
                </div>
            </div>
        </section>

        <section class="md:p-5 p-7 md:px-12 bestseller">
            <h2 class="text-lg md:text-4xl mb-4 py-10 md:py-16">Best Sellers</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-16">
                <!-- Box 1 -->
                <div class="relative box">
                    <a href="#"><img src="{{ asset('images/home/product1.jpg') }}" alt="Product 1"
                            class="box-image"></a>
                    <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                        <p class="box-name">Business Cards
                        </p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 115.00 / 250 Copies</p>

                </div>

                <!-- Box 2 -->
                <div class="relative box">
                    <a href="#"><img src="{{ asset('images/home/product2.jpg') }}" alt="Product 2"
                            class="box-image"></a>
                    <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                        <p class="box-name">Large Stickers</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 180.00 / Copy</p>

                </div>

                <!-- Box 3 -->
                <div class="relative box">
                    <a href="#"><img src="{{ asset('images/home/product3.jpg') }}" alt="Product 3"
                            class="box-image"></a>
                    <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                        <p class="box-name">Posters
                        </p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 176.00 / Copy</p>

                </div>

                <!-- Box 4 -->
                <div class="relative box">
                    <a href="#"><img src="{{ asset('images/home/product4.jpg') }}" alt="Product 4"
                            class="box-image"></a>
                    <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                        <p class="box-name">Boxes</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">Contact for Details</p>

                </div>

                <!-- Box 5 -->
                <div class="relative box">
                    <a href="#"><img src="{{ asset('images/home/product5.jpg') }}" alt="Product 5"
                            class="box-image"></a>
                    <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                        <p class="box-name">Stationary</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 875.00 / 50 Notebooks</p>

                </div>

                <!-- Continue adding the remaining boxes (Box 6 to Box 9) in the same manner -->

                <!-- Box 6 -->
                <div class="relative box">
                    <a href="#"><img src="{{ asset('images/home/product6.jpg') }}" alt="Product 6"
                            class="box-image"></a>
                    <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                        <p class="box-name">Calendars</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 630.00 / 50 Copies</p>

                </div>

                <!-- Box 7 -->
                <div class="relative box">
                    <a href="#"><img src="{{ asset('images/home/product7.jpg') }}" alt="Product 7"
                            class="box-image"></a>
                    <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                        <p class="box-name macbookwhatsappside">Wallpapers</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 25.20 / Roll</p>

                </div>

                <!-- Box 8 -->
                <div class="relative box">
                    <a href="#"><img src="{{ asset('images/home/product8.jpg') }}" alt="Product 8"
                            class="box-image"></a>
                    <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                        <p class="box-name">Roll Up Banners</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 130.00 / Copy</p>

                </div>

                <!-- Box 9 -->
                <div class="relative box">
                    <a href="#"><img src="{{ asset('images/home/product9.jpg') }}" alt="Product 9"
                            class="box-image"></a>
                    <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                        <p class="box-name">Foamboard Panels</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 350.00 / Copy</p>

                </div>
            </div>
        </section>


        <section class="premiumdesign md:p-4 md:px-8 p-0">
            <div class="container mx-auto max-w-full flex flex-col md:flex-row md:p-4 p-0">
                <!-- Left Grid (Bigger) -->
                <section class="w-full md:w-3/5">
                    <img src="{{ asset('images/home/left-image.jpg') }}" alt="Left Image" class="w-full h-auto">
                </section>

                <!-- Right Grid (Smaller) -->
                <section class="w-full md:w-2/5 bg-gray-200 p-6 pr-4 md:pr-24 mt-6 md:mt-0 md:ml-4 md:ml-8">
                    <div class="flex flex-col h-full">
                        <div>
                            <h2 class="text-macbook text-2rem md:text-4xl mb-4 md:pr-26 md:pl-4 md:pt-24">Premium
                                Design.<br class="">Premium Quality.</h2>


                            <p class="mb-4 md:pl-4 md:pt-4 md:pb-8 md:pr-26 md:mb-4 overflow-hidden md:h-[9rem]"
                                style="line-height: 1.5rem;">With a keen focus on excellence, we transform your ideas
                                into stunning visuals that captivate and resonate. Elevate your brand with Printo, where
                                premium design meets unmatched quality, leaving a lasting impression that speaks
                                volumes.
                            </p>
                            <button
                                class="bg-black text-white text-base md:text-lg py-2 md:py-4 px-4 md:px-14 rounded-full self-start md:ml-4  md:mt-0">About
                                Us</button>
                        </div>
                    </div>
                </section>
            </div>
        </section>


        <section class="toppicks md:p-5 p-7 md:px-12">
            <h2 class="text-lg md:text-4xl mb-6 py-10 md:py-16">Top Picks</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-14">
                <!-- Product 1 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick1.jpg') }}" alt="Product 1" class="w-full h-auto mb-2 md:mb-4">
                    <div class="flex items-center justify-between mb-2 w-full">
                        <p class="box-name">Cups & Mugs</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">Contact for Details</p>

                </div>

                <!-- Product 2 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick2.jpg') }}" alt="Product 2" class="w-full h-auto mb-2 md:mb-4">
                    <div class="flex items-center justify-between mb-2 w-full">
                        <p class="box-name">Door Hangers</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 375.00 / 500 Copies</p>

                </div>

                <!-- Product 3 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick3.jpg') }}" alt="Product 3" class="w-full h-auto mb-2 md:mb-4">
                    <div class="flex items-center justify-between mb-2 w-full">
                        <p class="box-name">Business Cards</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 115.00 / 250 Copies</p>

                </div>

                <!-- Product 4 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick4.jpg') }}" alt="Product 4" class="w-full h-auto mb-2 md:mb-4">
                    <div class="flex items-center justify-between mb-2 w-full">
                        <p class="box-name">Cake Boxes</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">Contact for Details</p>

                </div>

                <!-- Product 5 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick5.jpg') }}" alt="Product 5" class="w-full h-auto mb-2 md:mb-4">
                    <div class="flex items-center justify-between mb-2 w-full">
                        <p class="box-name">Wallpapers</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 25.20 / Roll</p>

                </div>

                <!-- Product 6 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick6.jpg') }}" alt="Product 6" class="w-full h-auto mb-2 md:mb-4">
                    <div class="flex items-center justify-between mb-2 w-full">
                        <p class="box-name">Canvas Prints</p>
                        <div class="whatsapp-button">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <p class="box-price text-dark-gray">AED 186.00 / Copy</p>

                </div>

                <!-- Continue adding the remaining products (Product 7 to Product N) in the same manner -->
            </div>
        </section>

        <section class="bgimage py-16 hidden sm:block">
            <!-- Hidden on mobile -->
            <div class="parallax-container">
                <img src="{{ asset('images/home/bgimage.jpg') }}" alt="Why Us!" class="parallax-image">
            </div>
        </section>

        <section class="bgimage pb-10 block sm:hidden">
            <!-- Displayed on mobile -->
            <div class="parallax-container">
                <img src="{{ asset('images/home/bgimagemobile.jpg') }}" alt="Why Us!" class="parallax-image">
            </div>
        </section>



        <section class="faq flex flex-col md:flex-row p-0 md:p-12">
            <!-- FAQ Section (Left Side) -->
            <div class="w-full md:w-3/5 p-2 px-4 md:px-0 md:p-8">
                <h2 class="text-2xl md:text-4xl px-4 md:px-0 mb-8 md:mb-16">
                    Frequently Asked
                    <br class=""> Questions (FAQs)
                </h2>
                <!-- FAQ Items -->
                <div class="mb-4 md:mb-6 faqitems">
                    <button
                        class="faqbutton flex items-center justify-between w-full md:text-lg text-sm focus:outline-none border-b border-black pb-2 md:pb-6 px-4 md:px-6">
                        <a href="your_arcadion_link_here" class="faqmobile md:pr-6">What are the types of printers and
                            printing services offered by
                            Printo?</a>
                        <span class="toggle-icon">+</span>
                    </button>
                    <p class="text-gray-600 answerfaq hidden">Printo stands as a preeminent printing press in the UAE,
                        specializing in digital print solutions. Our expertise caters to diverse clientele including
                        Public Relations, Global Brands, and Design Agencies.</p>
                </div>
                <div class="mb-4 md:mb-6 faqitems">
                    <button
                        class="faqbutton flex items-center justify-between w-full md:text-lg text-sm focus:outline-none border-b border-black pb-2 md:pb-6 px-4 md:px-6">
                        <a href="your_arcadion_link_here" class="faqmobile md:pr-6">Are separate delivery charges
                            applicable
                            to individual
                            products?</a>
                        <span class="toggle-icon">+</span>
                    </button>
                    <p class="text-gray-600 answerfaq hidden">No, our streamlined shopping experience entails a singular
                        delivery
                        charge. You can consolidate multiple products within a single shopping cart, all covered by a
                        fixed, unified delivery fee.</p>
                </div>
                <div class="mb-4 md:mb-6 faqitems">
                    <button
                        class="faqbutton flex items-center justify-between w-full md:text-lg text-sm focus:outline-none border-b border-black pb-2 md:pb-6 px-4 md:px-6">
                        <a href="your_arcadion_link_here" class="faqmobile md:pr-6">Does Printo provide international
                            shipping?</a>
                        <span class="toggle-icon">+</span>
                    </button>
                    <p class="text-gray-600 answerfaq hidden">Certainly, Printo takes pride in its global reach! We
                        extend our
                        delivery services across the world, catering to the diverse printing needs of our clients.</p>
                </div>
                <div class="mb-4 md:mb-6 faqitems">
                    <button
                        class="faqbutton flex items-center justify-between w-full md:text-lg text-sm focus:outline-none border-b border-black pb-2 md:pb-6 px-4 md:px-6">
                        <a href="your_arcadion_link_here" class="faqmobile md:pr-6">What is the turnaround time for
                            Printo's
                            services?</a>
                        <span class="toggle-icon">+</span>
                    </button>
                    <p class="text-gray-600 answerfaq hidden">The duration of service varies as each project possesses
                        its unique
                        characteristics. Some tasks can be promptly executed within minutes, while others may
                        necessitate several days for completion. Inform us about your timeline requirements, and we will
                        diligently assess the feasibility. We are committed to meeting even the most demanding
                        deadlines.</p>
                </div>
                <div class="mb-4 md:mb-6 faqitems">
                    <button
                        class="faqbutton flex items-center justify-between w-full md:text-lg text-sm focus:outline-none border-b border-black pb-2 md:pb-6 px-4 md:px-6">
                        <a href="your_arcadion_link_here" class="faqmobile md:pr-6">How can I place an order with
                            Printo?</a>
                        <span class="toggle-icon">+</span>
                    </button>
                    <p class="text-gray-600 answerfaq hidden">Initiating an order is a seamless process. Begin by
                        selecting your
                        preferred product, customizing options to your specifications, and indicating the desired
                        quantity. From there, you have the choice to either "DESIGN IT" if you wish to embark on your
                        design journey, or "UPLOAD your FILES" if you possess print-ready materials or would like to
                        leverage the complimentary support of Printo's designers. Finally, complete the payment process
                        and proceed to checkout.</p>
                </div>
                <!-- Add more FAQ items as needed -->
            </div>
            <!-- Empty Space (Right Side) -->
            <div class="w-full md:w-2/5"></div>
        </section>

        <div class="text-lg md:text-4xl mb-4 pt-10 md:pt-0 py-4 ml-7 md:ml-12">Hot Items</div>


        <section class="flex flex-col md:flex-row p-7 md:p-12">
            <div class="w-full md:w-1/2 h-screen/2 flex flex-col items-start justify-start relative md:pr-4">
                <img src="{{ asset('images/home/hot1.jpg') }}" alt="Image 1" class="w-full object-cover">
            </div>
            <div class="w-full md:w-1/2 h-screen/2 py-6 md:py-0 flex flex-col md:pl-12">
                <!-- Desktop version layout -->
                <img src="{{ asset('images/home/hot2.jpg') }}" alt="Image 2"
                    class="w-full object-cover md:mb-2 md:pb-4 hidden md:block">
                <img src="{{ asset('images/home/hot3.jpg') }}" alt="Image 3"
                    class="w-full object-cover md:pt-5 md:pt-4 hidden md:block">

                <!-- Mobile version layout -->
                <div class="md:hidden w-full flex">
                    <img src="{{ asset('images/home/hot2.jpg') }}" alt="Image 2" class="w-1/2 pr-3 object-cover"
                        style=" height: 150px;">
                    <img src="{{ asset('images/home/hot3.jpg') }}" alt="Image 3" class="w-1/2 pl-3 object-cover"
                        style=" height: 150px;">
                </div>
            </div>
        </section>


        <section class="customerreviews">

            <section class="reviews-container">
                <div class="reviews-title text-lg md:text-4xl mb-4 ml-7 md:ml-12 py-8 mb-12">Hear From Our Customers
                </div>
                <div class="slider-container mobilereviews">
                    <div class="custom-swiper-container swiper-container">
                        <div class="swiper-wrapper ml-7 md:ml-12">

                            <div class="swiper-slide p-8 md:p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Kevin</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="reviewsh mt-2">Excellent quality business cards - Affordable prices.</p>
                            </div>

                            <div class="swiper-slide p-8 md:p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">George</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;<span class="text-gray-400">&#9733;</span>
                                    <!-- 5-star rating -->
                                </div>
                                <p class="reviewsh mt-2">Good. Very professional. </p>
                            </div>

                            <div class="swiper-slide p-8 md:p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Rebecca</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;<span class="text-gray-400">&#9733;</span>
                                    <!-- 5-star rating -->
                                </div>
                                <p class="reviewsh mt-2">Amazing quality.</p>
                            </div>

                            <div class="swiper-slide p-8 md:p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Tahir</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="reviewsh mt-2">Lovely service - Great quality.</p>
                            </div>

                            <div class="swiper-slide p-8 md:p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Kevin</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="reviewsh mt-2">Excellent quality business cards - Affordable prices.</p>
                            </div>

                            <div class="swiper-slide p-8 md:p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">George</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;<span class="text-gray-400">&#9733;</span>
                                    <!-- 5-star rating -->
                                </div>
                                <p class="reviewsh mt-2">Good. Very professional. </p>
                            </div>

                            <div class="swiper-slide p-8 md:p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Rebecca</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;<span class="text-gray-400">&#9733;</span>
                                    <!-- 5-star rating -->
                                </div>
                                <p class="reviewsh mt-2">Amazing quality.</p>
                            </div>

                            <div class="swiper-slide p-8 md:p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Tahir</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="reviewsh mt-2">Lovely service - Great quality.</p>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

            <section class="whatsappbanner relative px-0 md:px-0 py-8 md:py-16">
                <div class="h-auto text-white relative">
                    <img src="{{ asset('images/home/whatsapp.jpg') }}" alt="whatsapp"
                        class="mobilewhatsappimage w-full mb-8 md:max-w-none md:mb-0">
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <div class="text-center">
                            <p
                                class="text-xs pt-6 md:pt-0 md:text-4xl lg:text-6xl font-bold leading-tight mb-3 md:mb-4 uppercase">
                                Let's Start Building Your<br>
                                <span class="whitespace-nowrap">Brand's Unique Story Together.</span>
                            </p>
                            <div class="hidden md:block py-4 md:py-8 lg:py-12 mx-auto" style="width: fit-content;">
                                <a href="#"
                                    class="inline-block bg-white text-black md:px-10 lg:px-24 py-2 md:py-3 rounded-full flex items-center text-1-3rem letstalk">
                                    Get in Touch
                                    <span class="ml-2 text-black">
                                        <i class="fab fa-whatsapp"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="md:hidden py-0 md:py-4 mx-auto" style="width: fit-content;">
                                <a href="#"
                                    class="inline-block bg-white text-black px-6 py-0 md:py-2 rounded-full flex items-center text-base letstalk">
                                    Get in Touch
                                    <span class="ml-2 text-black">
                                        <i class="fab fa-whatsapp"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>







            <section class="flex flex-col md:flex-row p-6 md:p-16">
                <!-- Left Side Content -->
                <div class="md:w-1/2 px-1 md:px-6 pt-0 md:pt-24">
                    <h2 class="text-2xl md:text-6xl mb-4 letsstartmargin">Let's Talk Branding</h2>
                    <p class="text-black text-1xl md:text-2xl">
                        From idea to execution,
                        <br class="">we're here to help you achieve your branding goals.
                    </p>
                </div>

                <!-- Right Side Form -->
                <div class="md:w-1/2 px-1 md:px-8">
                    <form class="p-0 md:p-6 rounded-lg py-6">
                        <label class="block mb-2 pt-6 text-1xl md:text-lg">NAME</label>
                        <input type="text" class="w-full px-4 py-2 mb-4 border bg-gray-200" placeholder="Full Name">

                        <label class="block mb-2 pt-6 text-1xl md:text-lg">PHONE NUMBER</label>
                        <input id="phoneInput" type="tel" class="w-full px-10 py-2 mb-4 border pl-10 bg-gray-200"
                            style="width: 100% !important;" placeholder="Your Phone Number">

                        <label class="block mb-2 pt-6 text-1xl md:text-lg">EMAIL ADDRESS</label>
                        <input type="email" class="w-full px-4 py-2 mb-4 border bg-gray-200" placeholder="Email">

                        <label class="block mb-2 pt-6 text-1xl md:text-lg">MESSAGE</label>
                        <textarea class="w-full px-4 py-2 mb-4 border bg-gray-200" rows="4"
                            placeholder="Message"></textarea>

                        <button class="bg-black text-white px-4 py-2 rounded-full">Send Message</button>
                    </form>
                </div>
            </section>


            <section class="p-5 md:p-16 newitems">
                <h2 class="text-lg md:text-4xl px-2 mb-6 text-left py-6">New Items</h2>
                <div class="grid grid-cols-1 grid-cols-2 md:grid-cols-4 gap-0 md:gap-6">
                    <div class="p-2 flex flex-col md:items-center">
                        <img src="{{ asset('images/home/newitem1.jpg') }}" alt="Image 1"
                            class="w-full object-cover mb-2">
                        <p class="md:text-center text-xs md:text-lg text-black pt-2 md:pt-6">Tshirts</p>
                        <p class="newitemsbox-price text-xs md:text-lg text-dark-gray">Contact for Details</p>

                        <div class="whatsapp-button newitemswhatsapp ">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <div class="p-2 flex flex-col md:items-center">
                        <img src="{{ asset('images/home/newitem2.jpg') }}" alt="Image 2"
                            class="w-full object-cover mb-2">
                        <p class="md:text-center text-xs md:text-lg text-black pt-2 md:pt-6">Cups & Mugs
                        </p>
                        <p class="newitemsbox-price text-xs md:text-lg text-dark-gray">Contact for Details</p>

                        <div class="whatsapp-button newitemswhatsapp">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <div class="p-2 flex flex-col md:items-center">
                        <img src="{{ asset('images/home/newitem3.jpg') }}" alt="Image 3"
                            class="w-full object-cover mb-2">
                        <p class="md:text-center text-xs md:text-lg text-black pt-2 md:pt-6">Mousepads</p>
                        <p class="newitemsbox-price text-xs md:text-lg text-dark-gray">Contact for Details</p>

                        <div class="whatsapp-button newitemswhatsapp">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <div class="p-2 flex flex-col md:items-center">
                        <img src="{{ asset('images/home/newitem4.jpg') }}" alt="Image 4"
                            class="w-full object-cover mb-2">
                        <p class="md:text-center text-xs md:text-lg text-black pt-2 md:pt-6">Powerbanks
                        </p>
                        <p class="newitemsbox-price text-xs md:text-lg text-dark-gray">Contact for Details</p>

                        <div class="whatsapp-button newitemswhatsapp">
                            <a href="whatsapp-link-1" class="whatsapp-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="whatsapptexticon"
                                    width="30" height="30" viewBox="0,0,256,256">
                                    <g fill="#ffffff" fill-rule="evenodd" stroke="none" stroke-width="1"
                                        stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                        stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
                                        font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <g transform="scale(8,8)">
                                            <path
                                                d="M24.50391,7.50391c-2.25781,-2.25781 -5.25781,-3.50391 -8.45312,-3.50391c-6.58594,0 -11.94922,5.35938 -11.94922,11.94531c-0.00391,2.10547 0.54688,4.16016 1.59375,5.97266l-1.69531,6.19141l6.33594,-1.66406c1.74219,0.95313 3.71094,1.45313 5.71094,1.45703h0.00391c6.58594,0 11.94531,-5.35937 11.94922,-11.94922c0,-3.19141 -1.24219,-6.19141 -3.49609,-8.44922zM16.05078,25.88281h-0.00391c-1.78125,0 -3.53125,-0.48047 -5.05469,-1.38281l-0.36328,-0.21484l-3.76172,0.98438l1.00391,-3.66406l-0.23437,-0.375c-0.99609,-1.58203 -1.51953,-3.41016 -1.51953,-5.28516c0,-5.47266 4.45703,-9.92578 9.9375,-9.92578c2.65234,0 5.14453,1.03516 7.01953,2.91016c1.875,1.87891 2.90625,4.37109 2.90625,7.02344c0,5.47656 -4.45703,9.92969 -9.92969,9.92969zM21.49609,18.44531c-0.29687,-0.14844 -1.76562,-0.87109 -2.03906,-0.96875c-0.27344,-0.10156 -0.47266,-0.14844 -0.67187,0.14844c-0.19922,0.30078 -0.76953,0.97266 -0.94531,1.17188c-0.17187,0.19531 -0.34766,0.22266 -0.64453,0.07422c-0.30078,-0.14844 -1.26172,-0.46484 -2.40234,-1.48437c-0.88672,-0.78906 -1.48828,-1.76953 -1.66016,-2.06641c-0.17578,-0.30078 -0.01953,-0.46094 0.12891,-0.60937c0.13672,-0.13281 0.30078,-0.34766 0.44922,-0.52344c0.14844,-0.17187 0.19922,-0.29687 0.30078,-0.49609c0.09766,-0.19922 0.04688,-0.375 -0.02734,-0.52344c-0.07422,-0.14844 -0.67187,-1.62109 -0.92187,-2.21875c-0.24219,-0.58203 -0.48828,-0.5 -0.67187,-0.51172c-0.17187,-0.00781 -0.37109,-0.00781 -0.57031,-0.00781c-0.19922,0 -0.52344,0.07422 -0.79687,0.375c-0.27344,0.29688 -1.04297,1.01953 -1.04297,2.48828c0,1.46875 1.07031,2.89063 1.21875,3.08984c0.14844,0.19531 2.10547,3.21094 5.10156,4.50391c0.71094,0.30859 1.26563,0.49219 1.69922,0.62891c0.71484,0.22656 1.36719,0.19531 1.88281,0.12109c0.57422,-0.08594 1.76563,-0.72266 2.01563,-1.42187c0.24609,-0.69531 0.24609,-1.29297 0.17188,-1.41797c-0.07422,-0.125 -0.27344,-0.19922 -0.57422,-0.35156z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <a href="whatsapp-link-1" class="whatsapp-text whatsapptext">WhatsApp Us</a>
                        </div>
                    </div>
                    <!-- Add more grid items as needed -->
                </div>
            </section>



            <footer class="p-3 md:p-5 text-gray-700 pt-24 md:pt-28">
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 md:gap-8 mb-8">
                    <!-- Grid 1: Logo and Social Icons -->
                    <div class="flex flex-col ml-4 md:ml-16">
                        <img src="{{ asset('images/home/logo.png') }}" alt="Printo" class="h-16 logo mb-4">
                        <div class="flex gap-2">
                            <a href="#" class="text-black rounded-full bg-gray-200 p-2">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <a href="#" class="text-black rounded-full bg-gray-200 p-2">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-black rounded-full bg-gray-200 p-2">
                                <i class="fab fa-facebook text-xl "></i>
                            </a>
                        </div>
                    </div>

                    <!-- Grid 2: Services -->
                    <div class="pt-8 md:pt-0 pb-4 ml-4 md:ml-8">
                        <h3 class="text-xl mb-6 border-b-2 printoborder">Services</h3>
                        <ul>
                            <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Printing</a></li>
                            <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Packaging</a></li>
                            <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Banners &
                                    Displays</a></li>
                            <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Wallpapers</a></li>
                        </ul>
                    </div>

                    <!-- Grid 3: Support -->
                    <div class="pb-4 support ml-4 md:ml-0">
                        <h3 class="text-xl mb-6 border-b-2 printoborder">Support</h3>
                        <ul>
                            <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Contact Us</a></li>
                            <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Privacy Policy</a>
                            </li>
                            <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Conditions</a></li>
                        </ul>
                    </div>

                    <!-- Grid 4: Contact -->
                    <div class="contactus ml-4 md:ml-0">
                        <h3 class="text-xl mb-6 border-b-2 printoborder">Get in touch</h3>
                        <ul>
                            <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Estimate</a>
                            </li>
                            <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Email</a></li>
                        </ul>
                    </div>
                </div>

                <div class="border-t-2 mb-8"></div>

                <div class="hidden md:flex justify-between">
                    <div>
                        Printo© Copyright 2023. All Rights Reserved.
                    </div>
                    <div>
                        <!-- <a href="#" class="text-black hover:text-red-600">Privacy</a> -->
                    </div>
                </div>

                <div class="flex md:hidden flex-col items-center">
                    <div class="mb-2" style="font-size: 14px;">
                        Printo © Copyright 2023. All Rights Reserved.
                    </div>
                    <div>
                        <!-- <a href="#" class="text-black hover:text-red-600" style="font-size: 14px;">Privacy</a> -->
                    </div>
                </div>

            </footer>


        </section>




    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
    var slides = [];
    var swiper;

    function updateSlides() {
        if (window.innerWidth <= 768) {
            // Mobile slides
            slides = [{
                    image: 'images/home/slider/slidem1.jpg',
                    alt: 'Mobile Slide 1',
                    link: '#'
                },
                {
                    image: 'images/home/slider/slidem2.jpg',
                    alt: 'Mobile Slide 1',
                    link: '#'
                },
                {
                    image: 'images/home/slider/slidem3.jpg',
                    alt: 'Mobile Slide 1',
                    link: '#'
                },
                {
                    image: 'images/home/slider/slidem4.jpg',
                    alt: 'Mobile Slide 1',
                    link: '#'
                },
                {
                    image: 'images/home/slider/slidem5.jpg',
                    alt: 'Mobile Slide 1',
                    link: '#'
                },
                {
                    image: 'images/home/slider/slidem6.jpg',
                    alt: 'Mobile Slide 1',
                    link: '#'
                },
                // Add more mobile slides as needed
            ];
        } else {
            // Desktop slides
            slides = [{
                    image: 'images/home/slider/slide1.jpg',
                    alt: 'Desktop Slide 1',
                    link: '#'
                },
                {
                    image: 'images/home/slider/slide2.jpg',
                    alt: 'Desktop Slide 2',
                    link: '#'
                },
                {
                    image: 'images/home/slider/slide3.jpg',
                    alt: 'Desktop Slide 3',
                    link: '#'
                },
                {
                    image: 'images/home/slider/slide4.jpg',
                    alt: 'Desktop Slide 4',
                    link: '#'
                },
                {
                    image: 'images/home/slider/slide5.jpg',
                    alt: 'Desktop Slide 5',
                    link: '#'
                },
                {
                    image: 'images/home/slider/slide6.jpg',
                    alt: 'Desktop Slide 6',
                    link: '#'
                },
                // Add more desktop slides as needed
            ];
        }

        var swiperWrapper = document.querySelector('.swiper-wrapper');
        swiperWrapper.innerHTML = ''; // Clear existing slides

        slides.forEach(function(slide) {
            var slideHtml = `
                    <div class="swiper-slide relative">
                        <a href="${slide.link}">
                            <img src="${slide.image}" alt="${slide.alt}" class="slide-image">
                        </a>
                    </div>
                `;
            swiperWrapper.innerHTML += slideHtml;
        });

        if (swiper) {
            swiper.destroy(); // Destroy existing Swiper instance
        }

        swiper = new Swiper('.swiper-container-responsive', {
            slidesPerView: 1,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
        });
    }

    // Initial update and event listener
    updateSlides();
    window.addEventListener('resize', updateSlides);
    </script>




    <script>
    const toggleButtons = document.querySelectorAll('.toggle-icon');
    const questionLinks = document.querySelectorAll('.faqbutton a'); // Select all the question links

    toggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            const answer = button.parentElement.nextElementSibling;
            toggleAnswer(answer, button);
        });
    });

    questionLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent the default link behavior
            const answer = link.parentElement.nextElementSibling;
            const toggleButton = link.parentElement.querySelector('.toggle-icon');
            toggleAnswer(answer, toggleButton);
        });
    });

    function toggleAnswer(answer, button) {
        if (answer.classList.contains('hidden')) {
            answer.classList.remove('hidden');
            button.textContent = '-';
            button.classList.add('bg-gray-600');
        } else {
            answer.classList.add('hidden');
            button.textContent = '+';
            button.classList.remove('bg-gray-600');
        }
    }
    </script>

    <script>
    // Function to initialize Swiper on desktop
    function initDesktopSwiper() {
        new Swiper('.custom-swiper-container', {
            slidesPerView: 3.6, // Show 3 slides on desktop
            spaceBetween: 16,
            loop: true,
            autoplay: {
                delay: 3000,
            },
        });
    }

    // Function to initialize Swiper on mobile
    function initMobileSwiper() {
        new Swiper('.custom-swiper-container', {
            slidesPerView: 1.6, // Show 1 slide at a time on mobile
            spaceBetween: 16,
            loop: true,
            autoplay: {
                delay: 3000,
            },
        });
    }

    // Check the screen width and initialize the appropriate Swiper instance
    function initSwiperBasedOnScreenWidth() {
        if (window.innerWidth < 640) {
            // Mobile screen
            initMobileSwiper();
        } else {
            // Desktop screen
            initDesktopSwiper();
        }
    }

    // Initial initialization based on screen width
    initSwiperBasedOnScreenWidth();

    // Update Swiper when the window is resized
    window.addEventListener('resize', initSwiperBasedOnScreenWidth);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"></script>
    <script>
    const phoneInput = document.querySelector("#phoneInput");

    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "ae", // Set default country
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.js",
    });

    phoneInput.addEventListener("blur", () => {
        const phoneNumber = iti.getNumber();
        phoneInput.value = phoneNumber;
    });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var companyLogoSwiper = new Swiper('.companylogo-carousel', {
            slidesPerView: 3,
            spaceBetween: 14,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 6,
                    spaceBetween: 14,
                },
            },
        });

        // Manually clone the slides for desktop version
        var desktopSlides = document.querySelectorAll('.companylogo-carousel .swiper-slide');
        var desktopSlideCount = desktopSlides.length;

        if (window.innerWidth > 640) {
            for (var i = 0; i < desktopSlideCount; i++) {
                var cloneSlide = desktopSlides[i].cloneNode(true);
                cloneSlide.classList.add('swiper-slide-duplicate');
                companyLogoSwiper.wrapperEl.appendChild(cloneSlide);
            }
        }
    });
    </script>


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
</body>

</html>
</body>

</html>
@endsection