@extends('layouts.printo')

@section('content')


<section class="toppicks md:p-5 p-7 md:px-14">
    <!-- Text -->
    <div class="bg-white p-4 mt-4">
        <h1 class="text-2xl md:text-5xl mb-6">Printing.</h1>
        <p class="text-2xl md:text-5xl mb-6">Precision in Every Impression.</p>
    </div>

    <!-- Images -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Image 1 -->
        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/printing/1.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Business cards</h2>
            </a>
        </div>


        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/printing/2.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Envelopes</h2>
            </a>
        </div>

        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/printing/3.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6"> Stationery</h2>
            </a>
        </div>
        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/printing/4.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Notebooks & Notepads</h2>
            </a>
        </div>
        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/printing/5.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Paper Marketing</h2>
            </a>
        </div>
        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/printing/6.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Calendars</h2>
            </a>
        </div>
        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/printing/7.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Postcards & Greeting Cards</h2>
            </a>
        </div>
        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/printing/8.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Company Profiles</h2>
            </a>
        </div>
        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/printing/9.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6"> Dining essentials</h2>
            </a>
        </div>
        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/printing/10.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Fans</h2>
            </a>
        </div>



    </div>
</section>


@endsection