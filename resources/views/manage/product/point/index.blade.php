@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('product.points', $product) }}

<div class="rounded-lg border border-gray-200 bg-white p-4 my-6">
    <h2 class="mb-3 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
        {{$product->title}}'s Points
        @if ($product->checkPoints() != 0)
        <a href="{{route('points.create', $product->id)}}" class="text-sm block theme-link">Add {{$product->checkPoints()}} more
            @if ($product->checkPoints() == 1)
            point
            @else
            points
            @endif
        </a>
        @endif
    </h2>

    <x-manage.points.index :pid="$product->id" :points="$points" />

</div>
{{-- points --}}

@endsection
