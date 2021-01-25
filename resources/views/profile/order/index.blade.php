@extends('layouts.app')

@section('content')
    <section class="page-wrapper">

        <x-profile-header />
        {{-- <div class="content mt-12">
            <table class="table table-fixed w-full">
                <thead>
                    <tr class="text-left">
                        <th class="border border-gray-300 p-3">ID</th>
                        <th class="border border-gray-300 p-3">Title</th>
                        <th class="border border-gray-300 p-3">Product</th>
                        <th class="border border-gray-300 p-3">Type</th>
                        <th class="border border-gray-300 p-3">Status</th>
                        <th class="border border-gray-300 p-3">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td class="border border-gray-300 p-3 font-semibold text-gray-700"> {{$order->id}} </td>
                        <td class="border border-gray-300 p-3 text-gray-800">
                        @if ($order->status === 'cart')
                            <a href="/profile/orders/{{$order->id}}/upload-your-design" class="hover:underline"> {{$order->title}} </a>
                        @else
                            <a href="/profile/orders/{{$order->id}}" class="hover:underline"> {{$order->title}} </a>
                        @endif
                        </td>
                        <td class="border border-gray-300 p-3 text-gray-800"> {{$order->product->title}} </td>
                        <td class="border border-gray-300 p-3 text-gray-800"> {{$order->product->type}} </td>
                        @if ($order->status === 'cart')
                            <td class="font-medium capitalize border border-gray-300 p-3 text-blue-500"> {{$order->status}} </td>
                        @elseif($order->status === 'pending')
                            <td class="font-medium capitalize border border-gray-300 p-3 text-orange-500"> {{$order->status}} </td>
                        @elseif($order->status === 'confirmed')
                            <td class="font-medium capitalize border border-gray-300 p-3 text-green-500"> {{$order->status}} </td>
                        @else
                            <td class="font-medium capitalize border border-gray-300 p-3 text-gray-800"> {{$order->status}} </td>
                        @endif
                        <td class="border border-gray-300 p-3 text-gray-800"> {{date('d M, Y', strtotime($order->created_at))}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
        <div class="mt-10">
            <profile-orders :user_id="{{ json_encode( Auth::user()->id ) }}" :orders="{{ json_encode($orders) }}"></profile-orders>
        </div>

    </section>

@endsection
