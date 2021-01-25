@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('product.variants.create', $product) }}

             <!-- Old Name "Packages" -->
            <!-- change to "Paper" -->

<div id="dashboard">
    <div class="w-full rounded-lg border border-gray-200 bg-white p-4">
        <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">Create Variant to {{ $product->title }}</h2>
        <form action="{{route('variants.store', $product->id)}}" method="post" class="">
            @csrf


            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Title</span>
                    <input type="text" class="form-input" name="title" value="{{ old('title') }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Short Title</span>
                    <input type="text" class="form-input" name="short_title" value="{{ old('short_title') }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Stock</span>
                    <input type="number" class="form-input" name="stock" value="{{ old('stock') }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Price</span>
                    <input type="number" class="form-input" name="price" value="{{ old('price') }}">
                </label>
            </div>
            <!-- form-ele -->

            {{-- @livewire('color-picker', [
                'colors' => $colors
                'color' => $colors[0]
            ]) --}}
            @if ($product->category->menu->id != 14)
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Color </span>
                    <select  name="color" class="form-input">
                        {{-- <option value="{{{ null }}}">Select Color</option> --}}
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}"> {{$color->title}} </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <!-- form-ele -->
            @endif

            <div class="form-element mt-8 mb-0">
                <input type="submit" value="Submit" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>
    </div>

  </div>


@endsection
