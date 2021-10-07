@extends('layouts.app')

@section('headlinks')
@include('meta::manager', [
    'title'         => 'Online Printing Services Dubai, Sharjah, UAE | Printo',
    'description'   => 'Printo Press offers quality &amp; affordable services to businesses in Dubai, Sharjah, Abu Dhabi &amp; all across the Gulf. Call: 06 534 1113',
    'image'         => '{{asset('assets/images/Seo/our-story.jpg')}}',
   
    'twitter_site' => '@PrintoUae',
    'keywords'      => 'Printo Online,  digital printing dubai, digital printing sharjah, uae digital printing, printing press in uae, printing press in Sharjah, printing press in dubai, offset printing in uae, offset printing Sharjah, offset printing dubai, printing companies in uae, printing companies in Sharjah, printing companies in dubai, large format printing, large format printing dubai, printing services,
     printing press, digital printing, digital printing uae, offset printing',
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


