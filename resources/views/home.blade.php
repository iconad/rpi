@extends('layouts.app')

@section('headlinks')
@include('meta::manager')

@endsection
@section('content')
<section id="CoverAdSection" class="mt-6 banner-section">
    <home-cover></home-cover>
</section>

<section id="TopPrintProducts" class="my-12 top-print-products-section">
    <top-products menu="10" columns="3" rows="2" title="Top Print Products"></top-products>
</section>

<section class="ad-space my-12">
    <div class="w-full md:w-2/3 mx-auto">
        {{-- <x-ads.fullwidth-small /> --}}
    </div>
</section>

<section class="my-12">
        <top-products menu="12" columns="3" rows="1" title="Top Banners & Displays"></top-products>
</section>

<section class="ad-space my-12">
    <div class="w-full md:w-2/3 mx-auto">
        {{-- <x-ads.fullwidth-small /> --}}
    </div>
</section>







<div class="bg-white">
    <nav class="border-b">
        <div class="container px-6 py-2 mx-auto md:flex md:justify-between md:items-center">

        </div>
    </nav>
    <div class="container px-6 py-10 mx-auto md:py-16">
        <div class="flex flex-col space-y-6 md:flex-row md:items-center md:space-x-6">
            <div class="w-full md:w-1/2">
                <div class="max-w-lg">
                    <h1 class="text-2xl font-medium tracking-wide text-gray-800 md:text-4xl">
                    Why us?
                    </h1>
                    <p class="mt-5 leading-7 text-gray-600">
                    Rainbow Printing Press is one of the most trusted and reputed name in the Printing Industry in the UAE.

We provide state of the art service for printing of Stationery, Books, Magazines, Catalogues, Directories etc.
 <br />
 With a team of dedicated and experienced printing experts,
 Rainbow Printing Press is always committed to provide top quality service  <br /> for all your printing need.
                    </p>
                    </p>
                    <div class="grid gap-6 mt-8 sm:grid-cols-2">
                        <div class="flex items-center space-x-6 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Offset Printing</span>
                        </div>
                        <div class="flex items-center space-x-6 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Graphic Design</span>
                        </div>
                        <div class="flex items-center space-x-6 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Large Format Printing</span>
                        </div>
                        <div class="flex items-center space-x-6 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Customized Boxes</span>
                        </div>
                        <div class="flex items-center space-x-6 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Gift Items</span>
                        </div>
                        <div class="flex items-center space-x-6 text-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Roll Up Offer</span>

                        </div>

                    </div>

                </div>
            </div>
            <div class=" transform scale-40  ">
                 <img src="{{ asset('assets/images/printingpress.jpg') }}"
                    alt="printing" class="w-full h-full max-w-2xl rounded" />
            </div>
        </div>
    </div>


    </div>
    <div class="container px-6 py-10 mx-auto md:py-16">



</div>









<section class="my-12" id="whyChoose">
    <div class="text-center hidden">
        <h2 class="text-3xl font-semibold text-gray-900 mb-5"> RPI- ONE OF THE LEADING PRINTING PRESSES IN THE UAE</h2>
        <p>Rainbow Printing Press is one of the most trusted and reputed name in the Printing Industry in the UAE. </p>
             We provide state of the art service for printing of Stationery, Books, Magazines, Catalogues, Directories etc.<br>
              With a team of dedicated and experienced printing experts, Rainbow Printing Press is always committed to provide top quality service for all your printing need. <br>

    </div>
    <div class="our-story mt-24 hidden">
        <div class="rounded-lg bg-theme-gray p-5">
            <h3 class="capitalize text-sec font-semibold text-xl mb-3">our story</h3>
            <p>RPI has provided quality printing services to the United Arab Emirates since 1989! We specialize in commercial offset printing and digital printing services
                 to cover all your needs.
                 From brochures to banners, we are your one-stop print shop..</p>
        </div>
    </div>
    {{-- our story --}}


    <div class="why-we-are-defferent mt-8">
        <div class="p-5">

            <home-faq />

        </div>
    </div>

    {{-- why we are different --}}




    <div class="why-we-are-defferent mt-8">
        <div class="p-5">

            <customer-review/>

        </div>
    </div>


    <div class="our-strength mt-24 ">
    <div class="px-4 py-3 bg-primary-400 text-lg text-white font-semibold capitalize text-sec font-semibold text-xl mb-3">Our Process </div>

        <div class="grid grid-cols-1 sm:grid-cols-1 gap-10">


    <img src="{{ asset('assets/images/press.png') }}" alt="image" >



        </div>
    </div>
    {{-- our strength --}}
</section>


{{-- <section class="my-24" id="googleCustomReviews">
    <div class="w-4/5 mx-auto">
        <x-google-reviews />
    </div>
</section> --}}
{{-- google customer reviews --}}


{{-- <section class="my-24" id="ourClients">
    <div class="w-4/5 text-center  mx-auto">
        <div class="text-3xl font-semibold text-gray-900 mb-3">Our Clients</div>
        <p>We are their esteemed printing partner in UAE based on performed services.</p>
        <div>
            <img src="https://www.printarabia.ae/img/misc/home/client-01.webp" alt="cleint logo">
        </div>
    </div>
</section>
 --}}

<section class="hidden my-12 md:my-24" id="videoGuide">
    <div class="border border-gray-400 rounded p-12">
        <div class="w-4/5 mx-auto text-center">
            <div class="text-3xl font-semibold text-gray-900 mb-3">Video Guide</div>
            <p>Series of brief videos on how we perform finishings, range of paper offering, and optional <br />
                printing methods. Stay in tune with all the updates by subscribing to our YouTube channel. </p>
        </div>
        <div class="grid gid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mt-10">
            <div class="rounded overflow-hidden hover:shadow-lg transition ease-linear duration-300 hover:border border-gray-200">
                <img class="mb-3" src="https://www.printarabia.ae/storage/images/youtube/FAYE2uNNZ5w.webp" alt="thumbnail">
                <a href="#" class="block font-medium leading-4 text-sm px-2">Print in Sharjah with Printarabia FAQ Which foil is best fo...</a>
                <div class="text-gray-600 text-xs font-medium flex items-center tracking-wider p-2">
                    <span><svg class="fill-current w-4 h-4 block mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M.2 10a11 11 0 0119.6 0A11 11 0 01.2 10zm9.8 4a4 4 0 100-8 4 4 0 000 8zm0-2a2 2 0 110-4 2 2 0 010 4z"/></svg></span>
                    236 views
                </div>
            </div>
            {{-- item --}}
            <div class="rounded overflow-hidden hover:shadow-lg transition ease-linear duration-300 hover:border border-gray-200">
                <img class="mb-3" src="https://www.printarabia.ae/storage/images/youtube/wpJqEj8KqfE.webp" alt="thumbnail">
                <a href="#" class="block font-medium leading-4 text-sm px-2">Print in Sharjah with Printarabia FAQ Which foil is best fo...</a>
                <div class="text-gray-600 text-xs font-medium flex items-center tracking-wider p-2">
                    <span><svg class="fill-current w-4 h-4 block mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M.2 10a11 11 0 0119.6 0A11 11 0 01.2 10zm9.8 4a4 4 0 100-8 4 4 0 000 8zm0-2a2 2 0 110-4 2 2 0 010 4z"/></svg></span>
                    236 views
                </div>
            </div>
            {{-- item --}}
            <div class="rounded overflow-hidden hover:shadow-lg transition ease-linear duration-300 hover:border border-gray-200">
                <img class="mb-3" src="https://www.printarabia.ae/storage/images/youtube/kyk-ier5VYs.webp" alt="thumbnail">
                <a href="#" class="block font-medium leading-4 text-sm px-2">Print in Sharjah with Printarabia FAQ Which foil is best fo...</a>
                <div class="text-gray-600 text-xs font-medium flex items-center tracking-wider p-2">
                    <span><svg class="fill-current w-4 h-4 block mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M.2 10a11 11 0 0119.6 0A11 11 0 01.2 10zm9.8 4a4 4 0 100-8 4 4 0 000 8zm0-2a2 2 0 110-4 2 2 0 010 4z"/></svg></span>
                    236 views
                </div>
            </div>
            {{-- item --}}
            <div class="rounded overflow-hidden hover:shadow-lg transition ease-linear duration-300 hover:border border-gray-200">
                <img class="mb-3" src="https://www.printarabia.ae/storage/images/youtube/upN457kNgCc.webp" alt="thumbnail">
                <a href="#" class="block font-medium leading-4 text-sm px-2">Print in Sharjah with Printarabia FAQ Which foil is best fo...</a>
                <div class="text-gray-600 text-xs font-medium flex items-center tracking-wider p-2">
                    <span><svg class="fill-current w-4 h-4 block mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M.2 10a11 11 0 0119.6 0A11 11 0 01.2 10zm9.8 4a4 4 0 100-8 4 4 0 000 8zm0-2a2 2 0 110-4 2 2 0 010 4z"/></svg></span>
                    236 views
                </div>
            </div>
            {{-- item --}}
            <div class="rounded overflow-hidden hover:shadow-lg transition ease-linear duration-300 hover:border border-gray-200">
                <img class="mb-3" src="https://www.printarabia.ae/storage/images/youtube/PEnyISbwLx0.webp" alt="thumbnail">
                <a href="#" class="block font-medium leading-4 text-sm px-2">Print in Sharjah with Printarabia FAQ Which foil is best fo...</a>
                <div class="text-gray-600 text-xs font-medium flex items-center tracking-wider p-2">
                    <span><svg class="fill-current w-4 h-4 block mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M.2 10a11 11 0 0119.6 0A11 11 0 01.2 10zm9.8 4a4 4 0 100-8 4 4 0 000 8zm0-2a2 2 0 110-4 2 2 0 010 4z"/></svg></span>
                    236 views
                </div>
            </div>
            {{-- item --}}
            <div class="rounded overflow-hidden hover:shadow-lg transition ease-linear duration-300 hover:border border-gray-200">
                <img class="mb-3" src="https://www.printarabia.ae/storage/images/youtube/UWf30fIxx04.webp" alt="thumbnail">
                <a href="#" class="block font-medium leading-4 text-sm px-2">Print in Sharjah with Printarabia FAQ Which foil is best fo...</a>
                <div class="text-gray-600 text-xs font-medium flex items-center tracking-wider p-2">
                    <span><svg class="fill-current w-4 h-4 block mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M.2 10a11 11 0 0119.6 0A11 11 0 01.2 10zm9.8 4a4 4 0 100-8 4 4 0 000 8zm0-2a2 2 0 110-4 2 2 0 010 4z"/></svg></span>
                    236 views
                </div>
            </div>
            {{-- item --}}
        </div>
    </div>
</section>
{{-- video guide --}}























{{-- <section class="mb-12 md:my-24" id="WeAreHereHelp">
    <div class="w-4/5 text-center  mx-auto">
        <div class="text-3xl font-semibold text-gray-900 mb-3">We’re here to help!</div>
        <p>We’re a one-stop print shop with a strong appetite for offset, digital, and large format. <br />
            No project is too big or small. From design to print, we’re here to help!</p>
        </div>

        <h3 class="capitalize text-sec font-semibold text-xl mb-3 mt-12">Contact us with</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10 mt-5">
            <div class="flex items-start">
                <div class="w-auto p-5 pt-2">
                    <img class="w-24 mx-auto block" src="https://www.printarabia.ae/img/static/contact-us/contact-us/email.png" alt="icon">
                </div>
                <div class="w-full pl-5">
                    <div class="text-xl font-semibold text-gray-900">Email</div>
                    <p class="text-sm">Have a simple query or just need general information? We will help you out as quickly as possible (max within 4 working hours).</p>
                    <a class="text-primary text-sm mt-2 block" href="#">
                        <span class="border-b border-transparent hover:border-gray-400"> Ideal for technical or data queries</span>
                    </a>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-auto p-5 pt-2">
                    <img class="w-24 mx-auto block" src="https://www.printarabia.ae/img/static/contact-us/contact-us/call.png" alt="icon">
                </div>
                <div class="w-full pl-5">
                    <div class="text-xl font-semibold text-gray-900">Email</div>
                    <p class="text-sm">Didn’t find the answer to your question on our site? Just call us: +971 4 551 6095. Support line is on 9am to 6pm, Sun to Thu.</p>
                    <a class="text-primary text-sm mt-2 block" href="#">
                        <span class="border-b border-transparent hover:border-gray-400"> Ideal for urgent queries </span>
                    </a>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-auto p-5 pt-2">
                    <img class="w-24 mx-auto block" src="https://www.printarabia.ae/img/static/contact-us/contact-us/estimator.png" alt="icon">
                </div>
                <div class="w-full pl-5">
                    <div class="text-xl font-semibold text-gray-900">Instant Online Estimator</div>
                    <p class="text-sm">Need a quote really fast? Like right now? Head on over to our unique Instant Online Estimator. Accessible 24/7, 365 days</p>
                    <a class="text-primary text-sm mt-2 block" href="#">
                        <span class="border-b border-transparent hover:border-gray-400"> Ideal for instant estimation </span>
                    </a>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-auto p-5 pt-2">
                    <img class="w-24 mx-auto block" src="https://www.printarabia.ae/img/static/contact-us/contact-us/live-chat.png" alt="icon">
                </div>
                <div class="w-full pl-5">
                    <div class="text-xl font-semibold text-gray-900">Live Chat</div>
                    <p class="text-sm">Have more queries? Need help navigating our site? Chat live with our Support Team. We are online 9am to 6pm, Sun to Thu.</p>
                    <a class="text-primary text-sm mt-2 block" href="#">
                        <span class="border-b border-transparent hover:border-gray-400"> Ideal for quick questions & order support</span>
                    </a>
                </div>
            </div>
        </div>

</section> --}}
{{-- we are here to help --}}


<section class="my-12 md:my-24" id="contactSection">

  <!--  <div>
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">
            <div>
                <div class="px-3 py-2 bg-gray-600 text-lg text-white font-semibold">RPI CUSTOMER LOUNGE</div>
                <div class="py-5">
                    <span class="block"> Rainbow Printing Industries LLC </span>
                    <span class="block"> P.O. Box 25483, Dubai, UAE </span>
                    <table class="mt-5 w-full">
                        <tr>
                            <td> <span class="font-semibold">Call</span> </td>
                            <td>+971 6 534 1113</td>
                        </tr>
                        <tr>
                            <td> <span class="font-semibold">Email</span> </td>
                            <td>info@rpi.ae</td>
                        </tr>
                        <tr>
                            <td> <span class="font-semibold">Working Hours</span> </td>
                            <td>9am to 6pm, Sat to Thu</td>
                        </tr>
                        <tr>
                            <td> <span class="font-semibold">Closed</span> </td>
                            <td>Fri & National Holidays</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div>
                <img class="w-full" src="https://i.ibb.co/qdVZBJ5/Whats-App-Image-2021-07-29-at-3-50-01-PM.jpg" alt="office image">
            </div>
        </div>
        <div class="border p-5 mt-5">
            <iframe width="100%" height="300" rel="nofollow" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d412.4546691427452!2d55.42353688114295!3d25.294179094589303!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x356b36e009b8f7dc!2sRainbow%20Printing%20Industries%20LLC!5e0!3m2!1sen!2sae!4v1627538752496!5m2!1sen!2sae" allowfullscreen=""></iframe>
        </div>
    </div> -->









    {{-- office block --}}

    <div class="mt-12">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">
            <div>
                <div class="px-4 py-3  bg-primary-400 text-lg text-white font-semibold">Contact US </div>
                <div class="border p-5 mt-5">
            <iframe width="100%" height="320" rel="nofollow" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d412.4546691427452!2d55.42353688114295!3d25.294179094589303!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x356b36e009b8f7dc!2sRainbow%20Printing%20Industries%20LLC!5e0!3m2!1sen!2sae!4v1627538752496!5m2!1sen!2sae" allowfullscreen=""></iframe>
        </div>

            </div>
            <div>
               <div class="py-5">
                    <span class="block"> Rainbow Printing Industries LLC </span>
                    <span class="block"> P.O. Box 25483, Dubai, UAE </span>
                    <table class="mt-5 w-full">
                        <tr>
                            <td> <span class="font-semibold">Call</span> </td>
                            <td>+971 6 534 1113</td>
                        </tr>
                        <tr>
                            <td> <span class="font-semibold">Email</span> </td>
                            <td>info@rpi.ae</td>
                        </tr>
                        <tr>
                            <td> <span class="font-semibold">Working Hours</span> </td>
                            <td>9am to 6pm, Sat to Thu</td>
                        </tr>
                        <tr>
                            <td> <span class="font-semibold">Closed</span> </td>
                            <td>Fri & National Holidays</td>
                        </tr>
                    </table>
                </div>
                <div>
                <img class="w-full" src="https://rpiuae.com/assets/images/slide1.jpg" alt="office image">
            </div>
            </div>
        </div>

    </div>
    {{-- office block --}}

    <x-our-clients/>

</section>
{{-- contact section --}}

@endsection

