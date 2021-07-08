@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.select_product_type') }}

<div id="dashboard">

    <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
      <span>Select Product Type</span>
    </div>

    <div class="grid grid-cols-5 gap-3">
        <a href="{{route('products.create')}}"
        class="hover:bg-transparent hover:border-primary-200 border transition border-gray-200 rounded flex items-center justify-center text-xl bg-white h-24 xxl:h-32 w-full text-sm block">Print Product</a>
        <a href="{{route('products.create')}}"
        class="hover:bg-transparent hover:border-primary-200 border transition border-gray-200 rounded flex items-center justify-center text-xl bg-white h-24 xxl:h-32 w-full text-sm block">Banner Display</a>
        <a href="{{route('products.packing.create')}}"
        class="hover:bg-transparent hover:border-primary-200 border transition border-gray-200 rounded flex items-center justify-center text-xl bg-white h-24 xxl:h-32 w-full text-sm block">Packing</a>
        <a href="{{route('products.gift.create')}}"
        class="hover:bg-transparent hover:border-primary-200 border transition border-gray-200 rounded flex items-center justify-center text-xl bg-white h-24 xxl:h-32 w-full text-sm block">Personalize Gift</a>
        <a href="{{route('products.shirt.create')}}"
        class="hover:bg-transparent hover:border-primary-200 border transition border-gray-200 rounded flex items-center justify-center text-xl bg-white h-24 xxl:h-32 w-full text-sm block">T-Shirt</a>
    </div>


</div>


@endsection
