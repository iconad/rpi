@extends('layouts.app')

@section('content')

{{-- <section id="pageBreadcrumbs">
    <x-breadcrumbs />
</section> --}}
{{-- breadcrumbs --}}

<section class="order-filter-section my-12">
    <div class="flex items-end justify-between">
        <h1 class="text-3xl font-semibold text-gray-900">Please review your order </h1>
        <div class="font-semibold text-sm text-gray-800 border-2 border-gray-300 flex items-between items-center space-x-2">
            <span class="p-1">Order ID:</span>
            <span class="inline-block py-1 px-3 font-mono bg-gray-300 text-black">{{$order->id}}</span>
        </div>
    </div>
    <wallpaper-order-checkout :order="{{ json_encode($order) }}"></wallpaper-order-checkout>





</section>


@endsection
