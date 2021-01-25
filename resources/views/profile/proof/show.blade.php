@extends('layouts.app')

@section('content')
    <section class="page-wrapper">

        <x-profile-header />

        <div class="content mt-12">
            <div class="flex justify-center">
                <div class="border border-b-0 border-gray-200 w-full text-center px-4 py-2 capitalize font-semibold text-gray-700">
                    Peinding Proof
                    <span class="text-gray-500">/ PP-{{$pendingProof->id}}</span>
                </div>
            </div>
            <div class="table table-fixed w-full bg-gray-100 border border-gray-200 p-3">

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Pending Proof ID </div>
                    <div> PP-{{$pendingProof->id}}</div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Order ID </div>
                    <div> ORD-{{$pendingProof->order->id}}</div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Due Ammount </div>
                    <div class="font-semibold"> {{$pendingProof->order->price_total}} AED </div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Due Ammount </div>
                    <div> {{date('d M, Y', strtotime($pendingProof->created_at))}} </div>
                </div>

                <div class="flex items-center p-2 {{$pendingProof->order->status == 'confirmed' ? '' : 'pb-0' }}">
                    <div class="w-64 font-semibold"> Status </div>
                    <div>
                        @if($pendingProof->status === 'pending')
                        <span class="capitalize text-base leading-5 font-semibold rounded-full bg-orange-100 text-orange-600">
                            {{$pendingProof->status}}
                        </span>
                        @elseif($pendingProof->status === 'declined')
                        <span class="capitalize text-base leading-5 font-semibold rounded-full bg-red-100 text-red-600">
                            {{$pendingProof->status}}
                        </span>
                        @else
                        <span class="capitalize text-base leading-5 font-semibold rounded-full bg-green-100 text-green-600">
                            {{$pendingProof->status}}
                        </span>
                        @endif
                    </div>
                </div>

                @if ($pendingProof->order->status == "confirmed")
                <div class="flex items-center px-2 pt-6 pb-4 border-t border-gray-300">
                    <div class="font-semibold">
                        <a href="/" class="theme-button rounded"> Pay Now </a>
                    </div>
                    <span class="text-xs text-gray-600"></span>
                </div>
                @endif

            </div>
        </div>

    </section>

@endsection
