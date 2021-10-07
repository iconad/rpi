@extends('layouts.app')

@section('headlinks')
@include('meta::manager', [
    'title'         => 'Online Printing Services Dubai, Sharjah, UAE | Printo',
    'description'   => 'Printo Press offers quality &amp; affordable services to businesses in Dubai, Sharjah, Abu Dhabi &amp; all across the Gulf. Call: 06 534 1113',
    'image'         => 'https://printo.ae/assets/images/Seo/our-story.jpg',
    'twitter_card' => 'summary_large_image',
    'author' => 'Printo',
    'twitter_site' => '@PrintoUae',
    'fb_app_id' => '',
    'keywords'      => 'Printo Online,  digital printing dubai, digital printing sharjah, uae digital printing, printing press in uae, printing press in Sharjah, printing press in dubai, offset printing in uae, offset printing Sharjah, offset printing dubai, printing companies in uae, printing companies in Sharjah, printing companies in dubai, large format printing, large format printing dubai, printing services,
     printing press, digital printing, digital printing uae, offset printing',
])
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
        {{-- <x-fullwidth-small /> --}}
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
                   PRINTO is one of the most trusted and reputed name in the Printing Industry in the UAE.

    We provide state of the art service for printing of Stationery, Books, Magazines, Catalogues, Directories etc.
 <br />
 With a team of dedicated and experienced printing experts,
 Printo is always committed to provide top quality service  <br /> for all your printing need.
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
        <h2 class="text-3xl font-semibold text-gray-900 mb-5"> PRINTO - ONE OF THE LEADING ONLINE DIGITAL PRINTING PRESSES IN THE UAE</h2>
        <p>PRINTO is one of the most trusted and reputed name in the Printing Industry in the UAE. </p>
             We provide state of the art service for printing of Stationery, Books, Magazines, Catalogues, Directories etc.<br>
              With a team of dedicated and experienced printing experts, Rainbow Printing Press is always committed to provide top quality service for all your printing need. <br>

    </div>
    <div class="our-story mt-24 hidden">
        <div class="rounded-lg bg-theme-gray p-5">
            <h3 class="capitalize text-sec font-semibold text-xl mb-3">our story</h3>
            <p>Printo has provided quality online printing services which is managed by Rainbow Printing Press which was introducted to the United Arab Emirates since 1989! We specialize in commercial offset printing and digital printing services
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
    <div class="px-4 py-3 bg-cyan-500 text-lg text-white font-semibold capitalize text-sec font-semibold text-xl mb-3">Our Process </div>

        <div class="grid grid-cols-1 sm:grid-cols-1 gap-10">


    <img src="{{ asset('assets/images/press.png') }}" alt="image" >



        </div>
    </div>
    {{-- our strength --}}
</section>

<section class="my-12 md:my-24" id="clientSection">
    <home-clients></home-clients>
</section>


<section class="my-12 md:my-24" id="contactSection">

    {{-- office block --}}

    <div class="mt-12">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10">
            <div>
                <div class="px-4 py-3  bg-cyan-500 text-lg text-white font-semibold">Contact US </div>
                <div class="border p-5 mt-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.9605465949867!2d55.42899581501177!3d25.305529583845942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe6afcce8ce885a66!2sPrinto!5e0!3m2!1sen!2sae!4v1632745034727!5m2!1sen!2sae" 
                    width="100%" height="320" rel="nofollow" frameborder="0" style="border:0"></iframe>
 
        </div>

            </div>
            <div>
               <div class="py-5">
                    <span class="block"> Printo </span>
                    <span class="block"> P.O. Box 25483, Sharjah, UAE </span>
                    <table class="mt-5 w-full">
                        <tr>
                            <td> <span class="font-semibold">Call</span> </td>
                            <td>+971 6 534 1113</td>
                        </tr>
                        <tr>
                            <td> <span class="font-semibold">Email</span> </td>
                            <td>info@printo.ae</td>
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





    <a href="https://api.whatsapp.com/send?phone=971562876500&text=Iam intreasted in printo Services" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
<x-Social-links />

<x-Social-links />
</section>
{{-- contact section --}}

@endsection