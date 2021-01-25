
@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.estimate', $estimate) }}

<div id="dashboard">

    <div class="content mt-12 mb-32">
        <div class="flex justify-center">
            <div class="border border-b-0 border-gray-200 w-full text-center px-4 py-2 capitalize font-semibold text-gray-700">
                {{$estimate->first_name}}
                <span class="text-gray-500 lowercase">/ {{$estimate->email}}</span>
            </div>
        </div>

        <div class="table table-fixed w-full bg-gray-100 border border-gray-200 p-3">

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Estimate ID </div>
                <div> {{$estimate->id}}</div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold">First Name </div>
                <div> {{ $estimate->first_name }} </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold">Last Name </div>
                <div> {{ $estimate->last_name }} </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold">Email </div>
                <div> {{ $estimate->email }} </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold">Phone </div>
                <div> {{ $estimate->phone }} </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold">Product </div>
                <div> {{ $estimate->product }} </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold">Quantity </div>
                <div> {{ $estimate->quantity }} </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold">Size </div>
                <div> {{ $estimate->size }} </div>
            </div>

            <div class="flex flex-wrap items-center p-2 pb-0">
                <div class="w-64 mb-1 font-semibold">Detail </div>
                <div class="w-full"> {{ $estimate->detail }} </div>
            </div>

        </div>


        <div class="table table-fixed w-full bg-gray-100 border border-gray-200 p-3 mt-5">

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Responses </div>
            </div>

            @foreach ($estimate->responses as $response)
            <div class="mt-5">
                <div class="w-64 mb-1 text-gray-600"> {{date('d M, Y - H:m:s', strtotime($response->created_at))}} </div>
                <div class="w-full"> {{ $response->message }} </div>
            </div>
            @endforeach

        </div>

        <div class="mt-6">
            <a href="/manage/estimates/{{$estimate->id}}/responses/create" class="theme-button py-2">Add New Responsive</a>
        </div>





</div>


@endsection
