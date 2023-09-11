@extends('layouts.printo')

@section('content')



<section class="whatsappbanner relative px-0 md:px-0">
    <div class="h-auto text-white relative">
        <img src="{{ asset('images/commingsoon.png') }}" alt="Comming Soon!"
            class="mobilewhatsappimage w-full mb-8 md:max-w-none md:mb-0">
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <div class="text-center">
                <p
                    class="text-xs pt-6 md:pt-0 md:text-4xl lg:text-8xl font-bold leading-tight mb-3 md:mb-4 commingsoontitle">
                    Coming Soon!<br>
                    <span class="whitespace-nowrap commingsoondesc">Stay tuned. Something extraordinary is on its
                        way.</span>
                </p>

            </div>
        </div>
    </div>
</section>






</section>

@endsection