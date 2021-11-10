@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('product.packages.create', $product) }}

    <!-- Old Name "Packages" -->
    <!-- change to "Paper" -->

<div id="dashboard">
    <div class="w-full rounded-lg border border-gray-200 bg-white p-4">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Add Paper to {{ $product->title }}</h2>
        <form action="{{route('packages.store', $product->id)}}" method="post" class="">
            @csrf

            <div class="form-element">

                <span class="text-gray-800 block">Select Paper</span>

                {{-- <datalist-dropdown :data="{{json_encode($papers)}}"></datalist-dropdown> --}}

                @livewire('datalist-dropdown', [
                    'collection' => $papers,
                    'paperId' => null
                ])

            </div>
            <!-- form-ele -->

            <div class="form-element mt-8 mb-0">
                <input type="submit" value="Submit" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>
    </div>

  </div>


@endsection
