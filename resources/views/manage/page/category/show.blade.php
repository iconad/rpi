@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.page-category', $pageCategory) }}

<div id="dashboard">

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{$pageCategory->title}}
    </h2>
    <div class="relative">
        <form action="{{route('page-categories.update', $pageCategory->id)}}" method="post" enctype="multipart/form-data" class="w-full rounded-lg border border-gray-200 bg-white p-4">
            @csrf
            {{method_field('PUT')}}
        <div class="form-element">
            <label>
                <span class="text-gray-800 block">Title</span>
                <input class="form-input" name="title" value="{{ $pageCategory->title }}">
            </label>
        </div>
        <!-- form-ele -->

        <div class="form-element">
            <label>
                <span class="text-gray-800 block mb-2">Short Description (optional)</span>
                <textarea name="body" class="form-input" cols="30" rows="5"> {{$pageCategory->body}} </textarea>
            </label>
        </div>
        <!-- form-ele -->

        <div class="form-element">
            <change-status :status="{{$pageCategory->status}}" id="{{$pageCategory->id}}" model="page-categories"></change-status>
        </div>
        <!-- form-ele -->


        <div class="form-element mt-8">
            <input type="submit" value="Update" class="theme-button">
        </div>
        <!-- form-ele -->
        </form>
        <div class="absolute bottom-0 right-0 p-4">
            <form method="post" action="/manage/page-categories/{{$pageCategory->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="theme-button-red" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>


    {{-- Pages by category Start From Here --}}
    <div class="rounded-lg border border-gray-200 bg-white p-4 my-6">
        <div class="mb-3 text-lg font-semibold text-gray-800 mb-2 flex items-center justify-between">
            <span>Pages</span>
            <a href="/manage/page-categories/{{$pageCategory->id}}/pages/create" class="text-sm block theme-link">Add page </a>
        </div>

        <x-pagesbycategory :cid="$pageCategory->id" :pages="$pageCategory->pages" />

    </div>
    {{-- Pages by category End Here --}}


  </div>
  {{-- pagesbycategory --}}

@endsection
