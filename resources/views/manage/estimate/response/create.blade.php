@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.estimates.respones.create', $estimate) }}

<div id="dashboard">

    <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
        <span>Add New Response</span>
    </div>

    <div class="mt-5">
        <form action="/manage/estimates/{{$estimate->id}}/responses" method="post">
            @csrf
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">You are replying to</span>
                    <div class="form-input flex flex-col space-y-1">
                        <span class="block"><span class="font-semibold">Name:</span> {{$estimate->first_name}} {{$estimate->last_name}}</span>
                        <span class="block"><span class="font-semibold">Estimate ID:</span>  {{$estimate->id}}</span>
                        <span class="block"><span class="font-semibold">Product:</span> {{$estimate->product}}</span>
                        <span class="block"><span class="font-semibold">Quantity:</span> {{$estimate->quantity}}</span>
                        <span class="block"><span class="font-semibold">Size:</span> {{$estimate->size}}</span>
                    </div>
                </label>
            </div>
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Message</span>
                    <textarea name="message" cols="30" rows="10" class="form-input" required value="{{old('message')}}"></textarea>
                </label>
            </div>
            <div class="form-element">
                <input type="submit" class="theme-button" value="Submit">
            </div>


        </form>
    </div>

</div>


@endsection
