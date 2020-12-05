@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('product.variants', $product) }}

    <!-- Old Name "Packages" -->
    <!-- change to "Papers" -->


<div class="rounded-lg border border-gray-200 bg-white p-4 my-6">
    <h2 class="mb-3 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
        {{$product->title}}'s Variants
        <a href="{{route('variants.create', $product->id)}}" class="text-sm block theme-link">Add Variant </a>
    </h2>

    <x-manage.variants :variants="$variants" :pid="$product->id" />

</div>
{{-- points --}}

@endsection
