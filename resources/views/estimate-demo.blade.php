@extends('layouts.printo')

@section('content')

<section class="toppicks md:p-5 p-4 md:px-14">
    <!-- Text -->
    <div class="bg-white p-0 md:p-4 mt-4">
        <h1 class="text-4xl md:text-5xl mb-1">Estimate</h1>
        <p class="text-4xl md:text-5xl mb-6">We’re Here to Help.</p>
    </div>
    <!-- Form -->
    <form class="lg:flex">
        <!-- Left Form Fields (Desktop) -->
        <div class="lg:w-1/2 bg-white md:p-4 p-0 md:mr-8 mr-0">
            <!-- COMPANY -->
            <div class="mb-2">
                <label for="company" class="block mb-2 pt-1 text-1xl md:text-lg">COMPANY</label>
                <input type="text" id="company" name="company" class="w-full px-4 py-2 border h-14"
                    placeholder="Type here">
            </div>

            <!-- NAME (First Name and Last Name in a single row) -->
            <div class="mb-2">
                <label for="first_name" class="block mb-2 pt-1 text-1xl md:text-lg">NAME</label>
                <div class="flex">
                    <input type="text" id="first_name" name="first_name" class="w-1/2 px-3 px-4 py-2 border h-14 mr-2"
                        placeholder="First Name">
                    <input type="text" id="last_name" name="last_name" class="w-1/2 px-3 px-4 py-2 border h-14 ml-2"
                        placeholder="Last Name">
                </div>
            </div>

            <!-- EMAIL ADDRESS -->
            <div class="mb-2">
                <label class="block mb-2 pt-1 text-1xl md:text-lg">EMAIL ADDRESS</label>
                <input type="email" name="email" class="w-full px-4 py-2 border h-14" placeholder="Email">
            </div>

            <!-- PHONE NUMBER (UAE) -->
            <div class="mb-2">
                <label class="block mb-2 pt-1 text-1xl md:text-lg">PHONE NUMBER</label>
                <input id="phoneInput" name="phone" type="tel" class="w-full px-10 py-2 border h-14 pl-10"
                    style="width: 100% !important;" placeholder="Your Phone Number">
            </div>
        </div>

        <!-- Right Form Fields (Desktop) -->
        <div class="lg:w-1/2 bg-white md:p-4 p-0">
            <!-- PRODUCT -->
            <div class="mb-2">
                <label for="product" class="block mb-2 pt-1 text-1xl md:text-lg">PRODUCT</label>
                <input type="text" id="product" name="product" class="w-full px-4 py-2 border h-14 bg-gray-200"
                    placeholder="Type here">
            </div>

            <!-- DETAILS (Quantity and Size in a single row) -->
            <div class="mb-2">
                <label for="first_name" class="block mb-2 pt-1 text-1xl md:text-lg">DETAILS</label>
                <div class="flex">
                    <input type="text" id="first_name" name="first_name"
                        class="w-1/2 px-4 py-2 border h-14 mr-2 bg-gray-200" placeholder="Quantity">
                    <input type="text" id="last_name" name="last_name"
                        class="w-1/2 px-4 py-2 border h-14 ml-2 bg-gray-200" placeholder="Size">
                </div>
            </div>

            <!-- MESSAGE -->
            <div class="mb-2">
                <label for="message2" class="block mb-2 pt-1 text-1xl md:text-lg">MESSAGE</label>
                <textarea id="message2" name="message2" rows="5" class="w-full px-4 py-2 border bg-gray-200"
                    placeholder="Type here"></textarea>
            </div>

            <button class="bg-black text-white text-lg px-4 py-2 rounded-full">Send Message</button>
        </div>
    </form>

</section>

@endsection