@extends('manage.layouts.app')

@section('content')

<div id="dashboard">

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{$category->title}}
    </h2>
    <div class="rounded-lg border border-gray-200 bg-white p-4 flex items-end justify-between mb-6">
        <form action="{{route('categories.update', $category->id)}}" method="post" enctype="multipart/form-data" class="w-full md:w-4/5">
            {{method_field('PUT')}}
                @csrf
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Title</span>
                    <input class="form-input" name="title" value="{{ $category->title }}">
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

            <div class="form-element mt-8">

                @if ($category->featured != 0)
                    <input checked class="custom-checkbox" name="featured" id="styled-checkbox-1" type="checkbox">
                @else
                    <input class="custom-checkbox" name="featured" id="styled-checkbox-1" type="checkbox">
                @endif
                <label for="styled-checkbox-1" class="cursor-pointer leading-none">Featured</label>
            </div>
            <!-- form-ele -->


            <div class="form-element">
                <span class="text-gray-800 block">Menu</span>
                <div class="relative">
                    <select class="form-input text-base capitalize w-64" name="menu_id">
                        @foreach ($menus as $menu)
                            @if ($category->menu && $category->menu->id == $menu->id)
                                <option value="{{$menu->id}}" class="capitalize" selected> {{$menu->title}} </option>
                            @else
                                <option value="{{$menu->id}}" class="capitalize"> {{$menu->title}} </option>
                            @endif
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    </div>
                </div>
            </div>
            <!-- form-ele -->

            <div class="form-element mt-8">
                <change-status status="{{$category->status}}" id="{{$category->id}}" model="categories"></change-status>
            </div>
            <!-- form-ele -->

            <div class="form-element mt-8 mb-0">
                <input type="submit" value="Submit" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>

        <div class="form-element mt-8 mb-0 w-auto bg-red-100">
            <form method="post" action="/manage/categories/{{$category->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="theme-button-red" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>

    </div>
    {{-- single categery form end here --}}

    <category-extra id="{!! json_encode($category->id) !!}"></category-extra>

  </div>


@endsection
