@extends('layouts.app')

@section('content')
    <section class="page-wrapper">

        <x-profile-header />
        <div class="content mt-12">
            <table class="table table-fixed w-full">
                <thead>
                    <tr class="text-left">
                        <th class="border border-gray-300 p-3">Order ID</th>
                        <th class="border border-gray-300 p-3">Order Title</th>
                        <th class="border border-gray-300 p-3">status</th>
                        <th class="border border-gray-300 p-3">Date</th>
                        <th class="border border-gray-300 p-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pps as $pp)
                    <tr>
                        <td class="border border-gray-300 p-3 font-semibold text-gray-700"> {{$pp->order->id}} </td>
                        <td class="border border-gray-300 p-3 text-gray-800 capitalize"> {{$pp->order->product->title}} </td>
                        <td class="border border-gray-300 p-3 text-gray-800">
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
                         </td>
                        <td class="border border-gray-300 p-3 text-gray-800"> {{date('d M, Y', strtotime($pp->created_at))}} </td>
                        <td class="border border-gray-300 p-3 text-gray-800">
                            <a href="/profile/pending-proofs/{{$pp->id}}" class="font-medium hover:text-sec-900"> View </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="mt-10"> --}}
            {{-- <profile-orders :user_id="{{ json_encode( Auth::user()->id ) }}" :orders="{{ json_encode($pps) }}"></profile-orders> --}}
        {{-- </div> --}}

    </section>

@endsection
