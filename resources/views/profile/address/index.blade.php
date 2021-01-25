@extends('layouts.app')

@section('content')
    <section class="page-wrapper">

        <x-profile-header />

        <div>
            <div class="text-2xl font-semibold text-gray-900 flex items-center justify-between">
                <span>Address Book </span>
                <a href="/profile/address-books/create" class="text-sm theme-link">Add New Address </a>
                <span class="hidden">
                    <input type="search" placeholder="Search Delivery Address " class="rounded w-full md:w-64 text-base p-2 focus:outline-none border">
                </span>
            </div>

            <div class="mt-10">
                <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="border overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        @if (count($address) != 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Address
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Mobile
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($address as $adr)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-base leading-5 text-gray-900">
                                           {{ $adr->created_at }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-base leading-5 text-gray-900">
                                            {{ $adr->address }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-base leading-5 text-gray-900">
                                            {{ $adr->mobile_number }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-base leading-5 text-gray-900">
                                            <a href="/profile/address-books/{{$adr->id}}" class="theme-link hover:border-transparent">View</a>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="text-center font-medium text-lg my-12"> No Results Found! </div>
                        @endif

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </section>

@endsection
