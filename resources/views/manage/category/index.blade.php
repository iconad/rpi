@extends('manage.layouts.app')

@section('content')

<div id="dashboard">

    <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
      <span>Categories</span>
      <a href="{{route('categories.create')}}" class="text-sm block theme-link">Add New Category</a>
    </div>
    <!-- CTA -->


    <!-- New Table -->
    <manage-categories></manage-categories>

</div>


@endsection
