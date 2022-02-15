
@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.pending-proof', $pp) }}

<div id="dashboard">

    <div class="content mt-12">
        <div class="flex justify-center">
            <div class="border border-b-0 border-gray-200 w-full text-center px-4 py-2 capitalize font-semibold text-gray-700">
                Pending Proof
                <span class="text-gray-500">/ PP-{{$pp->id}}</span>
            </div>
        </div>
        <div class="table table-fixed w-full bg-gray-100 border border-gray-200 p-3">

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Pending Proof ID </div>
                <div> PP-{{$pp->id}}</div>
            </div>

            @if ($pp->order)
            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Order ID </div>
                <div class="flex space-x-10 items-center">
                    <span class="block">ORD-{{$pp->order->id}}</span>
                    <a href="/manage/orders/{{$pp->order->id}}" class="block text-xs font-semibold theme-link text-blue-500" target="_blank"> Go to order </a>
                </div>
            </div>
            @endif

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Due Ammount </div>
                <div class="font-semibold"> {{$pp->order->price_total}} AED </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Due Ammount </div>
                <div> {{date('d M, Y', strtotime($pp->created_at))}} </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> User </div>
                <div>
                    <a href="/manage/users/{{ $pp->user->id }}" class="hover:underline hover:text-red-500">{{ $pp->user->name }}</a>
                </div>
            </div>

            <div class="flex items-center p-2 {{$pp->order->status == 'confirmed' ? '' : 'pb-0' }}">
                <div class="w-64 font-semibold"> Status </div>
                <div>

                    @if($pp->status === 'pending')
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-orange-100 text-orange-600">
                        {{$pp->status}}
                    </span>
                    @elseif($pp->status === 'declined')
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-red-100 text-red-600">
                        {{$pp->status}}
                    </span>
                    @elseif($pp->status === 'approved')
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-blue-100 text-blue-600">
                        {{$pp->status}}
                    </span>
                    @else
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-green-100 text-green-600">
                        {{$pp->status}}
                    </span>
                    @endif
                </div>
            </div>
        </div>

        @if ($pp->status != 'approved' && $pp->status != 'paid')
        <div class="mt-5 border border-gray-200 w-full p-4">

            <div class="font-semibold capitalize mb-5">Update Quote</div>

            <form action="/manage/pending-proofs/{{$pp->id}}" method="post" >

                @csrf
                {{method_field('PUT')}}

                <div class="form-element space-x-5">
                    <label class="space-x-1">
                        <input type="radio" name="status" value="approved" checked>
                        <span class="font-medium">Approved </span>
                    </label>
                    <label class="space-x-1">
                        <input type="radio" name="status" value="declined">
                        <span class="font-medium">Declined </span>
                    </label>
                </div>

                <div class="form-element">
                    <label>
                        <span class="font-medium">Price <small class="text-gray-700">(You can update price, ask for new price)</small> </span>
                        <input type="text" name="price" class="form-input" value="{{ $pp->order->price_total }}">
                    </label>
                </div>

                <div class="form-element">
                    <span class="font-medium">Message</span>
                    <textarea rows="5" name="message" class="form-input"></textarea>
                </div>
                <div class="form-element">
                    <input type="submit" value="Send" class="theme-button inline-block w-auto px-10">
                </div>

            </form>
        </div>
        @endif

    </div>


</div>


@endsection
