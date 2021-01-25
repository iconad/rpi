@extends('layouts.app')

@section('content')

{{-- <section id="pageBreadcrumbs">
    <x-breadcrumbs />
</section> --}}
{{-- breadcrumbs --}}

<section class="order-filter-section my-12">
    <h1 class="text-xl lg:text-3xl font-semibold text-gray-900">{{$product->title}}</h1>
    <order-filter
        :currentpaper="{{ json_encode($currentPaper) }}"
        :packages="{{ json_encode($packages) }}"
        :package="{{ json_encode($package) }}"
        :ptitle="{{ json_encode($product->title) }}"
        :pid="{{ json_encode($product->id) }}"
        :user="{{ json_encode(Auth::user()) }}"
        :slug="{{ json_encode($product->slug) }}"
        :menu="{{ json_encode($menu) }}"
        ordertype="{{$orderType}}"></order-filter>
</section>



@endsection
