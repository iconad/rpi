@extends('layouts.app')

@section('content')

    <section class="mt-16" id="pageCover">
       <div>

            <h1 class="text-2xl font-semibold text-gray-800">{{$category->title}}</h1>
           {{-- <img src="https://assets.printarabia.ae/product-preset-category-banners/jPqlM7VKQDXQb3G/category-banner-3b9ce22c9f79212c1470540f7fba505d.webp" alt="cover image"> --}}
       </div>

    </section>
    {{-- cover end --}}

    <section class="products-wrapper mt-5">
        @if (count($subcategories) == 0)
        <div class="h-64 flex items-center justify-center">
            <span class="text-2xl md:text-4xl uppercase font-thin text-gray-400">0 subcategories found!</span>
        </div>
        @else
        <div class="products grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 md:gap-10">
            @foreach ($subcategories as $subcategory)

            <div class="border rounded overflow-hidden cursor-pointer transition-all duration-300 hover:shadow-lg"
                onclick="location.href='/category/{{$category->slug}}/subcategories/{{$subcategory->slug}}/products'">
                @if (count($subcategory->getMedia('images')) != 0)
                <a href="/category/{{$category->slug}}/subcategories/{{$subcategory->slug}}/products">
                    <thumb-image-blade
                        image="{{$subcategory->getMedia('images')[0]->file_name}}"
                        id="{{$subcategory->getMedia('images')[0]->id}}"
                        classess="w-full h-64 object-cover">
                    </thumb-image-blade>
                </a>
                @else
                <div class="bg-gray-200 font-semibold text-gray-400 capitalize h-64 flex items-center justify-center">
                    no image
                </div>
                @endif

                <div class="flex items-center justify-between">
                    <a href="/category/{{$category->slug}}/subcategories/{{$subcategory->slug}}/products" class="p-3 font-medium text-left text-primary capitalize"> {{$category->title}} </a>
                    <a href="/category/{{$category->slug}}/subcategories/{{$subcategory->slug}}/products" class="p-3 text-left text-primary text-gray-500"> ({{count($subcategory->products)}}) </a>
                </div>
            </div>

            @endforeach
        </div>
        {{-- product --}}
        @endif
    </section>

    <section class="my-24">
        <div class="w-full md:w-4/5 mx-auto">
            <div class="grid grid-cols-3 gap-12">
                <div class="text-center">
                    <img src="{{ asset('assets/images/free-delivery.png') }}" class="mb-5 w-24 mx-auto" alt="icon">
                    <div class="font-semibold text-lg">Free Design Online</div>
                    <p>Customise design templates</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('assets/images/pro-design-service.png') }}" class="mb-5 w-24 mx-auto" alt="icon">
                    <div class="font-semibold text-lg">Browse Designs</div>
                    <p>Exclusive collection</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('assets/images/free-template.png') }}" class="mb-5 w-24 mx-auto" alt="icon">
                    <div class="font-semibold text-lg">Free Layout Templates</div>
                    <p>Ready to download</p>
                </div>
            </div>

            <div class="w-full my-24 ">
                <x-ads.fullwidth-small />
            </div>

            <x-google-reviews />
        </div>
    </section>

@endsection
