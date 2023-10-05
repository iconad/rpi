@extends('layouts.printo')

@section('content')

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
            <a href="https://printo.ae/categories/print-products"> <img src="{{ asset('images/home/printing.jpg') }}"
                    alt="Image 1 " class="w-full h-auto "> </a>
        </div>

        <!-- Grid Box 2 -->
        <div class="flex-shrink-0 w-full md:w-1/3 px-3 md:px-0 no-padding-mobile  ">
            <a href="https://printo.ae/categories/packaging"> <img src="{{ asset('images/home/packaging.jpg') }}"
                    alt="Image 2 " class="w-full h-auto "> </a>
        </div>

        <!-- Grid Box 3 -->
        <div class="flex-shrink-0 w-full md:w-1/3 px-3 md:px-0 no-padding-mobile  ">
            <a href="https://printo.ae/comingsoon"> <img src="{{ asset('images/home/merch.jpg') }}" alt="Image 3 "
                    class="w-full h-auto ">
            </a>
        </div>
    </div>
</section>

<section class="md:p-5 p-7 md:px-12 bestseller">



    <h2 class="text-2xl md:text-4xl mb-4 py-10 md:py-16">Best Sellers</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-16">
        <!-- Box 1 -->
        <div class="relative box">
            <a href="https://printo.ae/category/business-cards/products"><img
                    src="{{ asset('images/home/product1.jpg') }}" alt="Product 1" class="box-image"></a>
            <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                <a href="https://printo.ae/category/business-cards/products">
                    <p class="box-name">Business Cards

                    </p>
                </a>
                </a>
                <div class="whatsapp-button">
                <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">AED 115.00 / 250 Copies</p>

        </div>

        <!-- Box 2 -->
        <div class="relative box">
            <a href="https://printo.ae/category/large-stickers/products"><img
                    src="{{ asset('images/home/product2.jpg') }}" alt="Product 2" class="box-image"></a>
            <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                <a href="https://printo.ae/category/large-stickers/products">
                    <p class="box-name">Large Stickers</p>
                </a>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">AED 180.00 / Copy</p>

        </div>

        <!-- Box 3 -->
        <div class="relative box">
            <a href="https://printo.ae/category/posters/products"><img src="{{ asset('images/home/product3.jpg') }}"
                    alt="Product 3" class="box-image"></a>
            <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                <a href="https://printo.ae/category/posters/products">
                    <p class="box-name">Posters

                    </p>
                </a>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">AED 176.00 / Copy</p>

        </div>

        <!-- Box 4 -->
        <div class="relative box">
            <a href="https://printo.ae/category/product/products"><img src="{{ asset('images/home/product4.jpg') }}"
                    alt="Product 4" class="box-image"></a>
            <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                <a href="https://printo.ae/category/product/products">
                    <p class="box-name">Boxes</p>
                </a>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">Contact for Details</p>

        </div>

        <!-- Box 5 -->
        <div class="relative box">
            <a href="https://printo.ae/category/stationary-1/products"><img
                    src="{{ asset('images/home/product5.jpg') }}" alt="Product 5" class="box-image"></a>
            <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                <a href="https://printo.ae/category/stationary-1/products">
                    <p class="box-name">Stationery</p>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">AED 875.00 / 50 Notebooks</p>

        </div>

        <!-- Box 6 -->
        <div class="relative box">
            <a href="https://printo.ae/category/home-decor/subcategories/calendar/products"><img
                    src="{{ asset('images/home/product6.jpg') }}" alt="Product 6" class="box-image"></a>
            <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                <a href="https://printo.ae/category/home-decor/subcategories/calendar/products">
                    <p class="box-name">Calendars</p>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">AED 630.00 / 50 Copies</p>

        </div>

        <!-- Box 7 -->
        <div class="relative box">
            <a href="https://printo.ae/products/wallpapers/bedroom-wallpapers"><img
                    src="{{ asset('images/home/product7.jpg') }}" alt="Product 7" class="box-image"></a>
            <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                <a href="https://printo.ae/products/wallpapers/bedroom-wallpapers">
                    <p class="box-name macbookwhatsappside">Wallpapers</p>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">AED 25.20 / Roll</p>

        </div>

        <!-- Box 8 -->
        <div class="relative box">
            <a href="https://printo.ae/category/roll-up-banners/products"><img
                    src="{{ asset('images/home/product8.jpg') }}" alt="Product 8" class="box-image"></a>
            <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                <a href="https://printo.ae/category/roll-up-banners/products">
                    <p class="box-name">Roll Up Banners</p>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">AED 130.00 / Copy</p>

        </div>

        <!-- Box 9 -->
        <div class="relative box">
            <a href="https://printo.ae/category/foamboard-panels/products"><img
                    src="{{ asset('images/home/product9.jpg') }}" alt="Product 9" class="box-image"></a>
            <div class="flex items-center justify-between mb-2 md:pt-6 pt-0.5">
                <a href="https://printo.ae/category/foamboard-panels/products">
                    <p class="box-name">Foamboard Panels</p>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
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
                    <a href="https://printo.ae/pages/about-us"> <button
                            class="bg-black text-white text-base md:text-lg py-2 md:py-4 px-4 md:px-14 rounded-full self-start md:ml-4  md:mt-0">About
                            Us</button></a>
                </div>
            </div>
        </section>
    </div>
</section>


<section class="toppicks md:p-5 p-7 md:px-12">
    <h2 class="text-2xl md:text-4xl mb-6 py-10 md:py-16">Top Picks</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-14">
        <!-- Product 1 -->
        <div class="flex flex-col items-start">
            <a href="https://printo.ae/comingsoon"> <img src="{{ asset('images/home/pick1.jpg') }}" alt="Product 1"
                    class="w-full h-auto mb-2 md:mb-4"></a>
            <div class="flex items-center justify-between mb-2 w-full">
                <a href="https://printo.ae/comingsoon">
                    <p class="box-name">Cups & Mugs</p>
                </a>
                <div class="whatsapp-button ">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">Contact for Details</p>

        </div>

        <!-- Product 2 -->
        <div class="flex flex-col items-start">
            <a href="https://printo.ae/category/promotional-products/subcategories/hangers/products"> <img
                    src="{{ asset('images/home/pick2.jpg') }}" alt="Product 2" class="w-full h-auto mb-2 md:mb-4"></a>
            <div class="flex items-center justify-between mb-2 w-full">
                <a href="https://printo.ae/category/promotional-products/subcategories/hangers/products">
                    <p class="box-name">Door Hangers</p>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">AED 375.00 / 500 Copies</p>

        </div>

        <!-- Product 3 -->
        <div class="flex flex-col items-start">
            <a href="https://printo.ae/category/business-cards/products"><img src="{{ asset('images/home/pick3.jpg') }}"
                    alt="Product 3" class="w-full h-auto mb-2 md:mb-4"></a>
            <div class="flex items-center justify-between mb-2 w-full">
                <a href="https://printo.ae/category/business-cards/products">
                    <p class="box-name">Business Cards</p>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">AED 115.00 / 250 Copies</p>

        </div>

        <!-- Product 4 -->
        <div class="flex flex-col items-start">
            <img src="{{ asset('images/home/pick4.jpg') }}" alt="Product 4" class="w-full h-auto mb-2 md:mb-4">
            <div class="flex items-center justify-between mb-2 w-full">
                <a href="">
                    <p class="box-name">Cake Boxes</p>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">Contact for Details</p>

        </div>

        <!-- Product 5 -->
        <div class="flex flex-col items-start">
            <a href="https://printo.ae/products/wallpapers/living-room-wallpapers"> <img
                    src="{{ asset('images/home/pick5.jpg') }}" alt="Product 5" class="w-full h-auto mb-2 md:mb-4"></a>
            <div class="flex items-center justify-between mb-2 w-full">
                <a href="https://printo.ae/products/wallpapers/living-room-wallpapers">
                    <p class="box-name">Wallpapers</p>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
                </div>
            </div>
            <p class="box-price text-dark-gray">AED 25.20 / Roll</p>

        </div>

        <!-- Product 6 -->
        <div class="flex flex-col items-start">
            <a href="https://printo.ae/products/wallpapers/canvas-frames"> <img
                    src="{{ asset('images/home/pick6.jpg') }}" alt="Product 6" class="w-full h-auto mb-2 md:mb-4"></a>
            <div class="flex items-center justify-between mb-2 w-full">
                <a href="https://printo.ae/products/wallpapers/canvas-frames">
                    <p class="box-name">Canvas Prints</p>
                </a>
                <div class="whatsapp-button">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                   
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

<div class="text-2xl md:text-4xl mb-4 pt-10 md:pt-0 py-4 ml-7 md:ml-12">Hot Items</div>


<section class="flex flex-col md:flex-row p-7 md:p-12">
    <div class="w-full md:w-1/2 h-screen/2 flex flex-col items-start justify-start relative md:pr-4">
        <a href="https://printo.ae/comingsoon"><img src="{{ asset('images/home/hot1.jpg') }}" alt="Image 1"
                class="w-full object-cover"></a>
    </div>
    <div class="w-full md:w-1/2 h-screen/2 py-6 md:py-0 flex flex-col md:pl-12">
        <!-- Desktop version layout -->
        <a href="https://printo.ae/comingsoon"><img src="{{ asset('images/home/hot2.jpg') }}" alt="Image 2"
                class="w-full object-cover md:mb-2 md:pb-4 hidden md:block"></a>
        <a href="https://printo.ae/comingsoon"><img src="{{ asset('images/home/hot3.jpg') }}" alt="Image 3"
                class="w-full object-cover md:pt-5 md:pt-4 hidden md:block"></a>

        <!-- Mobile version layout -->
        <div class="md:hidden w-full flex">
            <a href="https://printo.ae/comingsoon"><img src="{{ asset('images/home/hot2.jpg') }}" alt="Image 2"
                    class="w-1/2 pr-3 object-cover" style=" width:100%; height: 150px;"></a>
            <a href="https://printo.ae/comingsoon"><img src="{{ asset('images/home/hot3.jpg') }}" alt="Image 3"
                    class="w-1/2 pl-3 object-cover" style=" width:100%; height: 150px;"></a>
        </div>
    </div>
</section>


<section class="customerreviews">

    <section class="reviews-container">
        <div class="reviews-title text-2xl md:text-4xl mb-4 ml-7 md:ml-12 py-8 mb-12">Hear From Our Customers
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
                        <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services"
                            class="inline-block bg-white text-black md:px-10 lg:px-24 py-2 md:py-3 rounded-full flex items-center text-1-3rem letstalk">
                            Get in Touch
                            <span class="ml-2 text-black">
                                <i class="fab fa-whatsapp"></i>
                            </span>
                        </a>
                    </div>
                    <div class="md:hidden py-0 md:py-4 mx-auto" style="width: fit-content;">
                        <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services"
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







    <section class="flex flex-col md:flex-row p-6 md:p-16 formsection">
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
                <input type="text" name="name" class="w-full px-4 py-2 mb-4 border bg-gray-200" placeholder="Full Name">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">PHONE NUMBER</label>
                <input id="phoneInput" name="phone" type="tel" class="w-full px-10 py-2 mb-4 border pl-10 bg-gray-200"
                    style="width: 100% !important;" placeholder="Your Phone Number">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">EMAIL ADDRESS</label>
                <input type="email" name="email" class="w-full px-4 py-2 mb-4 border bg-gray-200" placeholder="Email">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">MESSAGE</label>
                <textarea class="w-full px-4 py-2 mb-4 border bg-gray-200" name="message" rows="4"
                    placeholder="Message"></textarea>

                <button class="bg-black text-white px-4 py-2 rounded-full">Send Message</button>
            </form>
        </div>
    </section>


    <section class="p-5 md:p-16 newitems">
        <h2 class="text-2xl md:text-4xl px-2 mb-6 text-left py-6">New Items</h2>
        <div class="grid grid-cols-1 grid-cols-2 md:grid-cols-4 gap-0 md:gap-6">
            <div class="p-2 flex flex-col md:items-center">
                <a href="https://printo.ae/comingsoon"><img src="{{ asset('images/home/newitem1.jpg') }}" alt="Image 1"
                        class="w-full object-cover mb-2"></a>
                <a href="https://printo.ae/comingsoon">
                    <p class="md:text-center text-xs md:text-lg text-black pt-2 md:pt-6">Tshirts</p>
                    <p class="newitemsbox-price text-xs md:text-lg text-dark-gray">Contact for Details</p>

                    <div class="whatsapp-button newitemswhatsapp ">
                    <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                        
                    </div>
            </div>
            <div class="p-2 flex flex-col md:items-center">
                <a href="https://printo.ae/comingsoon"> <img src="{{ asset('images/home/newitem2.jpg') }}" alt="Image 2"
                        class="w-full object-cover mb-2"></a>
                <a href="https://printo.ae/comingsoon">
                    <p class="md:text-center text-xs md:text-lg text-black pt-2 md:pt-6">Cups & Mugs
                    </p>
                </a>
                <p class="newitemsbox-price text-xs md:text-lg text-dark-gray">Contact for Details</p>

                <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services"
                        class="whatsapp-text whatsapptext"> <div class="whatsapp-button newitemswhatsapp">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                </div>
            </div>
            <div class="p-2 flex flex-col md:items-center">
                <a href="https://printo.ae/comingsoon"> <img src="{{ asset('images/home/newitem3.jpg') }}" alt="Image 3"
                        class="w-full object-cover mb-2"></a>
                <a href="https://printo.ae/comingsoon">
                    <p class="md:text-center text-xs md:text-lg text-black pt-2 md:pt-6">Mousepads</p>
                </a>
                <p class="newitemsbox-price text-xs md:text-lg text-dark-gray">Contact for Details</p>

                <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services"
                        class="whatsapp-text whatsapptext"> <div class="whatsapp-button newitemswhatsapp">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                    
                </div>
                </a>
            </div>
            <div class="p-2 flex flex-col md:items-center">
                <a href="https://printo.ae/comingsoon"> <img src="{{ asset('images/home/newitem4.jpg') }}" alt="Image 4"
                        class="w-full object-cover mb-2"></a>
                <a href="https://printo.ae/comingsoon">
                    <p class="md:text-center text-xs md:text-lg text-black pt-2 md:pt-6">Powerbanks
                    </p>
                </a>
                <p class="newitemsbox-price text-xs md:text-lg text-dark-gray">Contact for Details</p>

                <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services"
                        class="whatsapp-text whatsapptext"> <div class="whatsapp-button newitemswhatsapp">
                  <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam%20intreasted%20in%20printo%20Services" class="whatsapp-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 48 48" id="whatsapp"><path fill="#67C15E" fill-rule="evenodd" d="M23.993 0C10.763 0 0 10.765 0 24a23.824 23.824 0 0 0 4.57 14.067l-2.99 8.917 9.224-2.948A23.81 23.81 0 0 0 24.007 48C37.237 48 48 37.234 48 24S37.238 0 24.007 0h-.014zm-6.7 12.19c-.466-1.114-.818-1.156-1.523-1.185a13.55 13.55 0 0 0-.804-.027c-.918 0-1.877.268-2.455.86-.705.72-2.454 2.398-2.454 5.841s2.51 6.773 2.849 7.239c.353.465 4.895 7.632 11.947 10.553 5.515 2.286 7.152 2.074 8.407 1.806 1.834-.395 4.133-1.75 4.711-3.386.579-1.637.579-3.034.41-3.33-.17-.296-.636-.465-1.34-.818-.706-.353-4.134-2.046-4.783-2.272-.634-.24-1.24-.155-1.72.522-.677.946-1.34 1.905-1.876 2.483-.423.452-1.115.509-1.693.268-.776-.324-2.948-1.086-5.628-3.47-2.074-1.849-3.484-4.148-3.893-4.84-.41-.705-.042-1.114.282-1.495.353-.438.691-.748 1.044-1.157.352-.41.55-.621.776-1.1.24-.466.07-.946-.1-1.3-.168-.352-1.579-3.795-2.157-5.191z"></path></svg>

                    </a>
                </div>
            </div>
            <!-- Add more grid items as needed -->
        </div>
    </section>





</section>

@endsection