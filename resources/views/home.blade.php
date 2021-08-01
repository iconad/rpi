@extends('layouts.app')

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

<section class="my-12">
    <top-products menu="13" columns="3" rows="1" title="Top Personalized Gifts"></top-products>
</section>

<section class="ad-space my-12">
    <div class="w-full md:w-2/3 mx-auto">
        {{-- <x-ads.fullwidth-small /> --}}
    </div>
</section>

<section class="my-12">
    <top-products menu="14" columns="4" rows="1" title="Top T-shirt Printing"></top-products>
</section>


{{-- <section class="my-24">
    <div class="grid grid-cols-3 gap-12 w-full md:w-4/5 mx-auto">
        <div class="text-center">
            <img src="{{ asset('assets/images/free-delivery.png') }}" class="mb-5 w-24   mx-auto" alt="icon">
            <div class="font-semibold text-lg">Free Delivery in Dubai</div>
            <p>With order above 100 AED</p>
        </div>
        <div class="text-center">
            <img src="{{ asset('assets/images/pro-design-service.png') }}" class="mb-5 w-24  mx-auto" alt="icon">
            <div class="font-semibold text-lg">Pro Design Service</div>
            <p>Work with our expert designers</p>
        </div>
        <div class="text-center">
            <img src="{{ asset('assets/images/free-template.png') }}" class="mb-5 w-24   mx-auto" alt="icon">
            <div class="font-semibold text-lg">Free Layout Templates</div>
            <p>Ready to download</p>
        </div>
    </div>
</section>
 --}}

<section class="my-12" id="whyChoose">
    <div class="text-center">
        <h2 class="text-3xl font-semibold text-gray-900 mb-5">Why choose Rainbow Printing?</h2>
        <p>We are the leading online printing company in the UAE. <br>
            Our automated estimate system is the first of its kind in the UAE, <br>
            and we publish all our prices online (our best prices!). We provide high quality Printing, <br>
            Design and Delivery services across the UAE, with quick turnarounds and at attractive prices.</p>
    </div>
    <div class="our-story mt-24">
        <div class="rounded-lg bg-theme-gray p-5">
            <h3 class="capitalize text-sec font-semibold text-xl mb-3">our story</h3>
            <p>In 2014 we saw a gap in the UAE market for printing services that offered consistent quality at quick turnarounds. Rainbow Printing was formed to bridge that gap, with the goal of providing high quality online printing services with quick turnarounds and competetive prices. While our history may be short in the UAE, we make up for it with all our years experience in Print-production, Prepress and Graphic Design. As pioneers, we bring a new era of online print ordering. We are equally well equipped with our state-of-the-art printing and production facility. We promise ‘Made in Japan’ quality print services and are the first ever Japanese printing company established in the UAE and serving in the Middle East.</p>
        </div>
    </div>
    {{-- our story --}}


    <div class="why-we-are-defferent mt-8">
        <div class="p-5">
            <h3 class="capitalize text-sec font-semibold text-xl mb-3">Why We Are Different</h3>

            <x-we-are-different-table />

        </div>
    </div>
    {{-- why we are different --}}


    <div class="our-strength mt-24">
        <h3 class="capitalize text-sec font-semibold text-xl mb-3">Our Strength</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-10">
            <div>
                <img src="https://www.printarabia.ae/img/static/about-us/why-print-arabia/dubai-based.png" alt="image">
                <h3 class="capitalize text-gray-900 font-semibold text-lg mt-3 mb-1">We are Sharjah based</h3>
                <p class="text-sm">Our office are easy to reach at both locations in Sharjah — JLT. And our full-scale print production facility is at Jebel Ali Industrial Area.</p>
            </div>
            <div>
                <img src="https://www.printarabia.ae/img/static/about-us/why-print-arabia/we-speak-your-language.png" alt="image">
                <h3 class="capitalize text-gray-900 font-semibold text-lg mt-3 mb-1">We speak your language</h3>
                <p class="text-sm">We communicate in more than 11 international languages: English, Arabic, Hindi, Japanese, Malayalam, Tagalog, Spanish, Hungarian, German, Gujarati and Amharic.</p>
            </div>
            <div>
                <img src="https://www.printarabia.ae/img/static/about-us/why-print-arabia/satisfaction.png" alt="image">
                <h3 class="capitalize text-gray-900 font-semibold text-lg mt-3 mb-1">We provide 100% satisfaction</h3>
                <p class="text-sm">Customer satisfaction is a prime concern of our business. Thus, our services are our best sales point, and we are delivering same to our clients.</p>
            </div>
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
    <h3 class="capitalize text-sec font-semibold text-xl mb-3 mt-6 md:mt-12">Contact information</h3>
    <div>
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
    </div>
    {{-- office block --}}

    <div class="mt-12">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">
            <div>
                <div class="px-3 py-2 bg-gray-600 text-lg text-white font-semibold">FACTORY</div>
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
                <img class="w-full" src="https://rpiuae.com/assets/images/slide1.jpg" alt="office image">
            </div>
        </div>
        <div class="border p-5 mt-5">
            <iframe width="100%" height="300" rel="nofollow" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d412.4546691427452!2d55.42353688114295!3d25.294179094589303!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x356b36e009b8f7dc!2sRainbow%20Printing%20Industries%20LLC!5e0!3m2!1sen!2sae!4v1627538752496!5m2!1sen!2sae" allowfullscreen=""></iframe>
        </div>
    </div>
    {{-- office block --}}


</section>
{{-- contact section --}}

@endsection
