@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.products') }}

<div id="dashboard">

    <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
      <span>All Products</span>
      <a href="{{route('select_product_type')}}" class="text-sm block theme-link">Add New Product</a>
    </div>
    <!-- CTA -->


    <!-- New Table -->
    <manage-products></manage-products>

</div>


@endsection
