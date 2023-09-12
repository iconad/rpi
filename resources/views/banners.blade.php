@extends('layouts.printo')

@section('content')


<section class="toppicks md:p-5 p-7 md:px-14">
    <!-- Text -->
    <div class="bg-white p-4 mt-4">
        <h1 class="text-2xl md:text-5xl mb-6">Banners & Displays.</h1>
        <p class="text-2xl md:text-5xl mb-6">Make a Statement. Anywhere.</p>
    </div>

    <!-- Images -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Image 1 -->
        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/banners/1.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Roll Ups</h2>
            </a>
        </div>


        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/banners/2.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">stickers</h2>
            </a>
        </div>

        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/banners/3.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">posters</h2>
            </a>
        </div>

        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/banners/4.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Large Banners</h2>
            </a>
        </div>

        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/banners/5.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Canvas</h2>
            </a>
        </div>

        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/banners/6.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Foam board Panels</h2>
            </a>
        </div>




    </div>
</section>


@endsection