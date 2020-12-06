@extends('layouts.app')

@section('content')

{{-- <section id="pageBreadcrumbs">
    <x-breadcrumbs />
</section> --}}
{{-- breadcrumbs --}}

<section class="order-filter-section my-12">
    <h1 class="text-xl lg:text-3xl font-semibold text-gray-900">Standard Business Cards Order</h1>
    <order-filter></order-filter>
</section>



@endsection
