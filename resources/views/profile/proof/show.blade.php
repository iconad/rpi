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

                @if ($pendingProof->order->transaction_id)
                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Transaction ID </div>
                    <div> {{$pendingProof->order->transaction_id}}</div>
                </div>
                @endif

                @if ($pendingProof->order->price_modified)
                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Old Price </div>
                    <div class="text-gray-600 line-through"> {{$pendingProof->order->price_old}} AED </div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Modified Price </div>
                    <div> {{$pendingProof->order->price_modified}} AED </div>
                </div>

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Modification reason </div>
                    <div class="text-red-500 text-medium"> Your price has been modifified, {{$pendingProof->order->price_modification_reason}} </div>
                </div>
                @endif

                <div class="flex items-center border-b border-gray-300 p-2">
                    <div class="w-64 font-semibold"> Due Amount </div>
                    <div class="font-semibold"> {{$pendingProof->order->price_total}} AED </div>
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
                        @elseif($pendingProof->status === 'approved')
                        <span class="capitalize text-base leading-5 font-semibold rounded-full bg-blue-100 text-blue-600">
                            {{$pendingProof->status}}
                        </span>
                        @else
                        <span class="capitalize text-base leading-5 font-semibold rounded-full bg-green-100 text-green-600">
                            {{$pendingProof->status}}
                        </span>
                        @endif
                    </div>
                </div>

                @if ($pendingProof->status != "paid" && $pendingProof->status == "approved")
                    <payment-form username="{{ auth()->user()->name }}" userid="{{ auth()->user()->id }}" email="{{ auth()->user()->email }}" oid="{{$pendingProof->order->id}}" oprice="{{$pendingProof->order->price_total}}"></payment-form>
                @endif

            </div>
        </div>

    </section>

@endsection
