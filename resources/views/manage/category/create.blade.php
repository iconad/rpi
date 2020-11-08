@extends('manage.layouts.app')

@section('content')

<div id="dashboard">

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Create Category
    </h2>
    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data" class="w-full rounded-lg border border-gray-200 bg-white p-4">
        @csrf
      <div class="form-element">
          <label>
              <span class="text-gray-800 block">Title</span>
              <input class="form-input" name="title" value="{{ old('name') }}">
          </label>
      </div>
      <!-- form-ele -->

      <div class="form-element">
        <span class="text-gray-800 block">Menu</span>
        <div class="relative">
            <select class="form-input text-base capitalize w-64" name="menu_id">
                @foreach ($menus as $menu)
                        <option value="{{$menu->id}}" class="capitalize"> {{$menu->title}} </option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            </div>
        </div>
    </div>
    <!-- form-ele -->

      <div class="form-element">
          <label>
              <span class="text-gray-800 block mb-2">Cover Image</span>
              <input type="file" name="image" class="focus:outline-none focus:bg-gray-200">
          </label>
      </div>
      <!-- form-ele -->

      <div class="form-element mt-8">
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
