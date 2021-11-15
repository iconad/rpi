@extends('layouts.app')

@section('content')

    <section class="mt-16" id="pageCover">
       <div>
            <h1 class="text-2xl font-semibold text-gray-800">{{$menu->title}}</h1>
           {{-- <img src="https://assets.printarabia.ae/product-preset-category-banners/jPqlM7VKQDXQb3G/category-banner-3b9ce22c9f79212c1470540f7fba505d.webp" alt="cover image"> --}}
       </div>

    </section>
    {{-- cover end --}}

    <section class="products-wrapper mt-5">
        @if (count($categories) == 0)
        <div class="h-64 flex items-center justify-center">
            <span class="text-2xl md:text-4xl uppercase font-thin text-gray-400">0 Products found!</span>
        </div>
        @else
        <div class="products grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-10">
            @foreach ($categories as $category)

            @php

                if($menu->id == 14) {
                    $url = "/products/shirts/$category->slug";
                }else{
                    $url = "/category/$category->slug/products";
                }

            @endphp

            @if ($menu->id != 13)
            <div class="border rounded overflow-hidden cursor-pointer transition-all duration-300 hover:shadow-lg"
                onclick="location.href='{{$url}}'">
                @if (count($category->getMedia('thumbnail')) != 0)
                <thumb-image-blade
                    image="{{$category->getMedia('thumbnail')[0]->file_name}}"
                    id="{{$category->getMedia('thumbnail')[0]->id}}"
                    classess="w-full h-64 object-cover">
                </thumb-image-blade>
                @else
                <div class="bg-gray-200 font-semibold text-gray-400 capitalize h-64 flex items-center justify-center">
                    no image
                </div>
                @endif

                <div class="flex items-center justify-between">
                    <a href="{{$url}}" class="p-3 font-medium text-left text-primary capitalize"> {{$category->title}} </a>
                    <a href="{{$url}}" class="p-3 text-left text-primary text-gray-500"> ({{count($category->products)}}) </a>
                </div>
            </div>
            {{-- product end --}}
            @else
                @foreach ($category->subcategories as $category)
                    <div class="border rounded overflow-hidden cursor-pointer transition-all duration-300 hover:shadow-lg"
                    onclick="location.href='/products/wallpapers/{{$category->slug}}'">
                    @if (count($category->getMedia('images')) != 0)
                    <thumb-image-blade
                        image="{{$category->getMedia('images')[0]->file_name}}"
                        id="{{$category->getMedia('images')[0]->id}}"
                        classess="w-full h-64 object-cover">
                    </thumb-image-blade>
                    @else
                    <div class="bg-gray-200 font-semibold text-gray-400 capitalize h-64 flex items-center justify-center">
                        no image
                    </div>
                    @endif

                    <div class="flex items-center justify-between">
                        <a href="/products/wallpapers/{{$category->slug}}" class="p-3 font-medium text-left text-primary capitalize"> {{$category->title}} </a>
                        <a href="/products/wallpapers/{{$category->slug}}" class="p-3 text-left text-primary text-gray-500"> ({{count($category->products)}}) </a>
                    </div>
                </div>
                {{-- product end --}}

                @endforeach
            @endif

            @endforeach
        </div>
        {{-- product --}}
        @endif
    </section>

    <section class="my-24">
        <div class="w-full md:w-4/5 mx-auto">
        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
      <span class="relative inline-block">
        <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
          <defs>
            <pattern id="84d09fa9-a544-44bd-88b2-08fdf4cddd38" x="0" y="0" width=".135" height=".30">
              <circle cx="1" cy="1" r=".7"></circle>
            </pattern>
          </defs>
          <rect fill="url(#84d09fa9-a544-44bd-88b2-08fdf4cddd38)" width="36" height="24"></rect>
        </svg>

      </span>
      Premium print?

    </h2>


            <div class="grid grid-cols-3 gap-12">
                <div class="text-center">
                    <img src="https://www.moo.com/dam/jcr:113cc73e-c5cd-4b14-94f0-47c0d1f3630d/0198WF-SVG-72x72-custom-products.svg" class="mb-5 w-24 mx-auto" alt="icon">
                    <div class="font-semibold text-lg">Business Boost</div>
                    <p>Support and services for offices and small teams.</p>
                </div>
                <div class="text-center">
                    <img src="https://www.moo.com/dam/jcr:e4b32bc6-b6b6-43fa-8f56-220c3ad7ffec/0198WF-SVG-72x72-quality.svg" class="mb-5 w-24 mx-auto" alt="icon">
                    <div class="font-semibold text-lg">Business Advanced</div>
                    <p>Increased support and brand control for more complex businesses.</p>
                </div>
                <div class="text-center">
                    <img src="https://www.moo.com/dam/jcr:0ed57561-a0cb-4a56-9d36-c1a7e46ef915/0198WF-SVG-72x72-design-services.svg" class="mb-5 w-24 mx-auto" alt="icon">
                    <div class="font-semibold text-lg">Exclusive products</div>
                    <p>All plans unlock our expanded print product range</p>
                </div>
            </div>

            <div class="w-full my-24 ">
                {{-- <x-ads.fullwidth-small /> --}}
            </div>

            <customer-review />
        </div>
    </section>

@endsection
