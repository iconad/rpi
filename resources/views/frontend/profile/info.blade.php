@extends('layouts.app')

@section('content')

<section id="pageBreadcrumbs">
    <x-breadcrumbs />
</section>
{{-- breadcrumbs --}}

<section class="my-10">
    <x-frontend.profile-navbar />
</section>
{{-- breadcrumbs --}}

<section class="order-filter-section">
    <div class="text-2xl font-semibold text-gray-900">
        <span>Account Identity </span>
        <span>|</span>
        <span class="text-sec">PA Points 0</span>
    </div>

    <div class="mt-10">
        <form action="">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-5">
                <div>
                    <label class="text-base">
                        <span class="block text-gray-700 mb-2 font-medium">Full Name</span>
                        <input type="text" class="w-full text-gray-900 p-2 border focus:outline-none foucs:bg-gray-200 ">
                    </label>
                </div>
                <div>
                    <label class="text-base">
                        <span class="block text-gray-700 mb-2 font-medium">Email</span>
                        <input type="text" class="w-full text-gray-900 p-2 border focus:outline-none foucs:bg-gray-200 ">
                    </label>
                </div>
                <div>
                    <label class="text-base">
                        <span class="block text-gray-700 mb-2 font-medium">Mobile Number</span>
                        <input type="text" class="w-full text-gray-900 p-2 border focus:outline-none foucs:bg-gray-200 ">
                    </label>
                </div>
                <div>
                    <label class="text-base">
                        <span class="block text-gray-700 mb-2 font-medium">Landline</span>
                        <input type="text" class="w-full text-gray-900 p-2 border focus:outline-none foucs:bg-gray-200 ">
                    </label>
                </div>
                <div class="col-span-2">
                    <label class="text-base">
                        <span class="block text-gray-700 mb-2 font-medium">Location</span>
                        <input type="text" class="w-full text-gray-900 p-2 border focus:outline-none foucs:bg-gray-200 ">
                    </label>
                </div>
                <div>
                    <label class="text-base">
                        <span class="block text-gray-700 mb-2 font-medium">Company Name</span>
                        <input type="text" class="w-full text-gray-900 p-2 border focus:outline-none foucs:bg-gray-200 ">
                    </label>
                </div>
                <div>
                    <label class="text-base">
                        <span class="block text-gray-700 mb-2 font-medium">Company TRN</span>
                        <input type="text" class="w-full text-gray-900 p-2 border focus:outline-none foucs:bg-gray-200 ">
                    </label>
                </div>
            </div>
            <div class="flex items-center justify-end mt-10">
                <button class="theme-button">Update</button>
            </div>
        </form>
    </div>

</section>



@endsection
