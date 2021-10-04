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
    
            <div class="p-10 text-center">
                <div class="text-3xl text-sec font-semibold mb-3">IMPORTANT NOTICE!</div>
                <p class="text-base text-800 mt-5">Please pay the below amount and send us the proof of payment with your ordre ID on our email <a href="mailto:info@rpi.ae" class="font-semibold hover:underline">info@rpi.ae</a> or Whatsapp us on <span class="font-semibold">+971 55 207 4007</span>, and will start working on you order ASAP.</p>
             
                <table class="w-full text-left mt-5">
                    <tr>
                        <td colspan="2" class="border p-2 font-semibold">Bank Detail</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Company Name</td>
                        <td class="border p-2">Rainbow Printing Ind .LLC (R.P.I)</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Bank Name</td>
                        <td class="border p-2">The National Bank of Ras Al Khaima (P.S.C)</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Branch</td>
                        <td class="border p-2">Sharjah Industrial Area</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Po Box</td>
                        <td class="border p-2">1531 Dubai, United Arab of Emirates</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">A/C No</td>
                        <td class="border p-2">0362518809001</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">IBAN</td>
                        <td class="border p-2">AE530400000362518809001</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Swift Code</td>
                        <td class="border p-2">NRAKAEAK</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Routing Code</td>
                        <td class="border p-2">804020101</td>
                    </tr>
                </table>
            </div>
   
    </section>

@endsection
