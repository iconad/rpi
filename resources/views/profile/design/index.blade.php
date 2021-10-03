@extends('layouts.app')

@section('content')
    <section class="page-wrapper">

        <x-profile-header />

        <div>
            <div class="text-2xl font-semibold text-gray-900 flex items-center justify-between">
                <span>My Designs </span>
            </div>

            <div class="mt-10">
                <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="border overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Date Saved
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Document ID
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        File
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Product
                                    </th>
                                    <th class="hidden px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            @if (count($orders) != 0)
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($orders as $order)

                                    @foreach ($order->files as $file)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-base leading-5 font-medium text-gray-800">
                                                {{date('d M, Y', strtotime($file->created_at))}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-base leading-5 font-medium text-gray-800">
                                                {{$file->id}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-base leading-5 font-medium text-gray-800">
                                                @if (count($file->media) != 0)
                                                <a class="block theme-link hover:border-transparent" download target="_blank" href="{{ URL::asset("storage/".$file->media[0]->id."/".$file->media[0]->file_name) }}">
                                                    {{$file->media[0]->file_name}}
                                                </a>
                                                 @else
                                                 file not found!
                                                 @endif
                                            </div>
                                        </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 font-medium text-gray-800" >
                                        @if ($order->product)
                                            @if ($order->product_type == 'paper')
                                                <a href="/products/{{$order->product->slug}}" class="capitalize theme-link hover:border-transparent">{{$order->product->title}}</a>
                                            {{-- @elseif($order->product_type == 'shirt')
                                                <a href="/products/shirts/{{$order->product->category->slug}}" class="capitalize theme-link hover:border-transparent">{{$order->product->title}}</a> --}}
                                            @elseif($order->product_type == 'gift' && $order->product->category)
                                                <a href="/products/personalized-gifts/{{$order->product->category->slug}}" class="capitalize theme-link hover:border-transparent">{{$order->product->title}}</a>
                                            @endif
                                        @endif
                                    </div>
                                    </td>
                                        <td class=" hidden px-6 py-4 whitespace-no-wrap">
                                            <span class="capitalize text-base leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{$file->status}}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="text-center font-medium text-lg my-12">No Saved Templates.</div>
                        @endif
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </section>

@endsection
