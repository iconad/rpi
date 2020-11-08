@extends('layouts.app')

@section('content')

<section id="pageBreadcrumbs">
    <x-breadcrumbs />
</section>
{{-- breadcrumbs --}}

<section class="order-filter-section my-12">
    <h1 class="text-3xl font-semibold text-gray-900">Your Shopping Cart</h1>
    <div class="text-xl font-semibold text-gray-900 text-sec">Order No: <span>232-ERT-423434</span> </div>

    <div class="cart-wrapper mt-5 border bg-gray-100 rounded">

        <div class="cart-loop">

            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-200 cart-head capitalize cursor-pointer cursor-pointer leading-6 font-medium text-gray-900 flex items-center justify-between">
                <span class="text-xl">
                    standard business card
                </span>
                <span class="inline-block w-12 h-12 border-4 border-sec flex items-center justify-center rounded-full text-4xl text-sec">1</span>
            </div>
            {{-- card head --}}

            <div class="card-body">
                <dl>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6 border-b">
                        <dt class="text-base font-semibold text-gray-900">
                        Order Detail
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-4">
                            <ul>
                                <li class="flex items-center">
                                    <span class="block font-medium">Size</span>
                                    <span class="block ml-2">90x50 UAE standard</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="block font-medium">Paper</span>
                                    <span class="block ml-2">400 gsm mate laminated</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="block font-medium">Colors</span>
                                    <span class="block ml-2">Two sided colors</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="block font-medium">Quantity</span>
                                    <span class="block ml-2">1000</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="block font-medium">Finishing</span>
                                    <span class="block ml-2">none</span>
                                </li>
                            </ul>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6 border-b">
                        <dt class="text-base font-semibold text-gray-900">
                        Print Data
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-4">
                            <ul>
                                <li class="flex items-center">
                                    <a class="block ml-2 hover:underline hover:text-sec" href="/">ai file name.ai</a>
                                </li>
                                <li class="flex items-center">
                                    <a class="block ml-2 hover:underline hover:text-sec" href="/"> psd file name.psd</a>
                                </li>
                            </ul>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6 border-b">
                        <dt class="text-base font-semibold text-gray-900">
                        Note
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-4">
                            <div class="content">
                                Intellectual and other property rights to the information contained in this site are held by Icon Advertising LLC Dubai Branch
                                with all rights reserved since © 2015. Copying any or parts of our site, will result in a court case against you and you will be
                                prosecuted according to the Federal Law No. (7) of 2002 of the UAE on Copyrights Infringement and related rights.
                            </div>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6 border-b">
                        <dt class="text-base font-semibold text-gray-900">
                        Delivery Date
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-4">
                            <div class="font-medium">2 Buisness Day <span class="text-theme-red">(After digital screen proof approval and payment is done.)</span> </div>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6">
                        <dt class="text-base font-semibold text-gray-900">
                        Price
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-4">
                            <table>
                                <tr>
                                    <td class="px-3 font-medium">Printing</td>
                                    <td class="px-3">85.71 AED</td>
                                </tr>
                                <tr>
                                    <td class="px-3 font-medium">Delivery</td>
                                    <td class="px-3">12 AED</td>
                                </tr>
                                <tr>
                                    <td class="px-3 font-medium">VAT 5%</td>
                                    <td class="px-3">5.49 AED</td>
                                </tr>
                                <tr>
                                    <td class="py-1" colspan="2"><hr></td>
                                </tr>
                                <tr>
                                    <td class="px-3 text-lg text-sec font-semibold">Total</td>
                                    <td class="px-3">
                                        <span class="text-lg text-sec font-semibold">115 AED</span>
                                    </td>
                                </tr>
                            </table>
                        </dd>
                    </div>
                </dl>
            </div>
            {{-- card body --}}
        </div>

        <div class="cart-loop">

            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-200 cart-head capitalize cursor-pointer cursor-pointer leading-6 font-medium text-gray-900 flex items-center justify-between">
                <span class="text-xl">
                    Social Distance Floor Bar Order
                </span>
                <span class="inline-block w-12 h-12 border-4 border-sec flex items-center justify-center rounded-full text-4xl text-sec">2</span>
            </div>
            {{-- card head --}}

            <div class="card-body">
                <dl>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6 border-b">
                        <dt class="text-base font-semibold text-gray-900">
                        Order Detail
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-4">
                            <ul>
                                <li class="flex items-center">
                                    <span class="block font-medium">Size</span>
                                    <span class="block ml-2">90x50 UAE standard</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="block font-medium">Paper</span>
                                    <span class="block ml-2">400 gsm mate laminated</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="block font-medium">Colors</span>
                                    <span class="block ml-2">Two sided colors</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="block font-medium">Quantity</span>
                                    <span class="block ml-2">1000</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="block font-medium">Finishing</span>
                                    <span class="block ml-2">none</span>
                                </li>
                            </ul>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6 border-b">
                        <dt class="text-base font-semibold text-gray-900">
                        Print Data
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-4">
                            <ul>
                                <li class="flex items-center">
                                    <a class="block ml-2 hover:underline hover:text-sec" href="/">ai file name.ai</a>
                                </li>
                                <li class="flex items-center">
                                    <a class="block ml-2 hover:underline hover:text-sec" href="/"> psd file name.psd</a>
                                </li>
                            </ul>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6 border-b">
                        <dt class="text-base font-semibold text-gray-900">
                        Note
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-4">
                            <div class="content">
                                Intellectual and other property rights to the information contained in this site are held by Icon Advertising LLC Dubai Branch
                                with all rights reserved since © 2015. Copying any or parts of our site, will result in a court case against you and you will be
                                prosecuted according to the Federal Law No. (7) of 2002 of the UAE on Copyrights Infringement and related rights.
                            </div>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6 border-b">
                        <dt class="text-base font-semibold text-gray-900">
                        Delivery Date
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-4">
                            <div class="font-medium">2 Buisness Day <span class="text-theme-red">(After digital screen proof approval and payment is done.)</span> </div>
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-5 sm:gap-4 sm:px-6">
                        <dt class="text-base font-semibold text-gray-900">
                        Price
                        </dt>
                        <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-4">
                            <table>
                                <tr>
                                    <td class="px-3 font-medium">Printing</td>
                                    <td class="px-3">85.71 AED</td>
                                </tr>
                                <tr>
                                    <td class="px-3 font-medium">Delivery</td>
                                    <td class="px-3">12 AED</td>
                                </tr>
                                <tr>
                                    <td class="px-3 font-medium">VAT 5%</td>
                                    <td class="px-3">5.49 AED</td>
                                </tr>
                                <tr>
                                    <td class="py-1" colspan="2"><hr></td>
                                </tr>
                                <tr>
                                    <td class="px-3 text-lg text-sec font-semibold">Total</td>
                                    <td class="px-3">
                                        <span class="text-lg text-sec font-semibold">115 AED</span>
                                    </td>
                                </tr>
                            </table>
                        </dd>
                    </div>
                </dl>
            </div>
            {{-- card body --}}
        </div>


    </div>


        {{-- ========== Card End ======== --}}


    <div class="my-10 text-3xl text-sec font-semibold text-right">
        <span class="inline-block mr-3">Total: </span>
        <span class="inline-block mr-3">115 AED </span>
    </div>
    <div class="my-5 text-lg flex items-center justify-between w-full">
        <div>
            <a href="http://" class="bg-gray-300 hover:bg-transparent cursor-pointer px-5 py-2 text-gray-800 font-medium border mr-1">Shop More</a>
            <a href="/" class="bg-gray-300 hover:bg-transparent cursor-pointer px-5 py-2  text-gray-800 font-medium border ">Empty Cart</a>
        </div>
        <div>
            <a href="http://" class="bg-gray-300 hover:bg-transparent cursor-pointer px-5 py-2 text-gray-800 font-medium border mr-1">Go Back</a>
            <a href="/" class="bg-primary hover:bg-transparent cursor-pointer px-5 py-2 text-gray-100 hover:text-primary font-medium border border-primary">Checkout</a>
        </div>
    </div>

</section>



@endsection
