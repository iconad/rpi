@extends('layouts.app')

@section('content')

{{-- <section id="pageBreadcrumbs">
    <x-breadcrumbs />
</section> --}}
{{-- breadcrumbs --}}

<section class="order-filter-section my-12">
    <div>
        <h1 class="text-3xl font-semibold text-gray-900">Upload your design <a href="#" class="text-sm text-gray-700 hover:underline">Read data submission guidelines</a> </h1>
    </div>
    <upload-your-design></upload-your-design>
</section>



@endsection
