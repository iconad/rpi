@extends('layouts.app')

@section('content')
    <section id="pageCover">

       <div class="page-cover" style="background: url({{$cover}}) no-repeat center; background-size: cover;">
        <div class="inner p-8 w-full md:w-1/2">
            <div class="text-xl font-medium ">{{$product->delivery_time}} Business Days Delivery*</div>
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
                        <span class="text-gray-800">(Incl. VAT)</span></div>
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

       <pre>

       </pre>
       {{-- page cover --}}
       <div class="product-navbar lg:flex lg:items-center lg:justify-center bg-theme-gray -mt-2">
            <ul class="lg:flex lg:items-center">
                <li>
                    <a href="#overview" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-theme-gray-dark">Overview</a>
                </li>
                <li>
                    <a href="#paperPrice" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-theme-gray-dark">Paper & Prices</a>
                </li>
                <li>
                    <a href="#specifications" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-theme-gray-dark">Specifications</a>
                </li>
                <li>
                    <a href="#turnaround" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-theme-gray-dark">Turnaround</a>
                </li>
                <li>
                    <a href="#howToOrder" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-theme-gray-dark">How to Order</a>
                </li>
                <li>
                    <a href="#knowBeforeOrder" class="block px-6 py-4 font-semibold text-lg text-gray-900 hover:bg-theme-gray-dark">Know Before Order</a>
                </li>
            </ul>
       </div>
       {{-- product navbar --}}
    </section>
    {{-- cover end --}}


    <section class="product-tree mt-12" id="overview">
        <div class="text-center block ">
            <h2 class="mt-5 text-2xl lg:text-4xl font-semibold text-gray-900">{{$product->body_title}}</h2>
            <div class="text-lg lg:text-xl text-gray-800">{{$product->body_subtitle}}</div>
            <div class=" {{$product->points->count() < 4  ? 'hidden' : 'grid'}} product-points-grid points-grid grid-cols-2 lg:grid-cols-4 mx-6 mt-16 lg:border lg:border-gray-900 lg:border-b-0 lg:border-l-0 lg:border-r-0">
                @foreach ($product->points as $point)
                <div class="point p-5">
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
            <div class="text-3xl font-semibold text-gray-900">Paper & Prices <small class="text-base text-gray-700">(Incl.VAT)</small></div>
        </div>
        <div class="prices-drop-down mt-5">
            {{-- /product-order/{{$product->slug}}?package={{$product->packages[0]->id}}&category={{$product->category->menu->id}}&type={{$product->type}} --}}
            <product-paper-price
                :pid="{{ json_encode($product->id) }}"
                ></product-paper-price>
        </div>
        {{-- prices dropdonw --}}
    </section>
    {{-- price and page section ended here --}}

    <section class="product-size-specifications my-16" id="specifications">
        <div class="text-center">
            <div class="text-3xl font-semibold text-gray-900">Specifications </div>
            <p>Sizes, Templates, Printing, Finishings, etc.</p>
        </div>
        <div class="sizess mt-5 bg-theme-gray p-8">
            <div class="text-2xl flex items-center font-semibold text-gray-800 mb-5">
                <span class="inline-block mr-2">
                    <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.8 15.8L0 13v7h7l-2.8-2.8 4.34-4.32-1.42-1.42L2.8 15.8zM17.2 4.2L20 7V0h-7l2.8 2.8-4.34 4.32 1.42 1.42L17.2 4.2zm-1.4 13L13 20h7v-7l-2.8 2.8-4.32-4.34-1.42 1.42 4.33 4.33zM4.2 2.8L7 0H0v7l2.8-2.8 4.32 4.34 1.42-1.42L4.2 2.8z"/></svg>
                </span>
                <span>Sizes </span>
            </div>
            {{-- header --}}

                <product-sizes></product-sizes>


            <div class="mt-8">
                <a class="text-primary font-semibold text-lg text-primary-500 theme-link border-b border-transparent hover:border-primary " href="http://">Download Templates</a>
            </div>
        </div>
        {{-- prices dropdonw --}}
    </section>
    {{-- price and page section ended here --}}



    <section class="quantity-section my-16 p-6">
        <div class="flex flex-wrap lg:flex-nowrap items-center">
            <div class="w-auto mb-5 lg:mb-0 text-2xl font-semibold text-gray-900 flex items-center">
                <span class="text-gray-600 inline-block mr-2">
                    <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 012 2v16a2 2 0 01-2 2H4a2 2 0 01-2-2V2zm3 1v2h10V3H5zm0 4v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9zm4 0v6h2v-6h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9z"/></svg>
                </span>
                <span>
                    Quantity
                </span>
            </div>
            <div class="text-3xl font-semibold text-gray-900 ml-0 md:ml-6 w-full mt-5">
                <product-quantity-chart></product-quantity-chart>
            </div>
        </div>
    </section>
    {{-- price and page section ended here --}}


    <section class="printing-section my-16 bg-theme-gray p-6">
        <div class="flex flex-wrap lg:flex-nowrap items-center">
            <div class="w-auto mb-5 lg:mb-0 text-2xl font-semibold text-gray-900 flex items-center">
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
                    <svg class="w-6 h-6 fill-current" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.8 26.3"><path class="cls-1" d="M383 26a9 9 0 01-7-4c-5-6 5-18 6-21l2-1 1 1a54 54 0 015 8c3 6 3 11 1 13a9 9 0 01-8 4zm0-22c-3 5-8 13-5 17a7 7 0 0011 0c3-4-2-13-6-17z" transform="translate(-366)"/><path class="cls-1" d="M375 0c-1 1-12 16-7 22a9 9 0 0015 0c5-6-7-21-8-22z" transform="translate(-366)"/></svg>
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


    <section class="turnaround-page my-16" id="turnaround">
        <div class="text-center w-full md:w-2/3 mx-auto">
            <div class="text-3xl font-semibold text-gray-900">Turnaround</div>
            <p class="text-xl text-gray-800">{{$product->delivery_time}} Business Days (not included Fri, Sat & Holidays)</p>

            <hr class=" h-px bg-gray-500 my-3">
            <div>
                <p class="text-lg text-red-600 ">
                    <span class="block flex items-start">
                        <span class="inline-block mr-2">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.6 20.1"><path d="M23 18L12 1a1 1 0 00-1 0L1 18a1 1 0 000 1 1 1 0 000 1h21a1 1 0 001-1 1 1 0 000-1z" fill="#ffd900" stroke="#231916" stroke-miterlimit="10" stroke-width="1.2"/><path d="M11 12V9 7a2 2 0 010-1 1 1 0 011-1 1 1 0 011 1 3 3 0 010 1v5a3 3 0 01-1 2 1 1 0 01-1 0 4 4 0 010-2zm1 6a1 1 0 01-1-1 1 1 0 010-1 1 1 0 011-1 1 1 0 011 1 1 1 0 010 1 1 1 0 01-1 1z" fill="#231916"/></svg>
                        </span>
                        Production will only start after you have approved the digital proof of your submitted data.</span>
                    <span class="block font-semibold">The proof approval deadline is strictly by 01pm.</span>
                </p>
            </div>
        </div>

        <div class="mt-6 bg-theme-gray">
            <div class="text-2xxl py-2 text-gray-100 bg-primary-500 font-semibold text-lg text-center p-3">2 Business Days Turnaround Schedule</div>
            <div class="flex flex-wrap lg:flex-nowrap items-center justify-center py-10">
                <div class="w-full lg:w-20rem py-4 md:mr-10 text-center lg:text-left">
                    <div class="text-2xl text-blue-500 font-semibold text-center">Today</div>
                    <div class="text-theme-red-light font-semibold text-semibold text-xl pl-3">01pm</div>
                    <div class="turnaround-lines arrow border-b h-px border-dashed border-blue-500 relative my-2"></div>
                    <div class="font-semibold text-xl text-gray-900">Proof approval by 01pm</div>
                </div>
                <div class="hidden lg:block h-16 w-1 bg-blue-600 rounded-full mt-8"></div>
                <div class="w-full lg:w-20rem py-4 md:ml-10">
                    <div class="text-2xl text-blue-500 font-semibold text-center">Day 1</div>
                    <div class="text-theme-red-light font-semibold text-semibold text-xl pl-3 flex items-center justify-center">
                        <span>3pm</span>
                        <span class="mx-3 rounded-full h-1 block bg-theme-red-light w-24"></span>
                        <span>8pm</span>
                    </div>
                    <div class="turnaround-lines circle border-b h-px border-dashed border-blue-500 relative my-2"></div>
                    <div class="font-semibold text-xl text-gray-900 text-center">Delivery Schedule</div>
                </div>
            </div>
            <div class="text-xl text-gray-800 text-primary text-center font-semibold">Overview of Weekly Turnaround Schedule</div>
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5 p-3 md:p-12">
                <div class="box">
                    <div class="p-3 bg-blue-600 text-white font-medium text-center text-lg lg:text-xl"> <span class="font-semibold">Sun</span> 01pm</div>
                    <div class="relative text-xl font-medium text-blue-600 text-center bg-white h-24 p-3 lg:flex items-end justify-center space-x-2">

                    <span class="hidden turnaround-lines-vertical absolute left-0 top-0 lg:block w-full">
                        <span class="relative arrow mx-auto border-l-2 border-dashed border-blue-600 h-8 block w-px"></span>
                    </span>

                        <span class="font-semibold">Sun</span>
                         <span class="block">(3pm-8pm)</span>
                    </div>
                </div>
                {{-- box --}}
                <div class="box">
                    <div class="p-3 bg-blue-600 text-white font-medium text-center text-lg lg:text-xl"> <span class="font-semibold">Mon</span> 01pm</div>
                    <div class="relative text-xl font-medium text-blue-600 text-center bg-white h-24 p-3 lg:flex items-end justify-center space-x-2">

                    <span class="hidden turnaround-lines-vertical absolute left-0 top-0 lg:block w-full">
                        <span class="relative arrow mx-auto border-l-2 border-dashed border-blue-600 h-8 block w-px"></span>
                    </span>

                        <span class="font-semibold">Mon</span>
                        <span class="block">(3pm-8pm)</span>
                    </div>
                </div>
                {{-- box --}}
                <div class="box">
                    <div class="p-3 bg-blue-600 text-white font-medium text-center text-lg lg:text-xl"> <span class="font-semibold">Tue</span> 01pm</div>
                    <div class="relative text-xl font-medium text-blue-600 text-center bg-white h-24 p-3 lg:flex items-end justify-center space-x-2">

                    <span class="hidden turnaround-lines-vertical absolute left-0 top-0 lg:block w-full">
                        <span class="relative arrow mx-auto border-l-2 border-dashed border-blue-600 h-8 block w-px"></span>
                    </span>

                        <span class="font-semibold">Tue</span>
                        <span class="block">(3pm-8pm)</span>
                    </div>
                </div>
                {{-- box --}}
                <div class="box">
                    <div class="p-3 bg-blue-600 text-white font-medium text-center text-lg lg:text-xl"> <span class="font-semibold">Wed</span> 01pm</div>
                    <div class="relative text-xl font-medium text-blue-600 text-center bg-white h-24 p-3 lg:flex items-end justify-center space-x-2">

                    <span class="hidden turnaround-lines-vertical absolute left-0 top-0 lg:block w-full">
                        <span class="relative arrow mx-auto border-l-2 border-dashed border-blue-600 h-8 block w-px"></span>
                    </span>

                        <span class="font-semibold">Wed</span>
                        <span class="block">(3pm-8pm)</span>
                    </div>
                </div>
                {{-- box --}}
                <div class="box col-span-2 xl:col-span-1">
                    <div class="p-3 bg-blue-600 text-white font-medium text-center text-lg lg:text-xl"> <span class="font-semibold">Thu</span> 01pm</div>
                    <div class="relative text-xl font-medium text-blue-600 text-center bg-white h-24 p-3 lg:flex items-end justify-center space-x-2">

                    <span class="hidden turnaround-lines-vertical absolute left-0 top-0 lg:block w-full">
                        <span class="relative arrow mx-auto border-l-2 border-dashed border-blue-600 h-8 block w-px"></span>
                    </span>

                        <span class="font-semibold">Thu</span>
                        <span class="block">(3pm-8pm)</span>
                    </div>
                </div>
                {{-- box --}}
            </div>
            <div class="pb-8 text-xl text-gray-800 text-primary text-center font-semibold">+ Additional 1 day for delivery outside Dubai</div>
        </div>

    </section>
    {{-- turnaround section ended here --}}


    <section class="how-to-order my-16" id="howToOrder">
        <div class="text-center w-full md:w-2/3 mx-auto">
            <div class="text-3xl font-semibold text-gray-900">How to order</div>
            <p class="text-xl text-gray-800">It’s simple. It’s easy. It’s just a few clicks away</p>
        </div>
        <div>
            <product-how-to-order />
        </div>
    </section>


    <section class="turnaround-page my-16" id="knowBeforeOrder">
        <div class="text-center w-full md:w-2/3 mx-auto">
            <div class="text-3xl font-semibold text-gray-900">Know Before Order</div>
            <p class="text-xl text-gray-800">While preparing your data, please take note of the following</p>
        </div>
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

    <section class="warning my-12 md:my-24">
        <div class="w-4/5 mx-auto text-center text-lg">
            <p> <span class="inline-block mr-1">
                <svg class="w-7 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.6 20.1"><path d="M23 18L12 1a1 1 0 00-1 0L1 18a1 1 0 000 1 1 1 0 000 1h21a1 1 0 001-1 1 1 0 000-1z" fill="#ffd900" stroke="#231916" stroke-miterlimit="10" stroke-width="1.2"/><path d="M11 12V9 7a2 2 0 010-1 1 1 0 011-1 1 1 0 011 1 3 3 0 010 1v5a3 3 0 01-1 2 1 1 0 01-1 0 4 4 0 010-2zm1 6a1 1 0 01-1-1 1 1 0 010-1 1 1 0 011-1 1 1 0 011 1 1 1 0 010 1 1 1 0 01-1 1z" fill="#231916"/></svg>
            </span>
             Print Arabia will not be held responsible nor reprint orders due to poorly prepared data. If in doubt please see our <a href="#" class="text-sec font-semibold border-transparent border-b hover:border-sec">Artworking Guidelines</a> for more information on how to prepare your data.Where colour accuracy is critical, we strongly recommend investing in a <a href="#" class="text-sec font-semibold border-transparent border-b hover:border-sec">printed sample</a> to avoid disappointment.</p>
        </div>
    </section>
    {{-- warning --}}


    <section class="turnaround-page my-16">
        <x-product-useful-links />
    </section>
    {{-- useful links ended --}}


@endsection
