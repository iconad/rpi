@extends('layouts.app')

@section('headlinks')
@include('meta::manager', [
    'title'         => ' Printo | Online Digital Printing Shop in UAE',
    'description'   => 'Printo offers Online Digital printing &amp; affordable services to businesses in Dubai, Sharjah, Abu Dhabi &amp; all across the Gulf. Call: 06 534 1113',
    'image'         => 'https://printo.ae/assets/images/Seo/Printo-story.jpg',
    'twitter_card' => 'Desktop Calendar',
    'author' => 'Printo',
    'twitter_site' => '@PrintoUae',
    'geo.region' => 'AE',
    'geo.placename' => 'Sharjah',
    'geo.position' => '25.29424;55.423648',
    'ICBM' => '25.29424, 55.423648',
    'fb_app_id' => '103831525403061',
    'keywords'      => 'business cards,  printing services,  cheap business cards,  printer,  business card printing,  photo printing,  custom business cards,  online printing,
     business cards online,  poster printing,  printing companies,  card printer,  banner printing,  printing photos online,  postcard printing,  business card design,  visiting card,  business card template, customized gifts, customized gifts for him, customized gifts for her, customized gifts for mom, customized gifts for dad, customized gifts for men, customized gift bags, customized gift boxes, customized gifts for grandma, customized gifts for kids, customized gift for him, customized gift certificates, customized gift cards, customized gift for girlfriend, customized gift tags, customized gift for mom, customized gift for boss, customized gift ideas, customized gift baskets, customized gift for boyfriend, personalized gifts, personalized christmas stockings, personalized gifts for him, personalized gifts for her, personalized coffee mugs, personalized address stamp, personalized address labels, personalized anniversary gifts for him, personalized advent calendar, personalized anniversary gifts, personalized aunt gifts, personalized cutting boards, personalized christmas stockings sale, personalized christmas gifts, personalized christmas cards, personalized cups, personalized coasters, personalized engagement gifts, personalized family christmas ornaments, personalized family ornaments, personalized frames, personalized family gifts, personalized family name signs, personalized gifts for mom,, personalized gifts for grandma, personalized gifts for kids, personalized gifts for men, personalized gifts for dad, personalized hats, personalized holiday cards, personalized home signs, personalized items uae, personalized pens dubai, personalized iphone case personalized mobile covers photo covers, personalized notebooks, personalized diaries, personalized keychains, customized notebooks, customized kitchen gifts, personalized luggage tags,, personalized leather journal personalized lighters, personalized mugs, personalized memorial gifts, personalized metal signs, personalized mens gifts, personalized mouse pads, personalized notepads, personalized notebooks, personalized name puzzle, personalized office gifts, personalized office supplies, personalized photo gifts, personalized pens, personalized picture frames, personalized pillows, personalized phone case, personalized picture gifts, personalized romantic gifts for him, personalized stockings, personalized stationery, personalized signs, personalized stamps, personalized shot glasses, personalized shirts, personalized santa sack, personalized sweatshirts, personalized travel mugs, personalized tumblers, personalized t shirts, personalized teacher gifts, personalized usb drives, personalized planner, personalized calendar, personalized diary, Canvas printing dubai, folder design sharjah, business cards dubai, letterhead design dubai, sticker printing dubai, business cards printing dubai, 85x55mm diecut, flyer printing uae, business cards pritning dubai, printing and production sharjah, printing companies in dubai, flyer design in uae, envelope design uae, business card design dubai, printing dubai, folder design dubai, folder design uae, envelope design dubai, print arabia printing press, booklet printing in uae, menu printing dubai, vinyl sticker printing dubai, leaflet printers in dubai, flyers printing dubai, leaflet printers in dubai, folder design uae, folder design dubai, business card printing dubai, business cards dubai, business card design sharjah, pull up banner printing dubai, cheap printing services in dubai, leaflet printing in uae, cheap flyer printing service, printing services dubai, leaflet printers in uae, vinyl sticker printing dubai, stickers printing dubai, envelope design abu dhabi, leaflet printing in uae, letterhead design dubai, leaflet printers in dubai, stickers printing dubai, sticker printing dubai, conqueror paper letterhead, business card design uae, leaflet printing dubai, letterhead design dubai, how to make a circle sticker in photoshop, printing and production uae, menu printing dubai, conqueror paper letterhead, printing and production dubai, rollup banner printing dubai, printing and production sharjah, online printing dubai, menu printing dubai, booklet printing dubai, leaflet printing dubai, printing services dubai, customised stickers dubai, printing services in dubai, business card design uae, circle business cards dubai, envelope design uae, online printing services dubai, envelope design abu dhabi, envelope design abu dhabi, photoshop prinitng circle labels, envelope design dubai, folder design dubai, 85x55mm diecut, booklet printing dubai, business cards printing dubai, printing services in dubai, pull up banner printing dubai, business card printing dubai, cheap printing services in dubai, banner printing dubai, photoshop prinitng circle labels, flyers printing dubai, flyer design in uae, printing and production dubai, leaflet printing in dubai, flyer design in uae, how to make a circle sticker in photoshop, business card design dubai, printing and production uae, business card printing dubai, flyers printing dubai, envelope design dubai, dubai expert flyer designer in uae, 85x55mm diecut, business cards pritning dubai, customised stickers dubai, flyer printing uae, printing services dubai, leaflet printers in uae, rollup banner printing dubai, printing services in dubai, pull up banner printing dubai, cheap printing services in dubai, business cards dubai, banner printing dubai, envelope design uae, leaflet printing in uae, leaflet printing in dubai, print arabia printing press, printing and production uae, photoshop prinitng circle labels, dubai expert flyer designer in uae, leaflet printing dubai, conqueror paper letterhead, print arabia printing press, full color 4c, printing and production dubai, booklet printing in uae, full color 4c, business card design uae, leaflet printers in uae, booklet printing in uae, how to make a circle sticker in photoshop, customised stickers dubai, flyer printing uae, online printing services dubai, business card design dubai, printing and production sharjah, business card design sharjah, sticker printing dubai, online printing dubai, online printing services dubai, leaflet printing in dubai, online printing dubai, printing dubai, dubai expert flyer designer in uae, banner printing dubai, vinyl sticker printing dubai, business cards printing dubai, circle business cards dubai, business card design sharjah, business cards pritning dubai, printing dubai, circle business cards dubai, printing companies in dubai, rollup banner printing dubai, booklet printing dubai, folder design sharjah, printing companies in dubai, folder design sharjah, folder design uae, stickers printing dubai, folder design sharjah, business cards dubai, letterhead design dubai, sticker printing dubai, business cards printing dubai, 85x55mm diecut, flyer printing uae, business cards pritning dubai, printing and production sharjah, printing companies in dubai, flyer design in uae, envelope design uae, business card design dubai, printing dubai, folder design dubai, folder design uae, envelope design dubai, print arabia printing press, booklet printing in uae, menu printing dubai, vinyl sticker printing dubai, leaflet printers in dubai, flyers printing dubai, leaflet printers in dubai, folder design uae, folder design dubai, business card printing dubai, business cards dubai, business card design sharjah, pull up banner printing dubai, cheap printing services in dubai, leaflet printing in uae, printing services dubai, leaflet printers in uae, vinyl sticker printing dubai, stickers printing dubai, envelope design abu dhabi, leaflet printing in uae, letterhead design dubai, leaflet printers in dubai, stickers printing dubai, sticker printing dubai, conqueror paper letterhead, business card design uae, leaflet printing dubai, letterhead design dubai, how to make a circle sticker in photoshop, printing and production uae, menu printing dubai, conqueror paper letterhead, printing and production dubai rollup banner printing dubai, printing and production sharjah, online printing dubai, menu printing dubai, booklet printing dubai, leaflet printing dubai, printing services dubai, customised stickers dubai, printing services in dubai, business card design uae, circle business cards dubai, envelope design uae, online printing services dubai, envelope design abu dhabi, envelope design abu dhabi, photoshop prinitng circle labels, envelope design dubai, folder design dubai, 85x55mm diecut, booklet printing dubai, business cards printing dubai, printing services in dubai, pull up banner printing dubai, business card printing dubai, cheap printing services in dubai, banner printing dubai, photoshop prinitng circle labels, flyers printing dubai, flyer design in uae, printing and production dubai, leaflet printing in dubai, flyer design in uae, how to make a circle sticker in photoshop, business card design dubai, printing and production uae, business card printing dubai, flyers printing dubai, envelope design dubai, dubai expert flyer designer in uae, 85x55mm diecut, business cards pritning dubai, customised stickers dubai, flyer printing uae, printing services dubai, leaflet printers in uae, rollup banner printing dubai, printing services in dubai, pull up banner printing dubai, cheap printing services in dubai, business cards dubai, banner printing dubai, envelope design uae, leaflet printing in uae, leaflet printing in dubai, print arabia printing press, printing and production uae, photoshop prinitng circle labels, dubai expert flyer designer in uae, leaflet printing dubai, conqueror paper letterhead, print arabia printing press, business card design uae, leaflet printers in uae, booklet printing in uae, how to make a circle sticker in photoshop, customised stickers dubai, flyer printing uae, online printing services dubai, business card design dubai, printing and production sharjah, business card design sharjah, sticker printing dubai, online printing dubai, online printing services dubai, leaflet printing in dubai, online printing dubai, printing dubai, dubai expert flyer designer in uae, banner printing dubai, vinyl sticker printing dubai, business cards printing dubai, circle business cards dubai, business card design sharjah, business cards pritning dubai, printing dubai, circle business cards dubai, printing companies in dubai, rollup banner printing dubai, booklet printing dubai, folder design sharjah, printing companies in dubai, folder design sharjah, folder design uae, stickers printing dubai',
])
@endsection
@section('content')
    <section id="pageCover">

       <div class="page-cover" style="background: url({{$cover}}) no-repeat center; background-size: cover;">
        <div class="inner p-8 w-full md:w-1/2">
            <div class="text-xl font-medium ">{{$product->delivery_time}}  Days Delivery*</div>
            <h1 class="text-4xl lg:text-6xl my-2 leading-none text-white font-semibold">{{$product->title}}</h1>
            <div class="text-sec font-medium text-lg lg:text-xl capitalize">
                @if (count($product->packages) != 0)
                    @if (count($product->packages[0]->prices) != 0)
                    <span>{{$product->packages[0]->prices[0]->size->region}}</span>
                    @endif
                @endif

                @if (count($product->packages) != 0)
                    @if (count($product->packages[0]->prices) != 0)
                    <span>{{$product->packages[0]->prices[0]->size->type}}</span>
                    @endif
                @endif

                @if (count($product->packages) != 0)
                    @if (count($product->packages[0]->prices) != 0)
                    <span>• {{$product->packages[0]->prices[0]->quantity}} {{ $product->packages[0]->prices[0]->quantity == 1 ? 'Copy' : 'Copies'}}</span>
                    @endif
                @endif

                @if (count($product->packages) != 0)
                    @if (count($product->packages[0]->prices) != 0)
                        @if (count($product->packages[0]->prices[0]->sizes) != 0)
                        <span>>  {{$product->packages[0]->prices[0]->sizes[0]->price}} AED</span>
                    </div>
                        @else
                        no size
                        @endif
                    @else
                    no price
                    @endif
                @else
                no package
                @endif

                @if (count($product->packages) != 0)
            <a href="/product-order/paper/{{$product->slug}}?package={{$product->packages[0]->id}}&category={{$product->category->menu->id}}&type=paper" class="red-button">Order Now</a>
            @endif
        </div>
       </div>

       {{-- floating quote button --}}
       <button class="get-a-free-quote fixed right-10 bottom-10 z-50">
            <a href="/estimate" class="block rounded-full px-5 py-3 shadow-lg bg-theme-red text-white font-medium">
                <span>Get a free quote!</span>
            </a>
        </button>
       {{-- floating quote button --}}


       {{-- page cover --}}
       <div class="product-navbar lg:flex lg:items-center lg:justify-center bg-cyan-50 -mt-2">
            <ul class="lg:flex lg:items-center">
                <li>
                    <a href="#overview" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-white">Overview</a>
                </li>
                <li>
                    <a href="#paperPrice" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-white">Paper & Prices</a>
                </li>
                <li>
                    <a href="#specifications" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-white">Specifications</a>
                </li>

                <li>
                    <a href="#howToOrder" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-white">Order</a>
                </li>
                <li>
                    <a href="#knowBeforeOrder" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-white">Know Before Order</a>
                </li>
            </ul>
       </div>
       {{-- product navbar --}}
    </section>
    {{-- cover end --}}


    <section class="product-tree mt-12" id="overview">
        <div class="text-center block ">
            <h2 class="text-2xl md:text-4xl xl:text-4xl font-black text-center text-white md:leading-tight">
                <span class="bg-cyan-500 inline-block p-2">{{$product->body_title}}</span>
            </h2>
            <div class="text-lg lg:text-xl text-indigo-900 mt-4">{{$product->body_subtitle}}</div>
            <div class=" {{$product->points->count() < 4  ? 'hidden' : 'grid'}} product-points-grid points-grid grid-cols-2 lg:grid-cols-4 mx-6 mt-16 lg:border
            lg:border-gray-900 lg:border-b-0 lg:border-l-0 lg:border-r-0">
                @foreach ($product->points as $point)
                <div class="point p-7">
                    @if ($point->media->count() != 0)
                    <thumb-image-blade classess="mx-auto" image="{{$point->media[0]->file_name}}" id="{{$point->media[0]->id}}"></thumb-image-blade>
                    @else
                    <img src="https://www.printarabia.ae/img/misc/image-icon/default-icon-1.png" alt="icon" class="mx-auto">
                    @endif
                    <div class="text-lg font-semibold mt-4">{{$point->title}}</div>
                    <div class="text-sm text-gray-700">{{$point->body}}</div>
                </div>
                @endforeach
            </div>
            <!-- points grid -->
            <div class="images-grid mt-5">
                <product-overview-images :images="{{ json_encode($product->getMedia('product-gallery')) }}"></product-overview-images>
            </div>
            <!-- images grid -->
        </div>
    </section>
    {{-- points --}}


    <section class="price-page my-16" id="paperPrice">
        <div class="text-center">
            <div class="text-3xl font-semibold text-gray-900">PRICES & PAPER</div>
        </div>
        <div class="prices-drop-down mt-5">
            {{-- /product-order/{{$product->slug}}?package={{$product->packages[0]->id}}&category={{$product->category->menu->id}}&type={{$product->type}} --}}
            <product-paper-price :pid="{{ json_encode($product->id) }}"></product-paper-price>
        </div>
        {{-- prices dropdonw --}}
    </section>
    {{-- price and page section ended here --}}


    <section class="product-size-specifications my-16" id="specifications">
        <div class="text-center">
            <div class="text-3xl font-semibold text-gray-900">Product Specifications </div>

        </div>
        <div class="sizess mt-5 bg-theme-gray p-8">
            <div class="text-2xl flex items-center font-semibold text-gray-800 mb-5">

                <span>Product Size </span>
            </div>
            {{-- header --}}

                <product-sizes></product-sizes>


            <div class="mt-8">
                <a class="text-primary font-semibold text-lg text-primary-500 theme-link border-b border-transparent hover:border-primary "
                href="/layout-templates">Explore our Templates</a>
            </div>
        </div>

        {{-- prices dropdonw --}}
    </section>

    <section class="how-to-order my-16" id="howToOrder">
        <div class="text-center w-full md:w-2/3 mx-auto">
            <div class="text-3xl font-semibold text-gray-900">Our Process</div>
            <p class="text-xl text-gray-800">These are tried and true favorites that will have you set to get down to business.</p>
        </div>
        <div>
            <product-how-to-order />

        </div>
    </section>


    <section class="turnaround-page my-16" id="knowBeforeOrder">
    <turn-around />


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-10 mt-10">
            <div class="box border-2 border-primary p-10">
                <div class="flex items-center justify-center text-2xl text-primary font-semibold">
                    <span>CMYK Data</span>
                    <span class="block ml-3 w-10 h-10 border border-primary rounded-full flex items-center justify-center">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                    </span>
                </div>
                <div class="my-5">
                    <img src="{{asset('assets/images/cmyk-data.png')}}" alt="cmyk-data" class="w-1/2  mx-auto">
                </div>
                <ul class="list-disc text-base">
                    <li>
                        <p>Data saved in CMYK colours is the correct format, as printing on paper is done by combining four colour inks: CMYK (Cyan, Magenta, Yellow and Black).</p>
                    </li>
                </ul>
            </div>
            {{-- box --}}
            <div class="box border-2 border-primary p-10">
                <div class="flex items-center justify-center text-2xl text-primary font-semibold">
                    <span>PANTONE Data</span>
                    <span class="block ml-3 w-10 h-10 border border-primary rounded-full flex items-center justify-center">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                    </span>
                </div>
                <div class="my-5">
                    <img src="{{asset('assets/images/pantone-data.png')}}" alt="pantone-data" class="w-1/2  mx-auto">
                </div>
                <ul class="list-disc text-base">
                    <li class="mb-3">
                        <p>We don’t print Pantone or Spot colours for Large Formate printing. If your data has Pantone or Spot colours, you must convert it to CMYK colours.</p>
                    </li>
                    <li>
                        <p>If above is disregarded, than Spot/ Pantone colours will be converted to CMYK colours. In such case, expect a colour shift in printing</p>
                    </li>
                </ul>
            </div>
            {{-- box --}}
            <div class="box border-2 border-primary p-10">
                <div class="flex items-center justify-center text-2xl text-primary font-semibold">
                    <span>RGB Data</span>
                    <span class="block ml-3 w-10 h-10 border border-primary rounded-full flex items-center justify-center">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                    </span>
                </div>
                <div class="my-5">
                    <img src="{{asset('assets/images/rgb-data.png')}}" alt="rgb-data" class="w-1/2  mx-auto">
                </div>
                <ul class="list-disc text-base">
                    <li class="mb-3">
                        <p>Data in RGB colours (primarly used for Monitors, TV Screens and Phones) are not correct colours at all for printing on paper.</p>
                    </li>
                    <li>
                        <p>Make sure your data is created or converted to CMYK, and not RGB. If not, we will change to CMYK colours. In such case, colours may come out different.</p>
                    </li>
                </ul>
            </div>
            {{-- box --}}
        </div>
    </section>




    {{-- price and page section ended here --}}

     <section class="turnaround-page my-16" id="turnaround">

        <div class="text-center w-full md:w-2/3 mx-auto">
            <div class="mb-4 text-2xl md:text-4xl xl:text-4xl font-black text-center text-white md:leading-tight">
                <span class="inline-block bg-cyan-500 p-2">Print Process</span>
            </div>
            <p class="text-base font-medium text-red-600 ">Product will be Delivered ({{$product->delivery_time}}  Business Days )</p>

            <print-schedule />
            <hr class=" h-px bg-gray-500 my-3">

        </div>

    </section>

    <section class="quantity-section my-16 p-6">
        <div class="flex flex-wrap lg:flex-nowrap items-center">
            <div class="text-center w-auto mb-5 lg:mb-0 text-2xl font-semibold text-indigo-800 flex items-center">
                <span class=" text-gray-600 inline-block mr-2">
                <svg class="w-12 h-12 text-deep-purple-accent-400 sm:w-16 sm:h-16 xl:w-20 xl:h-20" stroke="currentColor" viewBox="0 0 52 52">
            <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
          </svg>  </span>
                <span>
                    QuoteLine
                </span>
            </div>
            <div class="text-3xl font-semibold text-indigo-800 ml-0 md:ml-6 w-full mt-5">
                <product-quantity-chart></product-quantity-chart>
            </div>
        </div>
    </section>
    {{-- price and page section ended here --}}


    <section class="printing-section my-16 bg-theme-gray p-6">
        <div class="flex flex-wrap lg:flex-nowrap items-center">
            <div class="uppercase w-auto mb-5 lg:mb-0 text-2xl font-semibold text-indigo-800 flex items-center">
                <span class="text-gray-600 inline-block mr-2">
                    <svg class="fill-current w-8 h-8" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.06 31.06"><path d="M20.87 19.87a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#00a1e9"/><path d="M11.43 29.31a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#e4007f"/><path d="M11.19 10.19a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#ffe200"/><path d="M1.75 19.64a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#9fa0a0"/></svg>
                </span>
                <span>
                    Printing
                </span>
            </div>
            <div class="text-xl font-medium text-gray-900 ml-0 md:ml-16 w-full">
                <ul>
                    <li>
                        <p>{{$product->printing_text}}.</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    {{-- printing section --}}


    <section class="finishing-section my-16 p-6">
        <div class="flex flex-wrap lg:flex-nowrap items-start">
            <div class="w-full lg:w-auto mb-10 lg:mb-0 text-2xl font-semibold text-gray-900 flex items-center">
                <span class="text-gray-600 inline-block mr-2 md:mt-0">
                    <svg class="w-6 h-6 fill-current" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 25.8 26.3"><path class="cls-1" d="M383 26a9 9 0 01-7-4c-5-6 5-18 6-21l2-1 1 1a54 54 0 015 8c3 6 3 11 1 13a9 9 0 01-8 4zm0-22c-3 5-8 13-5 17a7 7 0 0011 0c3-4-2-13-6-17z" transform="translate(-366)"/><path class="cls-1" d="M375 0c-1 1-12 16-7 22a9 9 0 0015 0c5-6-7-21-8-22z" transform="translate(-366)"/></svg>
                </span>
                <span>
                    Finishings
                </span>
            </div>
            <div class="text-xl font-medium text-gray-900 ml-0 md:ml-16 w-full">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-10">

                    @foreach ($product->finishings as $finishing)
                    <div class="box {{ $finishing->video_link ? 'flex flex-col justify-around' : '' }} ">
                        <div class="text-2xl font-semibold text-primary mb-4">{{$finishing->title}}</div>
                        <p class="text-base">{{$finishing->body}}</p>
                        <p class="my-4 text-lg text-sec font-semibold">+{{$finishing->delivery_time}} Working Day</p>
                        @if ($finishing->video_link)
                        <a href="{{$product->video_link}}" class="block relative h-48">
                            <img class="absolute left-0 top-0" src="https://i1.ytimg.com/vi/UWf30fIxx04/maxresdefault.jpg" alt="youtbe thumbnail">
                            <span class="absolute left-0 top-0 z-10 text-youtube w-full h-full flex items-center justify-center">
                                <svg class="fill-current w-16 h-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23 6a3 3 0 00-2-2h-9-9a3 3 0 00-2 2 31 31 0 00-1 6 31 31 0 001 6 3 3 0 002 2h18a3 3 0 002-2 31 31 0 001-6 31 31 0 00-1-6zM10 16V8l6 4z"/></svg>
                            </span>
                        </a>
                        @endif
                    </div>
                    {{-- box --}}
                    @endforeach


                </div>
                {{-- grid --}}
            </div>
        </div>
    </section>
    {{-- finishing section --}}

    <our-projects />

    {{-- warning --}}


    <section class="turnaround-page my-16 hidden">

    </section>
    {{-- useful links ended --}}

@endsection


