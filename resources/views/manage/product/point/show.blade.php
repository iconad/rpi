@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('product.point', $product, $point) }}

<div id="dashboard">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Edit {{ $point->title }}
    </h2>
    <div class="relative w-full rounded-lg border border-gray-200 bg-white p-4">
        <form action="/manage/products/{{$product->id}}/points/{{$point->id}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Title</span>
                    <input type="text" class="form-input" name="title" value="{{ $point->title }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Detail</span>
                    <textarea type="text" class="form-input" rows="3" name="detail"> {{ $point->body }} </textarea>
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element grid grid-cols-2 md:grid-cols-4 gap-5">
                <label>
                    <span class="text-gray-800 block mb-2">Select Icon</span>
                    <input type="file" name="icon">
                </label>
                <div class="w-32">
                    <span class="mb-2 text-gray-800 block">Current Icon</span>
                    {{-- {{$point->getMedia()}} --}}
                    {{ $point->getFirstMedia('images') }}
                </div>
            </div>
            <!-- form-ele -->

            <div class="form-element mt-8 mb-0">
                <input type="submit" value="Submit" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>
        <div class="absolute bottom-0 right-0 p-4">
            <form method="post" action="/manage/products/{{$product->id}}/points/{{$point->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="theme-button-red" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

  </div>


@endsection
