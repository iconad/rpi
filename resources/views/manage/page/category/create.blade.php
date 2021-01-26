@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.page-categories.create') }}

<div id="dashboard">

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Create Category
    </h2>
    <form action="{{route('page-categories.store')}}" method="post" enctype="multipart/form-data" class="w-full rounded-lg border border-gray-200 bg-white p-4">
        @csrf
      <div class="form-element">
          <label>
              <span class="text-gray-800 block">Title</span>
              <input class="form-input" name="title" value="{{ old('name') }}">
          </label>
      </div>
      <!-- form-ele -->

      <div class="form-element">
          <label>
              <span class="text-gray-800 block mb-2">Short Description (optional) </span>
              <textarea name="body" class="form-input" cols="30" rows="5"></textarea>
          </label>
      </div>
      <!-- form-ele -->


      <div class="form-element mt-8">
          <input type="submit" value="Submit" class="theme-button">
      </div>
      <!-- form-ele -->
  </form>

  </div>


@endsection
