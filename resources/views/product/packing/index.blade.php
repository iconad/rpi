@extends('layouts.app')

@section('content')
    <section id="pageCover">

    <section id="CoverAdSection" class="mt-6 banner-section">
        @if($category->getMedia('images')->count() != 0)
            <thumb-image-blade classess="w-full object-cover" image="{{$category->getMedia('images')[0]->file_name}}" id="{{$category->getMedia('images')[0]->id}}"></thumb-image-blade>
        @endif
    </section>

    @if($subcategories->count() != 0)
    <section class="sub-categories my-12">

        <div class="text-lg font-semibold text-gray-800 mb-3">Subcategories</div>

        <div class="products grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 xl:grid-cols-6 gap-5 md:gap-5">
            @foreach ($subcategories as $subcategory)

            <div class="border rounded overflow-hidden cursor-pointer transition-all duration-300 hover:shadow-lg"
                onclick="location.href='/estimate'">
                @if (count($subcategory->getMedia('images')) != 0)
                <thumb-image-blade
                    image="{{$subcategory->getMedia('images')[0]->file_name}}"
                    id="{{$subcategory->getMedia('images')[0]->id}}"
                    classess="w-full h-48 object-cover">
                </thumb-image-blade>
                @else
                <div class="bg-gray-200 font-semibold text-gray-400 capitalize h-48 flex items-center justify-center">
                    no image
                </div>
                @endif

                <div class="flex items-center justify-between">
                    {{-- /category/{{$category->slug}}/subcategories/{{$subcategory->slug}}/products --}}
                    <a href="/estimate" class="px-3 py-2 font-medium text-left text-primary text-sm capitalize"> {{$subcategory->title}} </a>

                    <a href="/estimate" class="text-sm font-medium px-3 py-2 text-left text-primary text-gray-500"> ({{count($subcategory->products)}}) </a>

                </div>
            </div>

            @endforeach
        </div>


    </section>
    @endif

    <section class="products {{ $subcategories->count() != 0 ? '' : 'mt-12' }} ">
        <div class="text-lg font-semibold text-gray-800 mb-3">Products</div>
            @if ($category->products)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($category->products as $product)
                    @php
                        if($product->custom_link) {
                            $url = $product->custom_link;
                        }else{
                            $url = "/products/".$product->slug;
                        }
                    @endphp

                    <div class="border border-gray-200 rounded-lg">
                        <div>
                            <a href="{{$url}}">
                                @if($product->getMedia('images')->count() != 0)
                                    <thumb-image-blade classess="w-full h-64 object-cover" image="{{$product->getMedia('images')[0]->file_name}}" id="{{$product->getMedia('images')[0]->id}}"></thumb-image-blade>
                                @endif
                            </a>
                        </div>
                        <div>
                            <a href="{{$url}}">
                                <div class="p-3 pb-2 text-lg font-semibold text-primary-500">{{$product->title}}</div>
                            </a>
                        </div>

                    </div>
            @endforeach
            </div>
            @else
            <div class="flex items-center justify-center h-64 w-full">
                <div class="text-xl text-red-500">
                    0 Products
                </div>
            </div>
            @endif
    </section>
    {{-- products --}}


    <section class="my-24" id="googleCustomReviews">
    <div class="w-4/5 mx-auto">
        <x-google-reviews />
    </div>
    </section>
    {{-- google customer reviews --}}


    </section>

    @endsection
