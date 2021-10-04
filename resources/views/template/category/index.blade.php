@extends('layouts.app')

@section('content')

<section class="pages-wrapper my-10 flex flex-col space-y-6">

    <div class="text-primary-500">
        <h1 class="text-2xl md:text-3xl font-semibold">Layout Templates</h1>
        <div class="text-xl font-medium">Need a hand?</div>
    </div>
    <div class="text-primary-500 border-t border-b border-primary-300 py-3">
        <p>Create perfect print-ready artwork with layout templates made just for you. Our templates have all the necessary marks, are FREE to download and easy to use.</p>
    </div>

    <div class="text-gray-900 text-center">
        <div class="mt-5">
            <h1 class="text-2xl font-semibold">Artwork Templates</h1>
            <div class="text-lg font-medium">Please select one of our products below</div>
        </div>
    </div>

    <div class="categories">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
            @foreach ($categories as $category)
                <a href="/layout-templates/{{$category->slug}}" class="category-box border hover:bg-orange-100 transition bg-gray-100">
                    <span class="image h-32 md:h-48 p-5 flex items-center justify-center">
                        <thumb-image-blade classess="w-4/5 md:w-full h-full object-cover" image="{{$category->media[0]->file_name}}" id="{{$category->media[0]->id}}">
                    </thumb-image-blade>
                    </span>
                    <span class="py-5 px-2 block text-center">
                        <span class="block text-xs font-medium text-gray-800">{{$category->title}}</span>
                    </span>
                </a>
            @endforeach
        </div>
    </div>



@endsection
