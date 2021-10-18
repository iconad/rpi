@extends('manage.layouts.app')
@section('headlinks')
    @livewireStyles
@endsection
@section('content')
@php
$quantity = Array("1", "10", "100", "200", "300", "400", "500", "600", "700", "800", "900", "1000", "2000", "5000", "10000");
$days = Array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14");
@endphp

{{ Breadcrumbs::render('product.finishings', $product) }}

<div class="dashboard mb-50rem">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center">
       <span>{{$product->title}}</span>
        <a href="/products/{{$product->slug}}" class="ml-3 inline-block text-xs border-b border-gray-400 text-green-500" target="_blank">View Product</a>
    </h2>

    <div class="flex space-x-10">
        {{-- Product Finishings Start From Here --}}
        <div class="rounded-lg border border-gray-200 bg-white p-4 my-6 w-1/2 overflow-x-hidden">
            @livewire('product-finishings', [
                'product' => $product,
            ])
        </div>
        {{-- Product Finishings End Here --}}


        {{-- Product Selected Finishings Start From Here --}}

        <div class="rounded-lg border border-gray-200 bg-white p-4 my-6 w-1/2">
            @livewire('product-selected-finishings', [
                'product' => $product
            ])
        </div>
        {{-- Product Finishings End Here --}}

    </div>



</div>
@endsection
@section('scripts')
    @livewireScripts
@endsection
