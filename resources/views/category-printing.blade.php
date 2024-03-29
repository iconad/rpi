@extends('layouts.printo')

@section('content')


<section class="toppicks md:p-5 p-4 md:px-14">
    <!-- Text -->
    <div class="bg-white p-0 md:p-4 mt-4">
        <h1 class="text-4xl md:text-5xl mb-1 ">Printing.</h1>
        <p class="text-4xl md:text-5xl mb-6">Precision in Every Impression.</p>
    </div>

    <!-- Images -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Image 1 -->
        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/printing/1.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Business Cards</h2>
            </a>
        </div>


        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/printing/2.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Envelopes</h2>
            </a>
        </div>

        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/printing/3.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6"> Stationery</h2>
            </a>
        </div>
        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/printing/4.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Notebooks & Notepads</h2>
            </a>
        </div>
        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/printing/5.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Paper Marketing</h2>
            </a>
        </div>
        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/printing/6.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Calendars</h2>
            </a>
        </div>
        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/printing/7.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Postcards & Greeting Cards</h2>
            </a>
        </div>
        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/printing/8.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Company Profiles</h2>
            </a>
        </div>
        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/printing/9.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6"> Dining Essentials</h2>
            </a>
        </div>
        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/printing/10.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Fans</h2>
            </a>
        </div>



    </div>
</section>


@endsection