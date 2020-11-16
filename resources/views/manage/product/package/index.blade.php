@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('product.packages', $product) }}

    <!-- Old Name "Packages" -->
    <!-- change to "Papers" -->


<div class="rounded-lg border border-gray-200 bg-white p-4 my-6">
    <h2 class="mb-3 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
        {{$product->title}}'s Papers
        <a href="{{route('packages.create', $product->id)}}" class="text-sm block theme-link">Add Papers </a>
    </h2>

    <x-manage.packages :packages="$packages" :pid="$product->id" />

</div>
{{-- points --}}

@endsection
