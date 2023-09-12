@extends('layouts.printo')

@section('content')


<section class="toppicks md:p-5 p-7 md:px-14">
    <!-- Text -->
    <div class="bg-white p-4 mt-4">
        <h1 class="text-2xl md:text-5xl mb-6">Packaging.</h1>
        <p class="text-2xl md:text-5xl mb-6">Wrap Your Brand With Care.</p>
    </div>

    <!-- Images -->
    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <!-- Image 1 -->
        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/Packaging/1.jpg') }}" alt="Image 1" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Boxes</h2>
            </a>
        </div>


        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/Packaging/2.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6">Bags</h2>
            </a>
        </div>

        <div class="bg-white p-4">
            <a href=""><img src="{{ asset('images/Packaging/3.jpg') }}" alt="Image 2" class="w-full h-auto"></a>
            <a href="">
                <h2 class="text-lg mt-6"> Paper Bags

                </h2>
            </a>
        </div>




    </div>
</section>


@endsection