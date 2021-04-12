@extends('layouts.app')

@section('content')

{{-- <section id="pageBreadcrumbs">
    <x-breadcrumbs />
</section> --}}
{{-- breadcrumbs --}}

<section class="order-filter-section my-12">
    <h1 class="text-xl lg:text-2xl font-semibold text-gray-900">
        <span class="text-base text-gray-500">{{$subCategory->category->title}}</span> /
        <span>{{$subCategory->title}}</span>
    </h1>
    <order-filter-shirt
        :subcategory="{{ json_encode($subCategory) }}"
        :productsbycategory="{{ json_encode($products) }}"
        :user="{{ json_encode(Auth::user()) }}"
        :menu="{{ json_encode($subCategory->category->menu) }}"
        :images="{{ json_encode($product->getMedia('product-gallery')) }}"
        ordertype="{{$orderType}}"></order-filter-shirt>
</section>



@endsection
