@extends('manage.layouts.app')

@section('headlinks')
    @livewireStyles
@endsection

@section('content')

{{ Breadcrumbs::render('manage.categories.create') }}


@livewire('create-slider', [
    'products' => $products
])

@endsection

@section('scripts')
    @livewireScripts
@endsection
