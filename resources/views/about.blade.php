@extends('layouts.printo')

@section('content')
<section class="toppicks md:p-5 p-4 md:px-14">
    <!-- Text -->
    <div class="bg-white p-0 md:p-4 mt-4">
        <h1 class="text-4xl md:text-5xl mb-1">About Us.</h1>
        <p class="text-4xl md:text-5xl mb-6">Crafting Excellence. Printing Dreams.</p>
    </div>
    <!-- First Section: Text on Left, Image on Right -->
    <div class="flex  flex-row md:flex-row items-center justify-between mb-8">
        <div class="w-1/2 md:w-1/2 order-1 p-0 md:p-4 pr-4 md:pr-28  h-full">
            <!-- Text goes here -->

            <p class="text-xs md:text-lg h-full pb-6">Elevate your printing experience with Printo, a beacon of
                excellence in the
                realm
                of
                printing. Our legacy
                as a distinguished name in the Printing Industry of the UAE speaks volumes, and we stand as a paragon of
                trustworthiness and repute.
            </p>
            <p class="text-xs md:text-lg h-full">
                We orchestrate a symphony of state-of-the-art services, curating masterpieces for stationery, books,
                magazines, catalogues, directories, and beyond. At the heart of Printo is a coterie of devoted and
                seasoned printing virtuosos, ceaselessly driven to furnish nothing short of superlative quality for all
                your printing requisites.
            </p>
        </div>
        <div class="w-1/2 md:w-1/2 order-2 p-0 md:p-4 pl-4 md:pl-28 h-full">
            <!-- Image goes here -->
            <img src="{{ asset('images/about/1.jpg') }}" alt="Image 1" class="w-full h-full object-cover"
                style="height: 325px; width:529px;">
        </div>
    </div>


    <!-- Second Section: Text on Right, Image on Left -->
    <div class="flex  flex-row md:flex-row items-center justify-between mb-8">
        <div class="w-1/2 md:w-1/2 order-2 p-0 md:p-4 pl-4 md:pl-28">
            <!-- Text goes here -->

            <p class="text-xs md:text-lg h-full pb-6">With Printo as your ally, you embark on a journey replete with
                top-tier
                craftsmanship and ingenuity. Our
                commitment to pushing the boundaries of quality is unwavering, a testament to our relentless pursuit of
                printing perfection.
            </p>
            <p class="text-xs md:text-lg h-full">
                Crafted to captivate, our reimagined printing solutions exude an aura of elegance that enchants the
                senses. Whether it's the finesse of stationery or the allure of magazines, each creation carries the
                Printo touch—a mark of sophistication that sets you apart.
            </p>
        </div>
        <div class="w-1/2 md:w-1/2 order-1 p-0 md:p-4 pr-4 md:pr-28">
            <!-- Image goes here -->
            <img src="{{ asset('images/about/2.jpg') }}" alt="Image 2" class="w-full h-full object-cover"
                style="height: 325px; width:529px;">
        </div>
    </div>

    <!-- Third Section: Text on Left, Image on Right -->
    <div class="flex  flex-row md:flex-row items-center justify-between">
        <div class="w-1/2 md:w-1/2 order-1 p-0 md:p-4 pr-4 md:pr-28">
            <!-- Text goes here -->

            <p class="text-xs md:text-lg h-full pb-6">The essence of Printo lies in transforming the ordinary into the
                extraordinary. We don't just print; we
                refine, polish, and sculpt your ideas into works of art, leaving an indelible imprint on every page,
                every project.
            </p>
            <p class="text-xs md:text-lg h-full pb-6">
                Beyond printing, we breathe life into your aspirations. Printo isn't just a service; it's a canvas where
                dreams manifest into tangible realities. Let us be the architects of your visions, meticulously etching
                each detail with finesse.
            </p>
            <p class="text-xs md:text-lg h-full pb-6">
                Embark on a journey of unbridled creativity and sophistication. With Printo as your beacon, you're not
                just choosing a printing partner, you're embracing a legacy of excellence that transcends the ordinary.
            </p>
            <p class="text-xs md:text-lg h-full pb-6">
                Printo. Elevating Printing to an Art Form.</p>
        </div>
        <div class="w-1/2 md:w-1/2 order-2 p-0 md:p-4 pl-4 md:pl-28">
            <!-- Image goes here -->
            <img src="{{ asset('images/about/3.jpg') }}" alt="Image 3" class="w-full h-full object-cover"
                style="height: 325px; width:529px;">
        </div>
    </div>

</section>

@endsection