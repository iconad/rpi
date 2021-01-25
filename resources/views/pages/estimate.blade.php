@extends('layouts.app')

@section('content')

<section class="pages-wrapper my-10">

    <div class="pages-cover h-22rem relative bg-no-repeat bg-center bg-cover" style="background-image: url({{asset('/images/estimate-cover.jpg')}})">
    </div>
    {{-- pages cover --}}

    <div class="mt-12 text-gray-900">
        <p class="text-3xl font-semibold mb-1">Estimate</p>
        <p class="text-base">You cannot find what you are looking for? Please fill in the form.</p>
    </div>

    <div class="mt-12 text-gray-900">
        <estimate-form></estimate-form>
    </div>


</section>


@endsection
