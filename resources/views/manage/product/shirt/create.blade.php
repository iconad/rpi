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
      Create Shirt
    </h2>
    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data"  class="w-full rounded-lg border border-gray-200 bg-white p-4">
        @csrf
        <input type="hidden" name="type" value="shirt">
        <div class="form-element">
            <label>
                <span class="text-gray-700 block font-medium">Title</span>
                <input type="text" class="form-input" name="title" value="{{ old('title') }}">
            </label>
        </div>
        <!-- form-ele -->
        <div class="form-element">
            <label>
                <span class="text-gray-700 block font-medium">Unique ID</span>
                <input type="text" class="form-input" name="unique_code" placeholder="00083-BBT-001" value="{{ old('unique_code') }}">
            </label>
        </div>
        <!-- form-ele -->
        <div class="form-element">
            <span class="text-gray-700 block font-medium">Brand</span>
            <div class="relative">
            <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="brand" value="{{ old('brand') }}">
                <option value="Printstar">Printstar</option>
                <option value="other">Other Brand</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
            </div>
        </div>
        <!-- form-ele -->
        <div class="form-element">
            <span class="text-gray-700 block font-medium">Color</span>
            @livewire('select-color-checkbox', [
                'options' => $colors,
                'title' => "hex",
                'name' => 'color',
                'model' => null
            ])
        </div>
        <!-- form-ele -->

        <div class="form-element">

            <span class="text-gray-700 block font-medium">Gender</span>

            <div class="flex gap-3 mt-2">

                <div>
                    <label class="flex items-center space-x-3">
                        <input type="radio" class="w-5 h-5" name="gender" required value="male">
                        <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                            Male
                        </span>
                    </label>
                </div>

                <div>
                    <label class="flex items-center space-x-3">
                        <input type="radio" class="w-5 h-5" name="gender" required value="female">
                        <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                            Female
                        </span>
                    </label>
                </div>

                <div>
                    <label class="flex items-center space-x-3">
                        <input type="radio" class="w-5 h-5" name="gender" required value="kids">
                        <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                            kids
                        </span>
                    </label>
                </div>

                <div>
                    <label class="flex items-center space-x-3">
                        <input type="radio" class="w-5 h-5" name="gender" required value="infents">
                        <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                            infents
                        </span>
                    </label>
                </div>

                <div>
                    <label class="flex items-center space-x-3">
                        <input type="radio" class="w-5 h-5" name="gender" required value="female">
                        <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                            Unisex
                        </span>
                    </label>
                </div>

            </div>
        </div>
        <!-- form-ele -->

        <div class="form-element">

            <span class="text-gray-700 block font-medium">Neck</span>

            <div class="flex gap-3 mt-2">

                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" name="neck" required value="v neck">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        V Neck
                    </span>
                </label>
                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" name="neck" required value="u neck">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        U Neck
                    </span>
                </label>
                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" name="neck" required value="round neck">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        Round Neck
                    </span>
                </label>

            </div>
        </div>
        <!-- form-ele -->

        <div class="form-element">

            <span class="text-gray-700 block font-medium">Materials</span>

            <div class="flex gap-3 mt-2">

                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" required name="material" value="cotton">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        cotton
                    </span>
                </label>
                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" required name="material" value="polyester">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        polyester
                    </span>
                </label>
                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" required name="material" value="polyurethane">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        polyurethane
                    </span>
                </label>
                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" required name="material" value="linen">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        linen
                    </span>
                </label>

            </div>
        </div>
        <!-- form-ele -->

        <div class="form-element">

            <span class="text-gray-700 block font-medium">Type</span>

            <div class="flex gap-3 mt-2">

                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" required name="cloth_type" value="t shirt">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        T Shirt
                    </span>
                </label>
                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" required name="cloth_type" value="polo shirt">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        Polo Shirt
                    </span>
                </label>
                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" required name="cloth_type" value="long sleeves">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        Long Sleeves
                    </span>
                </label>
                <label class="flex items-center space-x-3">
                    <input type="radio" class="w-5 h-5" required name="cloth_type" value="sleeve-less">
                    <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                        Sleeve-less
                    </span>
                </label>

            </div>
        </div>
        <!-- form-ele -->


        <div class="form-element mt-10">
            <label>
                <span class="text-gray-700 block font-medium">Delivery Time</span>
                <div class="relative">
                    <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="delivery_time" value="{{ old('delivery_time') }}">
                        @foreach ($days as $day)
                        @if ($day == 1)
                        <option value="{{$day}}">{{$day}} Day</option>
                        @else
                        <option value="{{$day}}">{{$day}} Days</option>
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
                <span class="text-gray-700 block font-medium mb-2">Thumbnail</span>
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
