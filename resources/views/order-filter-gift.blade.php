@extends('layouts.app')

@section('content')

{{-- <section id="pageBreadcrumbs">
    <x-breadcrumbs />
</section> --}}
{{-- breadcrumbs --}}

<section class="order-filter-section my-12">
    <h1 class="text-xl lg:text-2xl font-semibold text-gray-900">
        <span>{{$product->title}}</span>
    </h1>
    <order-filter-gift
        :variants="{{ json_encode($variants) }}"
        :ptitle="{{ json_encode($product->title) }}"
        :pid="{{ json_encode($product->id) }}"
        :user="{{ json_encode(Auth::user()) }}"
        :slug="{{ json_encode($product->slug) }}"
        :menu="{{ json_encode($menu) }}"
        :category="{{ json_encode($category) }}"
        ordertype="{{$orderType}}"></order-filter-gift>
</section>



@endsection
