@extends('layouts.printo')

@section('content')

<section class="toppicks md:p-5 p-4 md:px-14">
    <!-- Text -->
    <div class="bg-white p-0 md:p-4 mt-4">
        <h1 class="text-4xl md:text-5xl mb-1 md:mb-6">Wallpapers.</h1>
        <p class="text-4xl md:text-5xl mb-6">Walls that Speak Your Style.</p>
    </div>

    <!-- Images -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Image 1 -->
        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/1.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">3D Stickers
                </h2>
            </a>
        </div>

        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/2.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Bedroom



                </h2>
            </a>
        </div>

        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/3.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Living Room


                </h2>
            </a>
        </div>

        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/4.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Dining Room

                </h2>
            </a>
        </div>

        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/5.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Study Room

                </h2>
            </a>
        </div>

        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/6.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Corporate

                </h2>
            </a>
        </div>

        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/7.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Hospitality
                </h2>
            </a>
        </div>

        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/8.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Education</h2>
            </a>
        </div>

        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/9.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Medical
                </h2>
            </a>
        </div>


        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/10.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6">Canvas Frames
                </h2>
            </a>
        </div>

        <div class="bg-white p-0 md:p-4">
            <a href=""><img src="{{ asset('images/wallpapers/11.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="md:text-lg text-lg mb-4 md:mb-0 mt-3 md:mt-6"> Cut-Outs


                </h2>
            </a>
        </div>




    </div>
</section>


@endsection