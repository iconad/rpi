@extends('layouts.app')

@section('headlinks')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printo Home Page</title>
    <style>
    #app {
        display: none;
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
        bottom: 20px;
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

    /* Desktop Styles */

    @media screen and (min-width: 768px) {
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
            padding-left: 9rem;
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
        }
    }

    @media screen and (max-width: 767px) {

        .swiper-button-next,
        .swiper-button-prev {
            font-size: 1rem;
        }

        .faqbutton {
            text-align: left;
        }

        .mobilereviews {
            margin-left: -3rem;
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
        }
    }
    </style>
</head>

<body class="overflow-x-hidden">
    <div class="container mx-auto max-w-full">
        <header class="bg-white shadow-lg">
            <!-- Top Bar -->
            <div class="bg-black py-2 px-14 md:px-15 text-white text-center flex justify-between items-center text-lg">
                <div class="flex items-center md:ml-4">
                    <i class="fas fa-envelope text-white mr-2"></i>
                    <p class="text-sm">info@printo.ae</p>
                    <i class="fas fa-headphones text-white mx-4"></i>
                    <p class="text-sm">+123 456 7890</p>
                </div>
            </div>

            <!-- Navigation with Search Bar -->
            <nav class="bg-white text-black py-4 px-14 md:px-15 flex justify-between items-center">
                <div class="flex items-center md:ml-4">
                    <!-- Add your logo here -->
                    <img src="{{ asset('images/home/logo.png') }}" alt="Printo" class="h-16 w-30">
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
                            Display</a></li>
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Corporate</a>
                    </li>
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Wallpapers</a>
                    </li>
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Estimate</a>
                    </li>
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Info</a></li>
                    <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">About Us</a>
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


        <!-- Slider (Hero Banner Style) -->
        <section class="relative overflow-x-hidden">
            <div class="swiper-container swiper-container-printo h-96 ">
                <div class="swiper-wrapper ">
                    <div class="swiper-slide relative ">
                        <img src="{{ asset('images/home/slider/slide1.jpg') }}" alt="WEAR YOUR IMMAGINATION "
                            class="slide-image ">

                    </div>
                    <div class="swiper-slide relative ">
                        <img src="{{ asset('images/home/slider/slide2.jpg') }}" alt="Image " class="slide-image ">

                    </div>
                    <div class="swiper-slide relative ">
                        <img src="{{ asset('images/home/slider/slide3.jpg') }}" alt="Image " class="slide-image ">

                    </div>
                    <div class="swiper-slide relative ">
                        <img src="{{ asset('images/home/slider/slide4.jpg') }}" alt="Image " class="slide-image ">

                    </div>
                    <div class="swiper-slide relative ">
                        <img src="{{ asset('images/home/slider/slide5.jpg') }}" alt="Image " class="slide-image ">

                    </div>
                    <div class="swiper-slide relative ">
                        <img src="{{ asset('images/home/slider/slide6.jpg') }}" alt="Image " class="slide-image ">

                    </div>
                    <!-- Add more slides as needed -->
                </div>
                <div class="swiper-pagination "></div>
                <div class="swiper-button-next "></div>
                <div class="swiper-button-prev "></div>
            </div>
        </section>

        <section class="paddingsection px-10 ">
            <section class="companylogo px-14 md:px-15 ">
                <div class="grid grid-cols-2 md:grid-cols-6 gap-14 py-5 ">
                    <!-- Logo 1 -->
                    <div class="flex items-center justify-center ">
                        <img src="{{ asset('images/home/1.png') }}" alt="Logo 1 " class="max-w-full h-auto ">
                    </div>

                    <!-- Logo 2 -->
                    <div class="flex items-center justify-center ">
                        <img src="{{ asset('images/home/2.png') }}" alt="Logo 2 " class="max-w-full h-auto ">
                    </div>

                    <!-- Logo 3 -->
                    <div class="flex items-center justify-center ">
                        <img src="{{ asset('images/home/3.png') }}" alt="Logo 3 " class="max-w-full h-auto ">
                    </div>

                    <!-- Logo 4 -->
                    <div class="flex items-center justify-center ">
                        <img src="{{ asset('images/home/4.png') }}" alt="Logo 4 " class="max-w-full h-auto ">
                    </div>

                    <!-- Logo 5 -->
                    <div class="flex items-center justify-center ">
                        <img src="{{ asset('images/home/5.png') }}" alt="Logo 5 " class="max-w-full h-auto ">
                    </div>

                    <!-- Logo 6 -->
                    <div class="flex items-center justify-center ">
                        <img src="{{ asset('images/home/6.png') }}" alt="Logo 6 " class="max-w-full h-auto ">
                    </div>
                </div>
            </section>
        </section>



        <section class="categoryboxes md:px-10 md:px-7.5 ">
            <div class="flex flex-col md:flex-row space-y-8 md:space-y-0 md:space-x-8 ">
                <!-- Grid Box 1 -->
                <div class="flex-shrink-0 w-full md:w-1/3 px-3 ">
                    <img src="{{ asset('images/home/printing.jpg') }}" alt="Image 1 " class="w-full h-auto ">
                </div>

                <!-- Grid Box 2 -->
                <div class="flex-shrink-0 w-full md:w-1/3 px-3 ">
                    <img src="{{ asset('images/home/packaging.jpg') }}" alt="Image 2 " class="w-full h-auto ">
                </div>

                <!-- Grid Box 3 -->
                <div class="flex-shrink-0 w-full md:w-1/3 px-3 ">
                    <img src="{{ asset('images/home/merch.jpg') }}" alt="Image 3 " class="w-full h-auto ">
                </div>
            </div>
        </section>

        <section class="p-5 md:px-12 bestseller ">
            <h2 class="text-4xl mb-4 py-16 ">Best Sellers</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-16 ">
                <!-- Box 1 -->
                <div class="relative box ">
                    <img src="{{ asset('images/home/product1.jpg') }}" alt="Product 1 " class="box-image ">
                    <p class="box-name ">Business cards</p>
                </div>

                <!-- Box 2 -->
                <div class="relative box ">
                    <img src="{{ asset('images/home/product2.jpg') }}" alt="Product 2 " class="box-image ">
                    <p class="box-name ">Large stickers</p>
                </div>

                <!-- Box 3 -->
                <div class="relative box ">
                    <img src="{{ asset('images/home/product3.jpg') }}" alt="Product 3 " class="box-image ">
                    <p class="box-name ">posters </p>
                </div>

                <!-- Box 4 -->
                <div class="relative box ">
                    <img src="{{ asset('images/home/product4.jpg') }}" alt="Product 4 " class="box-image ">
                    <p class="box-name ">promotional Boxes</p>
                </div>

                <!-- Box 5 -->
                <div class="relative box ">
                    <img src="{{ asset('images/home/product5.jpg') }}" alt="Product 5 " class="box-image ">
                    <p class="box-name ">stationary</p>
                </div>

                <!-- Box 6 -->
                <div class="relative box ">
                    <img src="{{ asset('images/home/product6.jpg') }}" alt="Product 6 " class="box-image ">
                    <p class="box-name ">home Decor</p>
                </div>

                <!-- Box 7 -->
                <div class="relative box ">
                    <img src="{{ asset('images/home/product7.jpg') }}" alt="Product 7 " class="box-image ">
                    <p class="box-name ">Bedroom Wallpapers </p>
                </div>

                <!-- Box 8 -->
                <div class="relative box ">
                    <img src="{{ asset('images/home/product8.jpg') }}" alt="Product 8 " class="box-image ">
                    <p class="box-name ">Roll up Banners</p>
                </div>

                <!-- Box 9 -->
                <div class="relative box ">
                    <img src="{{ asset('images/home/product9.jpg') }}" alt="Product 9 " class="box-image ">
                    <p class="box-name ">Foamboard Panels</p>
                </div>
            </div>
        </section>
        <section class="premiumdesign p-4 md:px-8">
            <div class="container mx-auto max-w-full flex flex-col md:flex-row p-4">
                <!-- Left Grid (Bigger) -->
                <section class="w-full md:w-3/5">
                    <img src="{{ asset('images/home/left-image.jpg') }}" alt="Left Image" class="w-full h-auto">
                </section>

                <!-- Right Grid (Smaller) -->
                <section class="w-full md:w-2/5 bg-gray-200 p-6 pr-4 md:pr-24 mt-6 md:mt-0 md:ml-4 md:ml-8">
                    <div class="flex flex-col h-full">
                        <div>
                            <h2 class="text-macbook text-2rem md:text-5xl mb-4 md:pr-26 md:pl-4 md:pt-24">Premium
                                Design. Premium Quality.</h2>

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

        <section class="toppicks p-5 md:px-12">

            <h2 class="text-4xl mb-6 py-16">Top Picks</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Product 1 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick1.jpg') }}" alt="Product 1" class="w-full h-auto mb-4">
                    <p class="text-left text-lg font-medium mb-2">Cups & Mugs</p>
                </div>
                <!-- Product 2 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick2.jpg') }}" alt="Product 2" class="w-full h-auto mb-4">
                    <p class="text-left text-lg font-medium mb-2">Door Hangers</p>
                </div>
                <!-- Product 3 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick3.jpg') }}" alt="Product 3" class="w-full h-auto mb-4">
                    <p class="text-left text-lg font-medium mb-2">Business Cards</p>
                </div>
                <!-- Product 4 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick4.jpg') }}" alt="Product 4" class="w-full h-auto mb-4">
                    <p class="text-left text-lg font-medium mb-2">Cake Boxes</p>
                </div>
                <!-- Product 5 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick5.jpg') }}" alt="Product 5" class="w-full h-auto mb-4">
                    <p class="text-left text-lg font-medium mb-2">Drawing Room wallpapers</p>
                </div>
                <!-- Product 6 -->
                <div class="flex flex-col items-start">
                    <img src="{{ asset('images/home/pick6.jpg') }}" alt="Product 6" class="w-full h-auto mb-4">
                    <p class="text-left text-lg font-medium mb-2">Canvas Print</p>
                </div>
            </div>
        </section>
        <section class="bgimage py-16">
            <div class="parallax-container">
                <img src="{{ asset('images/home/bgimage.jpg') }}" alt="Why Us!" class="parallax-image">
            </div>
        </section>


        <section class="faq flex flex-col md:flex-row p-4 md:p-8">
            <!-- FAQ Section (Left Side) -->
            <div class="w-full md:w-3/5 p-4 md:p-8">
                <h2 class="text-2xl md:text-4xl mb-4 md:mb-6">
                    Frequently Asked<br class="hidden md:inline"> Questions (FAQs)
                </h2>
                <!-- FAQ Items -->
                <div class="mb-4 md:mb-6 faqitems">
                    <button
                        class="faqbutton flex items-center justify-between w-full text-lg focus:outline-none border-b border-black pb-2 md:pb-6 px-2 md:px-6">
                        <span class="pr-2 md:pr-6">What kind of Printers/Printing types does Printo have?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <p class="text-gray-600 hidden">Answer to question 1.</p>
                </div>
                <div class="mb-4 md:mb-6 faqitems">
                    <button
                        class="faqbutton flex items-center justify-between w-full text-lg focus:outline-none border-b border-black pb-2 md:pb-6 px-2 md:px-6">
                        <span class="pr-2 md:pr-6">Do I need to pay separate delivery charges for each product?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <p class="text-gray-600 hidden">Answer to question 2.</p>
                </div>
                <div class="mb-4 md:mb-6 faqitems">
                    <button
                        class="faqbutton flex items-center justify-between w-full text-lg focus:outline-none border-b border-black pb-2 md:pb-6 px-2 md:px-6">
                        <span class="pr-2 md:pr-6">Do you supply overseas?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <p class="text-gray-600 hidden">Answer to question 3.</p>
                </div>
                <div class="mb-4 md:mb-6 faqitems">
                    <button
                        class="faqbutton flex items-center justify-between w-full text-lg focus:outline-none border-b border-black pb-2 md:pb-6 px-2 md:px-6">
                        <span class="pr-2 md:pr-6">Printo’s service time or how quick is our delivery?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <p class="text-gray-600 hidden">Answer to question 4.</p>
                </div>
                <div class="mb-4 md:mb-6 faqitems">
                    <button
                        class="faqbutton flex items-center justify-between w-full text-lg focus:outline-none border-b border-black pb-2 md:pb-6 px-2 md:px-6">
                        <span class="pr-2 md:pr-6">How can I place an order?</span>
                        <span class="toggle-icon">+</span>
                    </button>
                    <p class="text-gray-600 hidden">Answer to question 5.</p>
                </div>
                <!-- Add more FAQ items as needed -->
            </div>
            <!-- Empty Space (Right Side) -->
            <div class="w-full md:w-2/5"></div>
        </section>

        <div class="text-4xl mb-4 ml-12 py-2">Hot Items</div>

        <section class="flex p-6 md:p-12">
            <div class="w-1/2 h-screen/2 flex flex-col items-start justify-start relative">
                <img src="{{ asset('images/home/hot1.jpg') }}" alt="Image 1" class="w-full object-cover">
            </div>
            <div class="w-1/2 h-screen/2 flex flex-col pl-4">
                <img src="{{ asset('images/home/hot2.jpg') }}" alt="Image 2" class="w-full object-cover mb-2">
                <img src="{{ asset('images/home/hot3.jpg') }}" alt="Image 3" class="w-full object-cover pt-5">
            </div>
        </section>

        <section class="customerreviews">

            <section class="reviews-container">
                <div class="reviews-title text-4xl mb-4 ml-12 py-8 mb-12">Hear From Our Customers</div>
                <div class="slider-container mobilereviews">
                    <div class="custom-swiper-container swiper-container">
                        <div class="swiper-wrapper ml-12">

                            <div class="swiper-slide p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Kevin</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipiscing elit montes id odio
                                    feugiat digniss aliquet quam. Adipiscing elit montes id odio. adipiscing elit montes
                                    id odio feugiat dignis.</p>
                            </div>

                            <div class="swiper-slide p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">George</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipiscing elit montes id odio
                                    feugiat digniss aliquet quam. Adipiscing elit montes id odio. adipiscing elit montes
                                    id odio feugiat dignis.</p>
                            </div>

                            <div class="swiper-slide p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Rebbeca</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipiscing elit montes id odio
                                    feugiat digniss aliquet quam. Adipiscing elit montes id odio. adipiscing elit montes
                                    id odio feugiat dignis.</p>
                            </div>

                            <div class="swiper-slide p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Tahir</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipiscing elit montes id odio
                                    feugiat digniss aliquet quam. Adipiscing elit montes id odio. adipiscing elit montes
                                    id odio feugiat dignis.</p>
                            </div>

                            <div class="swiper-slide p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Kevin</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipiscing elit montes id odio
                                    feugiat digniss aliquet quam. Adipiscing elit montes id odio. adipiscing elit montes
                                    id odio feugiat dignis.</p>
                            </div>

                            <div class="swiper-slide p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">George</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipiscing elit montes id odio
                                    feugiat digniss aliquet quam. Adipiscing elit montes id odio. adipiscing elit montes
                                    id odio feugiat dignis.</p>
                            </div>

                            <div class="swiper-slide p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 py-6">Rebbeca</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipiscing elit montes id odio
                                    feugiat digniss aliquet quam. Adipiscing elit montes id odio. adipiscing elit montes
                                    id odio feugiat dignis.</p>
                            </div>

                            <div class="swiper-slide p-12 border-2 flex flex-col items-start">
                                <p class="text-lg font-bold mb-2 text-left py-6">Tahir</p>
                                <div class="rating text-yellow-500">
                                    &#9733;&#9733;&#9733;&#9733;&#9733;
                                    <!-- 5-star rating -->
                                </div>
                                <p class="mt-2">Lorem ipsum dolor sit amet consectetur adipiscing elit montes id odio
                                    feugiat digniss aliquet quam. Adipiscing elit montes id odio. adipiscing elit montes
                                    id odio feugiat dignis.</p>
                            </div>

                        </div>
                    </div>
                </div>
    </div>
    </section>

    <section class="whatsappbanner relative py-8 md:py-16">
        <div class="h-auto text-white relative">
            <img src="{{ asset('images/home/whatsapp.jpg') }}" alt="whatsapp"
                class="w-full max-w-sm mb-8 md:max-w-none md:mb-0">
            <div class="absolute inset-0 flex flex-col items-center justify-center">
                <div class="text-center">
                    <p class="text-xl md:text-4xl lg:text-5xl font-bold leading-tight mb-3 md:mb-4">
                        Let's Start Building Your<br>
                        <span class="whitespace-nowrap">Brand's Unique Story Together.</span>
                    </p>
                    <div class="py-4 md:py-8 lg:py-12 mx-auto" style="width: fit-content;">
                        <a href="#"
                            class="inline-block bg-white text-black px-6 md:px-8 lg:px-10 py-2 md:py-3 rounded-full flex items-center text-xs md:text-sm">
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




    <section class="flex flex-col md:flex-row p-16">
        <!-- Left Side Content -->
        <div class="md:w-1/2 px-8 pt-24">
            <h2 class="text-6xl mb-4">Let's Talk Branding</h2>
            <p class="text-black text-1-4rem">
                From strategy to execution, we're here to help you
                <br class="hidden md:inline"> achieve your branding goals.
            </p>
        </div>

        <!-- Right Side Form -->
        <div class="md:w-1/2 px-8">
            <form class="p-6 rounded-lg py-6">
                <label class="block mb-2 pt-6 text-lg">NAME</label>
                <input type="text" class="w-full px-4 py-2 mb-4 border bg-gray-200" placeholder="Full Name">

                <label class="block mb-2 pt-6 text-lg">PHONE NUMBER</label>
                <input id="phoneInput" type="tel" class="w-full px-10 py-2 mb-4 border rounded-lg pl-10 bg-gray-200"
                    style="width: 100% !important;" placeholder="Your Phone Number">

                <label class="block mb-2 pt-6 text-lg">EMAIL ADDRESS</label>
                <input type="email" class="w-full px-4 py-2 mb-4 border bg-gray-200" placeholder="Email">

                <label class="block mb-2 pt-6 text-lg">MESSAGE</label>
                <textarea class="w-full px-4 py-2 mb-4 border bg-gray-200" rows="4" placeholder="Message"></textarea>

                <button class="bg-black text-white px-4 py-2 rounded-full">Send Message</button>
            </form>
        </div>
    </section>


    <section class="p-16 newitems">
        <h2 class="text-4xl px-2 mb-6">New Items</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="p-2">
                <img src="{{ asset('images/home/newitem1.jpg') }}" alt="Image 1" class="w-full object-cover mb-2">
                <p class="text-black">Tshirts</p>
            </div>
            <div class="p-2">
                <img src="{{ asset('images/home/newitem2.jpg') }}" alt="Image 2" class="w-full object-cover mb-2">
                <p class="text-black">Cups & Mugs</p>
            </div>
            <div class="p-2">
                <img src="{{ asset('images/home/newitem3.jpg') }}" alt="Image 3" class="w-full object-cover mb-2">
                <p class="text-black">Mousepads</p>
            </div>
            <div class="p-2">
                <img src="{{ asset('images/home/newitem4.jpg') }}" alt="Image 4" class="w-full object-cover mb-2">
                <p class="text-black">Powerbanks</p>
            </div>
            <!-- Add more grid items as needed -->
        </div>
    </section>


    <footer class="p-4 text-gray-700 pt-24">
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-8 mb-8">
            <!-- Grid 1: Logo and Social Icons -->
            <div class="flex flex-col ml-16">
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
            <div class="pb-4 ml-8">
                <h3 class="text-xl mb-6 border-b-2 printoborder">Services</h3>
                <ul>
                    <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Print Products</a></li>
                    <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Packaging</a></li>
                    <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Banners & Display</a></li>
                    <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Wallpapers</a></li>
                </ul>
            </div>

            <!-- Grid 3: Support -->
            <div class="pb-4 support">
                <h3 class="text-xl mb-6 border-b-2 printoborder">Support</h3>
                <ul>
                    <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Contact Us</a></li>
                    <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Privacy Policy</a></li>
                    <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Conditions</a></li>
                </ul>
            </div>

            <!-- Grid 4: Contact -->
            <div class="contactus">
                <h3 class="text-xl mb-6 border-b-2 printoborder">Contact Us</h3>
                <ul>
                    <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Request a Quote</a></li>
                    <li class="mb-4"><a href="#" class="text-black mb-6 hover:text-red-600">Send Email</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t-2 mb-8"></div>

        <div class="grid grid-cols-2 items-center">
            <div class="text-left">
                Printo© Copyright 2023. All Rights Reserved.
            </div>
            <div class="text-right">
                <a href="#" class="text-black hover:text-red-600">Privacy</a>
            </div>
        </div>
    </footer>


    </section>




    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js "></script>
    <script>
    var swiper = new Swiper('.swiper-container-printo', {
        slidesPerView: 1,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        },
        autoplay: {
            delay: 5000, // Delay between slides in milliseconds
            disableOnInteraction: false, // Autoplay continues even when user interacts with the slider
        },
    });
    </script>
    <script>
    const mobileMenuButton = document.getElementById("mobile-menu-button ");
    const mobileMenu = document.getElementById("mobile-menu ");

    mobileMenuButton.addEventListener("click ", () => {
        mobileMenu.classList.toggle("hidden ");
    });
    </script>
    <script>
    const toggleButtons = document.querySelectorAll('.toggle-icon');

    toggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            const answer = button.parentElement.nextElementSibling;
            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                button.textContent = '-';
                button.classList.add('bg-gray-600');
            } else {
                answer.classList.add('hidden');
                button.textContent = '+';
                button.classList.remove('bg-gray-600');
            }
        });
    });
    </script>
    <script>
    var swiper = new Swiper('.custom-swiper-container', {
        slidesPerView: 1, // Show 3 slides on desktop
        spaceBetween: 16,
        loop: true,
        autoplay: {
            delay: 3000,
        },
        breakpoints: {
            640: {
                slidesPerView: 3.6, // Show 1 slide at a time on mobile
            }
        }
    });
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
</body>

</html>
</body>

</html>
@endsection