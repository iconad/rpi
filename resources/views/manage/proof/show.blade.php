
@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.pending-proof', $pp) }}

<div id="dashboard">

    <div class="content mt-12">
        <div class="flex justify-center">
            <div class="border border-b-0 border-gray-200 w-full text-center px-4 py-2 capitalize font-semibold text-gray-700">
                Peinding Proof
                <span class="text-gray-500">/ PP-{{$pp->id}}</span>
            </div>
        </div>
        <div class="table table-fixed w-full bg-gray-100 border border-gray-200 p-3">

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Pending Proof ID </div>
                <div> PP-{{$pp->id}}</div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Order ID </div>
                <div> ORD-{{$pp->order->id}}</div>
            </div>

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
                    @else
                    <span class="capitalize text-base leading-5 font-semibold rounded-full bg-green-100 text-green-600">
                        {{$pp->status}}
                    </span>
                    @endif
                </div>
            </div>

        </div>
    </div>


</div>


@endsection
