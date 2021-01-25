@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('category.sub', $category, $subCategory) }}

<div id="dashboard">

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{$subCategory->title}}
    </h2>
    <div class="rounded-lg border border-gray-200 bg-white p-4 flex items-end justify-between mb-6">
        <form action="/manage/categories/{{$category->id}}/sub-categories/{{$subCategory->id}}" method="post" enctype="multipart/form-data" class="w-full md:w-4/5">
            {{method_field('PUT')}}
                @csrf
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Title</span>
                    <input class="form-input" disabled name="category_id" value="{{ $category->title }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Title</span>
                    <input class="form-input" name="title" value="{{ $subCategory->title }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Sub Title</span>
                    <input class="form-input" name="subtitle" value="{{ $subCategory->subtitle }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">One Line Description</span>
                    <input class="form-input" name="body" value="{{ $subCategory->body }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <div class="mb-3">
                    <img src="{{ $image }}" class="w-32" />
                    </div>
                <label>
                    <span class="text-gray-800 block mb-2">Cover Image</span>
                    <input type="file" name="image" class="focus:outline-none focus:bg-gray-200">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element mt-8 hidden">

                @if ($subCategory->featured != 0)
                    <input checked class="custom-checkbox" name="featured" id="styled-checkbox-1" type="checkbox">
                @else
                    <input class="custom-checkbox" name="featured" id="styled-checkbox-1" type="checkbox">
                @endif
                <label for="styled-checkbox-1" class="cursor-pointer leading-none">Featured</label>
            </div>
            <!-- form-ele -->




            <div class="form-element mt-8">
                <change-status :status="{{$subCategory->status}}" id="{{$subCategory->id}}" model="subcategories"></change-status>
            </div>
            <!-- form-ele -->

            <div class="form-element mt-8 mb-0">
                <input type="submit" value="Update" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>

        <div class="form-element mt-8 mb-0 w-auto bg-red-100">
            <form method="post" action="/manage/categories/{{$subCategory->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="theme-button-red" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>

    </div>
    {{-- single categery form end here --}}

    <sub-category-extra id="{!! json_encode($subCategory->id) !!}"></sub-category-extra>

  </div>


@endsection
