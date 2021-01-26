@extends('manage.layouts.app')

@section('content')

{{-- {{ Breadcrumbs::render('manage.page-category', $page) }} --}}

<div id="dashboard">

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{$page->title}}
    </h2>
    <div class="relative">
        <form action="/manage/page-categories/{{$cid}}/pages/{{$page->id}}" method="post" enctype="multipart/form-data" class="w-full rounded-lg border border-gray-200 bg-white p-4">
            @csrf
            {{method_field('PUT')}}
        <div class="form-element">
            <label>
                <span class="text-gray-800 block text-sm font-medium">Copy URL</span>
               <div class="flex items-center space-x-5 mt-3">
                   <div class="bg-gray-200 rounded px-3 py-1 tracking-wide"> pages/{{$page->slug}} </div>
                   <a href="{{ url("pages/$page->slug") }}" target="_blank" class="cursor-pointer action-button-info text-sm"> Visit Page </a>
               </div>
            </label>
        </div>
        <!-- form-ele -->
        <div class="form-element">
            <label>
                <span class="text-gray-800 block">Title</span>
                <input class="form-input" name="title" value="{{ $page->title }}">
            </label>
        </div>
        <!-- form-ele -->

        <div class="form-element">
            <label>
                <span class="text-gray-800 block">Short Title</span>
                <input class="form-input" name="short_title" value="{{ $page->short_title }}">
            </label>
        </div>
        <!-- form-ele -->

        <div class="form-element">
            <label>
                <span class="text-gray-800 block mb-2">HTML Code</span>
                <textarea name="body" class="form-input" cols="30" rows="15"> {!! $page->body !!} </textarea>
            </label>
        </div>
        <!-- form-ele -->

        <div class="form-element">
            <change-status :status="{{$page->status}}" id="{{$cid}}" id2="{{$page->id}}" model="page-categories" model2="pages"></change-status>
        </div>
        <!-- form-ele -->


        <div class="form-element mt-8">
            <input type="submit" value="Update" class="theme-button">
        </div>
        <!-- form-ele -->
        </form>
        <div class="absolute bottom-0 right-0 p-4">
            <form method="post" action="/manage/page-categories/{{$page->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="theme-button-red" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>


  </div>
  {{-- pagesbycategory --}}

@endsection
