@extends('manage.layouts.app')


@section('content')

{{ Breadcrumbs::render('product.variant', $product, $variant) }}

    <!-- Old Name "Packages" -->
    <!-- change to "Papers" -->


<div id="dashboard">
    <div class="w-full rounded-lg border border-gray-200 bg-white p-4 relative">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $product->title }}</h2>
        <form action="/manage/products/{{$product->id}}/variants/{{$variant->id}}" method="post" class="">
            @csrf
            {{method_field('PUT')}}

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Title</span>
                    <input type="text" class="form-input" name="title" value="{{ $variant->title }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Short Title</span>
                    <input type="text" class="form-input" name="short_title" value="{{ $variant->short_title }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Stock</span>
                    <input type="number" class="form-input" name="stock" value="{{ $variant->stock }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Price</span>
                    <input type="number" class="form-input" name="price" value="{{ $variant->price }}">
                </label>
            </div>
            <!-- form-ele -->

            {{-- @livewire('color-picker', [
                'colors' => $colors,
                'color' => $variant->color,
            ]) --}}
            @if ($product->category->menu->id != 14)
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Color </span>
                    <select name="color" class="form-input">
                        <option value="0">Select Color</option>
                        @foreach ($colors as $color)
                        @if ($variant->color AND $color->id === $variant->color->id)
                        <option selected value="{{$color->id}}"> {{$color->title}}</option>
                        @else
                        <option value="{{$color->id}}"> {{$color->title}}</option>
                        @endif
                        @endforeach
                    </select>
                </label>
            </div>
            <!-- form-ele -->
            @endif

            <div class="form-element">
                <change-status :status="{{$variant->status}}" id="{{$variant->id}}" model="variants"></change-status>
            </div>

            {{-- <div class="form-element">
            <add-product-to-variant color="{{$variant->colors->count() != 0 ? $variant->colors[0]->hex : null}}" pid="{{$product->id}}" vid="{{$variant->id}}" title="{{$variant->title}}"></add-product-to-variant>
            </div> --}}

            <div class="form-element mt-8 mb-0">
                <input type="submit" value="Updated" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>

        <div class="absolute bottom-0 right-0 p-4">
            <form method="post" action="/manage/products/{{$product->id}}/variants/{{$variant->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="theme-button-red" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>

    </div>

  </div>



    {{-- Product Points Start From Here --}}
    {{-- <div class="rounded-lg border border-gray-200 bg-white p-4 my-6"> --}}
        {{-- <x-manage.packagesizes :package="$package" :pid="$product->id" /> --}}
        {{-- <manage-prices-sizes :pid="{{$product->id}}" :pkgid="{{$package->id}}"></manage-prices-sizes> --}}
    {{-- </div> --}}
    {{-- Product Points End From Here --}}


@endsection
