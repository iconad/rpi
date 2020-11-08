@extends('layouts.app')

@section('content')

<section id="pageBreadcrumbs">
    <x-breadcrumbs />
</section>
{{-- breadcrumbs --}}

<section class="my-10">
    <x-frontend.profile-navbar />
</section>
{{-- breadcrumbs --}}

<section class="order-filter-section">
    <profile-orders></profile-orders>
</section>



@endsection
