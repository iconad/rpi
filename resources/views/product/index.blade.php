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
                onclick="location.href='/category/{{$category->slug}}/subcategories/{{$subcategory->slug}}/products'">
                @if (count($subcategory->getMedia('images')) != 0)
                <a href="/category/{{$category->slug}}/subcategories/{{$subcategory->slug}}/products">
                <thumb-image-blade
                    image="{{$subcategory->getMedia('images')[0]->file_name}}"
                    id="{{$subcategory->getMedia('images')[0]->id}}"
                    classess="w-full h-48 object-cover">
                </thumb-image-blade>
                </a>
                @else
                <div class="bg-gray-200 font-semibold text-gray-400 capitalize h-48 flex items-center justify-center">
                    no image
                </div>
                @endif

                <div class="flex items-center justify-between">

                    <a href="/category/{{$category->slug}}/subcategories/{{$subcategory->slug}}/products" class="px-3 py-2 font-medium text-left text-primary text-sm capitalize"> {{$subcategory->title}} </a>

                    <a href="/category/{{$category->slug}}/subcategories/{{$subcategory->slug}}/products" class="text-sm font-medium px-3 py-2 text-left text-primary text-gray-500"> ({{count($subcategory->products)}}) </a>

                </div>
            </div>

            @endforeach
        </div>


    </section>
    @endif

    <section class="products {{ $subcategories->count() != 0 ? '' : 'mt-12' }} ">
        <div class="text-lg font-semibold text-gray-800 mb-3">Products</div>
            @if ($category->products)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($category->products as $product)
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
                                
                                {{$product->packages[0]->prices[0]->quantity}} {{ $product->packages[0]->prices[0]->quantity == 1 ? 'Copy' : 'Copies'}}

                          
                              > {{$product->packages[0]->pricessizes[0]->sizes[0]->price}} AED
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
