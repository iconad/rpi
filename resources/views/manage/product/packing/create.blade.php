@extends('manage.layouts.app')

@section('headlinks')
    @livewireStyles
@endsection

@section('content')
@php
$quantity = Array("10", "100", "200", "300", "400", "500", "600", "700", "800", "900", "1000", "2000", "5000", "10000");
$days = Array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14");
@endphp

{{ Breadcrumbs::render('manage.products.create') }}

<div id="dashboard">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Create Packing Product
    </h2>
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data"  class="w-full rounded-lg border border-gray-200 bg-white p-4">
        @csrf
        <input type="hidden" name="type" value="gift">
        <div class="form-element">
            <label>
                <span class="text-gray-800 block">Title</span>
                <input type="text" class="form-input" name="title" value="{{ old('title') }}">
            </label>
        </div>
        <!-- form-ele -->

        <div class="form-element mt-10">
            <label>
                <span class="text-gray-800 block">Delivery Time</span>
                <div class="relative">
                    <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="delivery_time" value="{{ old('delivery_time') }}">
                        @foreach ($days as $day)
                        @if ($day == 1)
                        <option class="capitalize" value="{{$day}}">{{$day}} Day</option>
                        @else
                        <option class="capitalize" value="{{$day}}">{{$day}} Days</option>
                        @endif
                        @endforeach
                      </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
            </label>
        </div>
        <!-- form-ele -->

        <div class="form-element">
            <label>
                <span class="text-gray-800 block">Custom Link</span>
                <input type="text" class="form-input" name="custom_link" value="{{ old('custom_link') }}">
            </label>
        </div>
        <!-- form-ele -->

        @php
         if(isset($product)) {
             $product = $product;
         }else{
             $product = null;
         }
        @endphp

        <!-- form-ele -->
        @livewire('select-sub-category', [
            'categories' => $categories,
            'product' => $product
        ])
        <!-- form-ele -->

        <div class="form-element">
            <label>
                <span class="text-gray-800 block mb-2">Thumbnail</span>
                <input type="file" name="image">
            </label>
        </div>
        <!-- form-ele -->

        <div class="form-element mt-8 mb-0">
            <input type="submit" value="Submit" class="theme-button">
        </div>
        <!-- form-ele -->
    </form>

  </div>


@endsection

@section('scripts')
    @livewireScripts
@endsection
