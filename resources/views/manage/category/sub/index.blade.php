@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('category.subs', $category) }}

<div id="dashboard">


    <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
      <span> {{$category->title}} Sub Categories</span>
      <a href="/manage/categories/{{$category->id}}/sub-categories/create" class="text-sm block theme-link">Add New Sub Category</a>
    </div>
    <!-- CTA -->


    <!-- New Table -->
    <manage-sub-categories :cid="{{$category->id}}"></manage-sub-categories>

</div>


@endsection
