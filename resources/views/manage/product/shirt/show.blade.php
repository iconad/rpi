@extends('manage.layouts.app')
@section('headlinks')
    @livewireStyles
@endsection
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
                    <span class="text-gray-800 block">Title</span>
                    <input type="text" class="form-input" placeholder="00083-BBT-001" name="unique_code" value="{{ $product->unique_code }}">
                </label>
            </div>
            <!-- form-ele -->
            <div class="form-element">
                @php
                    $brands = ['printstar', 'other'];
                @endphp
                <span class="text-gray-700 block font-medium">Brand</span>
                <div class="relative">
                <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="brand" value="{{ old('brand') }}">
                    @foreach ($brands as $item)
                    @if ($item == $product->brand)
                    <option selected value="{{$item}}">{{$item}}</option>
                    @else
                    <option value="{{$item}}">{{$item}}</option>
                    @endif
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
                </div>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <span class="text-gray-700 block font-medium">Color</span>
                @livewire('select-color-checkbox', [
                    'options' => $colors,
                    'title' => "hex",
                    'name' => 'color',
                    'model' => $product
                ])
            </div>
            <!-- form-ele -->

            <div class="form-element">
                @php
                    $genders = ['male', 'female', 'child', 'infents', 'unisex'];
                @endphp
                <span class="text-gray-700 block font-medium">Gender</span>
                <div class="flex gap-3 mt-2">

                    @foreach ($genders as $item)
                    <div>

                        <label class="flex items-center space-x-3">

                        @if ($item == $product->gender)
                        <input checked type="radio" class="w-5 h-5" name="gender" required value="{{$item}}">
                        @else
                        <input type="radio" class="w-5 h-5" name="gender" required value="{{$item}}">
                        @endif
                        <span class="block capitalize text-center mt-1 font-medium capitalize text-gray-500 text-base">
                            {{$item}}
                        </span>
                        </label>
                    </div>
                    @endforeach

                </div>
            </div>
            <!-- form-ele -->

            <div class="form-element">

                @php
                    $necks = ['v neck', 'u neck', 'round neck'];
                @endphp

                <span class="text-gray-700 block font-medium">Neck</span>

                <div class="flex gap-3 mt-2">
                    @foreach ($necks as $item)
                    <label class="flex items-center space-x-3">
                        @if ($item == $product->neck)
                        <input checked type="radio" class="w-5 h-5" name="neck" required value="v neck">
                        @else
                        <input type="radio" class="w-5 h-5" name="neck" required value="{{$item}}">
                        @endif
                        <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                            {{$item}}
                        </span>
                    </label>
                    @endforeach


                </div>
            </div>
            <!-- form-ele -->

            <div class="form-element">

                @php
                    $materials = ['cotton', 'polyester', 'polyurethane', 'linen'];
                @endphp

                <span class="text-gray-700 block font-medium">Materials</span>

                <div class="flex gap-3 mt-2">

                    @foreach ($materials as $item)
                    <label class="flex items-center space-x-3">
                        @if ($item == $product->material)
                        <input checked type="radio" class="w-5 h-5" required name="material" value="{{$item}}">
                        @else
                        <input type="radio" class="w-5 h-5" required name="material" value="{{$item}}">
                        @endif

                        <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                            {{$item}}
                        </span>
                    </label>
                    @endforeach

                </div>
            </div>
            <!-- form-ele -->

            <div class="form-element">

                @php
                    $types = ['t shirt', 'polo shirt', 'long sleeves', 'sleeve-less'];
                @endphp

                <span class="text-gray-700 block font-medium">Type</span>

                <div class="flex gap-3 mt-2">

                    @foreach ($types as $item)
                    <label class="flex items-center space-x-3">
                        @if ($item == $product->cloth_type)
                        <input checked type="radio" class="w-5 h-5" required name="cloth_type" value="t shirt">
                        @else
                        <input type="radio" class="w-5 h-5" required name="cloth_type" value="{{$item}}">
                        @endif

                        <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                            {{$item}}
                        </span>
                    </label>
                    @endforeach

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
                @if ($image != null)
                <div class="w-32">
                    <span class="text-gray-800 mb-2 block">Current Image</span>
                    <img src="{{$image}}" alt="{{$product->title}}">
                </div>
                @else
                    <span class="text-gray-800 mb-2 block">No Image</span>
                @endif

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

            <!-- form-ele -->
            @livewire('select-sub-category', [
                'categories' => $categories,
                'product' => $product
            ])
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
        <div class="mb-3 text-lg font-semibold text-gray-800 mb-2 ">
        <span>Gallery</span>
        <manage-product-gallery pid="{!! $product->id !!}"></manage-product-gallery>
    </div>
    {{-- Product Points End From Here --}}




        {{-- Product Points Start From Here --}}
        <div class="rounded-lg border border-gray-200 bg-white p-4 my-6">
            <div class="mb-3 text-lg font-semibold text-gray-800 mb-2 flex items-center justify-between">
                <span>Variants</span>
                <a href="{{route('variants.create', $product->id)}}" class="text-sm block theme-link">Add Variant </a>
            </div>
            <x-manage.variants :variants="$product->variants" :pid="$product->id" />
        </div>
        {{-- Product Points End From Here --}}



</div>
@endsection
@section('scripts')
    @livewireScripts
@endsection
