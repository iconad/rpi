@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('product.points.create', $product) }}

{{-- {{$product->points)}} --}}


<div id="dashboard">
    <div class="w-full rounded-lg border border-gray-200 bg-white p-4">
        @if ($product->checkPoints() <= 0)
        <div>You can add only 4 points to one pruduct!</div>
        @else
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Add Point to {{ $product->title }}</h2>
        <form action="{{route('points.store', $product->id)}}" method="post" enctype="multipart/form-data"  class="">
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
                    <span class="text-gray-800 block">Detail</span>
                    <textarea type="text" class="form-input" rows="3" name="detail"> {{ old('detail') }} </textarea>
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Icon</span>
                    <input type="file" name="icon">
                </label>
            </div>
            <!-- form-ele -->


            <div class="form-element mt-8 mb-0">
                <input type="submit" value="Submit" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>
        @endif
    </div>

  </div>


@endsection
