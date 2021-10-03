@extends('layouts.app')

@section('content')
    <section id="pageCover">

    <section id="CoverAdSection" class="mt-6 banner-section">
        @if($subcategory->category->getMedia('images')->count() != 0)
            <thumb-image-blade classess="w-full object-cover" image="{{$subcategory->category->getMedia('images')[0]->file_name}}" id="{{$subcategory->category->getMedia('images')[0]->id}}"></thumb-image-blade>
        @endif
    </section>

    <section class="products mt-12">
        <div class="text-lg font-semibold text-gray-800 mb-3">Products</div>
            @if ($subcategory->products)
            <div class="grid grid-cols-3 gap-5">
            @foreach ($subcategory->products as $product)
                @if (
                    count($product->packages) != 0 &&
                    count($product->packages[0]->pricessizes) != 0 &&
                    count($product->packages[0]->pricessizes[0]->sizes) != 0
                )
                    <div class="border border-gray-200 rounded-lg">
                        <div>
                            <a href="/products/{{$product->slug}}">
                                <div class="p-3 text-xl font-semibold text-primary-500">{{$product->title}}</div>
                            </a>
                        </div>
                        <div>
                            <a href="/products/{{$product->slug}}">
                                @if($product->getMedia('images')->count() != 0)
                                    <thumb-image-blade classess="w-full h-64 object-cover" image="{{$product->getMedia('images')[0]->file_name}}" id="{{$product->getMedia('images')[0]->id}}"></thumb-image-blade>
                                @endif
                            </a>
                        </div>
                        <div class="p-3">
                            <div class="mb-2 font-semibold text-sec-500">
                                @if ($product->packages[0]->prices[0]->size)
                                <span>
                                    {{$product->packages[0]->prices[0]->size->region}}  ●
                                </span>
                                @endif
                                {{$product->packages[0]->quantity}} Copies >
                                {{$product->packages[0]->pricessizes[0]->sizes[0]->price}} AED
                            </div>
                            @if ($product->packages && $product->packages[0]->paper)
                                <div class="mb-2 capitalize">
                                    <span class="font-semibold text-black">Papers</span>
                                    {{$product->packages[0]->paper->title}}
                                </div>
                            @endif

                            <div class="mb-2 capitalize">
                                <span class="font-semibold text-black">Delivery</span>  {{$product->delivery_time}} {{ $product->delivery_time > 1 ? 'Days' : 'Day'}}
                            </div>
                            @if ($product->packages && $product->packages[0]->paper)
                                <div class="capitalize">
                                    <span class="font-semibold text-black">Printing</span>
                                    {{$product->packages[0]->paper->side}}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
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
