@extends('manage.layouts.app')

@section('content')

<div id="dashboard">

    {{ Breadcrumbs::render('category.subs.create', $category) }}

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Create Sub Category in <span class="text-sec-500">{{$category->title}}</span>
    </h2>
    <form action="{{route('sub-categories.store', $category->id)}}" method="post" enctype="multipart/form-data" class="w-full rounded-lg border border-gray-200 bg-white p-4">
        @csrf
      <div class="form-element">
          <label>
              <span class="text-gray-800 block">Category</span>
              <input class="form-input" disabled name="category_id" value="{{ $category->title }}">
          </label>
      </div>
      <!-- form-ele -->

      <div class="form-element">
        <span class="text-gray-800 block">Title</span>
        <input class="form-input" name="title" value="{{ old('name') }}">
    </div>
    <!-- form-ele -->

      <div class="form-element">
        <span class="text-gray-800 block">Sub Title</span>
        <input class="form-input" name="subtitle" value="{{ old('subtitle') }}">
    </div>
    <!-- form-ele -->

      <div class="form-element">
        <span class="text-gray-800 block">One Line Description</span>
        <input class="form-input" name="body" value="{{ old('body') }}">
    </div>
    <!-- form-ele -->

      <div class="form-element">
          <label>
              <span class="text-gray-800 block mb-2">Cover Image</span>
              <input type="file" name="image" class="focus:outline-none focus:bg-gray-200">
          </label>
      </div>
      <!-- form-ele -->

      <div class="form-element mt-8 hidden">
        <input class="custom-checkbox" name="featured" id="styled-checkbox-1" type="checkbox">
        <label for="styled-checkbox-1" class="cursor-pointer leading-none">Featured</label>
      </div>
      <!-- form-ele -->

      <div class="form-element mt-8">
          <input type="submit" value="Submit" class="theme-button">
      </div>
      <!-- form-ele -->
  </form>

  </div>


@endsection
