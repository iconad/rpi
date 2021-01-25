@extends('manage.layouts.app')

@section('content')
@php
$quantity = Array("10", "100", "200", "300", "400", "500", "600", "700", "800", "900", "1000", "2000", "5000", "10000");
$days = Array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14");
@endphp

{{ Breadcrumbs::render('manage.product', $product) }}

<div class="dashboard mb-50rem">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      {{$product->title}}
    </h2>
    <div class="w-full rounded-lg border border-gray-200 bg-white p-4 relative">
        <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Title</span>
                    <input type="text" class="form-input" name="title" value="{{ $product->title }}">
                </label>
            </div>
            <!-- form-ele -->
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Navbar Heading</span>
                    <input type="text" class="form-input" name="title_two" value="{{ $product->title_two }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Points Heading</span>
                    <input type="text" class="form-input" name="points_title" value="{{ $product->body_title }}">
                </label>
            </div>
            <!-- form-ele -->
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Points Detail</span>
                    <input type="text" class="form-input" name="body_subtitle" value="{{ $product->body_subtitle }}">
                </label>
            </div>
            <!-- form-ele -->
            <div class="form-element grid grid-cols-2 gap-5">
                <div class="w-full">
                    <label>
                        <span class="text-gray-800 block mb-1">Min Quantity</span>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="min_quantity">
                                @foreach ($quantity as $qua)
                                    @if ($qua == $min_quantity)
                                    <option selected value="{{$qua}}">{{$qua}}</option>
                                    @else
                                    <option value="{{$qua}}">{{$qua}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="w-full">
                    <label>
                        <span class="text-gray-800 block mb-1">Max Quantity</span>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="max_quantity">
                                @foreach ($quantity as $qua)
                                    @if ($qua == $max_quantity)
                                    <option selected value="{{$qua}}">{{$qua}}</option>
                                    @else
                                    <option value="{{$qua}}">{{$qua}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
            <!-- form-ele -->

            <div class="form-element grid grid-cols-2 gap-5">
                <div class="w-full">
                    <label>
                        <span class="text-gray-800 block">Thumbnail</span>
                        <input type="file" name="image">
                    </label>
                </div>
                <div class="w-32">
                    <span class="text-gray-800 mb-2 block">Current Image</span>
                    <img src="{{$image}}" alt="{{$product->title}}">
                    {{-- {{ $product->getFirstMediaUrl('images') }} --}}
                    {{-- {{$image}} --}}
                </div>
            </div>
            <!-- form-ele -->

            <div class="form-element grid grid-cols-2 gap-5">
                <div class="w-full">
                    <label>
                        <span class="text-gray-800 block">Cover</span>
                        <input type="file" name="cover">
                    </label>
                </div>
                <div class="w-32">
                    @if ($cover)
                    <span class="text-gray-800 mb-2 block">Current Cover</span>
                    <img src="{{$cover}}" alt="{{$product->title}}">
                    @else
                    <span class="text-gray-800 mb-2 block">No cover</span>
                    @endif
                    {{-- {{ $product->getFirstMediaUrl('images') }} --}}
                    {{-- {{$image}} --}}
                </div>
            </div>
            <!-- form-ele -->

            <div class="form-element mt-10">
                <label>
                    <span class="text-gray-800 block">Delivery Time</span>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="delivery_time" value="{{ old('delivery_time') }}">
                            @foreach ($days as $day)
                                @if ($day == $product->delivery_time)
                                <option selected value="{{$day}}">{{$day}}
                                    @if ($day == 1) Day @else Days @endif
                                </option>
                                @else
                                <option value="{{$day}}">{{$day}}
                                    @if ($day == 1) Day @else Days @endif
                                </option>
                                @endif
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </label>
            </div>
            <!-- form-ele -->


        {{-- {{ ($product->finishings=="1") ? "selected" : "" }} --}}
        <div class="form-element mt-10">
            <label>
                <span class="text-gray-800 block">Finishings</span>
                <div class="relative">
                    <select multiple class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="finishings[]" value="{{ old('finishings') }}">
                            @foreach ($product->finishings as $fin)
                                    <option  value="{{$fin->id}}" selected >{{$fin->title}}</option>
                            @endforeach
                            @foreach ($notFinish as $fin)
                                    <option  value="{{$fin->id}}" >{{$fin->title}}</option>
                            @endforeach
                        @foreach ($notSelectedFinishings as $nf)
                        <option  value="{{$nf->id}}">{{$nf->title}}</option>
                        @endforeach
                      </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                  </div>
            </label>
        </div>
        <!-- form-ele -->

        <div class="p-5 pb-0 border rounded">
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Printing Text <small class="xs">(to show on product page)</small> </span>
                    <input type="text" class="form-input" name="printing_text" value="{{ $product->printing_text }}">
                </label>

                <div>
                    <label class="flex items-center mt-3">
                        <input value="0" type="radio" name="printing" class="h-5 w-5" {{ ($product->printing==0)? "checked" : "" }}>
                        <span class="ml-2">Only One Side Colour</span>
                    </label>
                    <label class="flex items-center mt-3">
                        <input value="1" type="radio" name="printing" class="h-5 w-5" {{ ($product->printing==1)? "checked" : "" }}>
                        <span class="ml-2">Only Two Sides Colour</span>
                    </label>
                    <label class="flex items-center mt-3">
                        <input value="2" type="radio" name="printing" class="h-5 w-5" {{ ($product->printing==2)? "checked" : "" }}>
                        <span class="ml-2">Both Sides Colour</span>
                    </label>
                </div>

            </div>
            <!-- form-ele -->
        </div>

            <div class="form-element mt-10">
                <label>
                    <span class="text-gray-800 block mb-1">Category</span>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="category_id">
                            @foreach ($categories as $catg)
                                @if ($catg->id == $product->category->id)
                                <option selected value="{{$catg->id}}">{{$catg->title}}  ({{ $catg->menu->title }})</option>
                                @else
                                <option value="{{$catg->id}}">{{$catg->title}}  ({{ $catg->menu->title }})</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element mt-10">
                <change-status :status="{{$product->status}}" id="{{$product->id}}" model="products"></change-status>
            </div>
            <!-- form-ele -->


            <div class="form-element mt-8 mb-0">
                <input type="submit" value="Update" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>

        <div class="absolute bottom-0 right-0 p-4">
            <form method="post" action="/manage/products/{{$product->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="theme-button-red" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>


    {{-- Product Label Start From Here --}}
    <div class="rounded-lg border border-gray-200 bg-white p-4 my-6">
        <div class="mb-3 text-lg font-semibold text-gray-800 mb-2">
        <span>Label</span>
    </div>
    @if (!$product->label)
    <assign-label class="mt-5" :id="{{$product->id}}" refresh="true" model="products" title="{{$product->title}}"></assign-label>
    @else
    <assigned-label-row  model="products" refresh="true" :label="{{ $product->label }}" :id="{{$product->id}}" title="{{$product->title}}"></assigned-label-row>
    @endif

    </div>
    {{-- Product Label End From Here --}}



    {{-- Product Points Start From Here --}}
    <div class="rounded-lg border border-gray-200 bg-white p-4 my-6">
        <div class="mb-3 text-lg font-semibold text-gray-800 mb-2 flex items-center justify-between">
        <span>Points</span>
        @if ($product->checkPoints() != 0)
        <a href="{{route('points.create', $product->id)}}" class="text-sm block theme-link">Add {{$product->checkPoints()}} more
            @if ($product->checkPoints() == 1) point @else points @endif
        </a>
        @endif
        </div>
        <x-manage.points.index :pid="$product->id" :points="$points" />
    </div>
    {{-- Product Points End From Here --}}




    {{-- Product Points Start From Here --}}
    <div class="rounded-lg border border-gray-200 bg-white p-4 my-6">
        <div class="mb-3 text-lg font-semibold text-gray-800 mb-2 ">
        <span>Gallery</span>
        <manage-product-gallery pid="{!! $product->id !!}"></manage-product-gallery>
    </div>
    {{-- Product Points End From Here --}}


        {{-- Product Points Start From Here --}}
        <div class="rounded-lg border border-gray-200 bg-white p-4 my-6">
            <div class="mb-3 text-lg font-semibold text-gray-800 mb-2 flex items-center justify-between">
                <span>Packages</span>
                <a href="{{route('packages.create', $product->id)}}" class="text-sm block theme-link">Add Package </a>
            </div>
            <x-manage.packages :packages="$product->packages" :pid="$product->id" />
        </div>
        {{-- Product Points End From Here --}}



</div>
@endsection
