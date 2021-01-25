@extends('layouts.app')

@section('content')
    <section class="page-wrapper">

        <x-profile-header />

        <div>
            <div class="text-2xl font-semibold text-gray-900 flex items-center justify-between">
                <span>{{$addressBook->city}} Address </span>
            </div>

            <div class="mt-10">
                <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                        <form action="{{route('address-books.update', $addressBook->id)}}" method="post">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="flex items-center space-x-3 mb-3">

                                <div class="w-full">
                                    <label class="w-full">
                                        <span class="block mb-1 text-gray-900">First Name</span>
                                            <input type="text" name="first_name" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none" value="{{ $addressBook->first_name }}">
                                    </label>
                                </div>
                                <div class="w-full">
                                    <label class="w-full">
                                        <span class="block mb-1 text-gray-900">Last Name</span>
                                            <input type="text" name="last_name" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none" value="{{ $addressBook->last_name }}">
                                    </label>
                                </div>

                            </div>
                            <!-- row -->
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-full">
                                    <label class="w-full">
                                        <span class="block mb-1 text-gray-900">Company Name</span>
                                        <input type="text" name="company_name" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none" value="{{ $addressBook->company_name }}">
                                    </label>
                                </div>
                                <div class="w-full">
                                    <label class="w-full">
                                        <span class="block mb-1 text-gray-900">City</span>
                                        <input type="text" name="city" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none" value="{{ $addressBook->city }}">
                                    </label>
                                </div>
                            </div>
                            <!-- row -->

                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-full">
                                    <label class="w-full">
                                        <span class="block mb-1 text-gray-900">Country Code</span>
                                        <input type="text" name="country_code" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none" value="{{ $addressBook->country_code }}">
                                    </label>
                                </div>
                                <div class="w-full">
                                    <label class="w-full">
                                        <span class="block mb-1 text-gray-900">Mobile Number</span>
                                        <input type="number" min="0" name="mobile_number" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none" value="{{ $addressBook->mobile_number }}">
                                    </label>
                                </div>
                            </div>
                            <!-- row -->

                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-full">
                                    <label class="w-full">
                                        <span class="block mb-1 text-gray-900">Address</span>
                                        <input type="text" name="address" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none" value="{{ $addressBook->address }}">
                                    </label>
                                </div>
                                <div class="w-full">
                                    <label class="w-full">
                                        <span class="block mb-1 text-gray-900">Landmark</span>
                                        <input type="text" name="landmark" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none" value="{{ $addressBook->landmark }}">
                                    </label>
                                </div>
                            </div>
                            <!-- row -->

                            <div class="flex items-center justify-end">
                                <div>
                                    <input
                                    type="submit" value="Update" class="theme-button rounded cursor-pointer">
                                </div>
                            </div>
                            <!-- row -->

                        </form>

                    </div>
                </div>
                </div>
            </div>
        </div>

    </section>

@endsection
