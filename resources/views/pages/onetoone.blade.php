@extends('layouts.app')

@section('content')

<section class="pages-wrapper my-10">

    <div class="pages-cover h-22rem relative bg-no-repeat bg-center bg-cover" style="background-image: url(https://www.printarabia.ae/img/static/design/one-to-one-design-desk/banner/one-to-one-design-desk1200x300.jpg)">
        <div class="absolute w-full left-0 bottom-0 p-5 md:p-10">
            <h1 class="text-5xl md:text-6xl text-white font-bold leading-none">
                <span class="block">One-to-one</span>
                <span class="block">Design Desk</span>
            </h1>
        </div>
    </div>


    <div class="my-12 md:my-24 text-center text-gray-900">
        <p class="text-3xl font-semibold mb-1">Work with our expert designers more closely.</p>
        <p class="text-base">With this distinctive service, enjoy working with our designers one-to-one</p>
        <p class="text-base">either in English or Arabic over the designer’s desk.</p>
        <p class="text-lg mt-5 font-medium text-sec">Before you visit us, kindly select for which category you are prepared to obtain this service</p>
    </div>

    <div class="mt-12">
        <div class="text-center">
            <div class="product-points-grid lightgray points-grid grid grid-cols-1 md:grid-cols-4 mt-16 md:border md:border-gray-400 md:border-b-0 md:border-l-0 md:border-r-0 md:divide-x md:divide-gray-400">
                <div class="point p-5">
                    <img src="https://www.printarabia.ae/img/static/design/one-to-one-design-desk/icons/design-ready-file.png" alt="icon" class="mx-auto">
                    <div class="text-lg font-semibold mt-4 text-sec">Design Ready File</div>
                    <div class="text-sm text-gray-700">I have design ready file either in PDF, EPS, AI, PSD or JPG. I need to have it checked, or make design corrections and proceed for printing.</div>
                    <div class="pt-16 pb-8 hidden md:flex items-center justify-center">
                        <div class="w-16 turnaround-lines gray-lines border-b h-px border-dashed border-gray-500 relative my-2 transform rotate-90"></div>
                    </div>
                </div>
                <div class="point p-5">
                    <img src="https://www.printarabia.ae/img/static/design/one-to-one-design-desk/icons/design-word-file.png" alt="icon" class="mx-auto">
                    <div class="text-lg font-semibold mt-4 text-sec">Design in Word File</div>
                    <div class="text-sm text-gray-700">I have basic layout data ready either in Word, Excel or Powerpoint. I need to have a proper printable design made from it, and proceed for printing.</div>
                    <div class="pt-16 pb-8 hidden md:flex items-center justify-center">
                        <div class="w-16 turnaround-lines gray-lines border-b h-px border-dashed border-gray-500 relative my-2 transform rotate-90"></div>
                    </div>
                </div>
                <div class="point p-5">
                    <img src="https://www.printarabia.ae/img/static/design/one-to-one-design-desk/icons/design-material.png" alt="icon" class="mx-auto">
                    <div class="text-lg font-semibold mt-4 text-sec">Design Materials</div>
                    <div class="text-sm text-gray-700">I am aware of design requirements, and I have final proof-read text, hi-res photos, logo and a layout sketch in digital format. I need a proper printable design made from it, and proceed for printing.</div>
                    <div class="pt-16 pb-8 hidden md:flex items-center justify-center">
                        <div class="w-16 turnaround-lines gray-lines border-b h-px border-dashed border-gray-500 relative my-2 transform rotate-90"></div>
                    </div>
                </div>
                <div class="point four p-5">
                    <img src="https://www.printarabia.ae/img/static/design/one-to-one-design-desk/icons/design-consultancy.png" alt="icon" class="mx-auto">
                    <div class="text-lg font-semibold mt-4 text-sec">Design Consultancy</div>
                    <div class="text-sm text-gray-700">I have no data, neither any design materials. I need a professional design consultancy on how my design can be made. I would like to proceed to create my design and get it printed.</div>
                    <div class="pt-16 pb-8 hidden md:flex items-center justify-center">
                        <div class="w-16 turnaround-lines gray-lines border-b h-px border-dashed border-gray-500 relative my-2 transform rotate-90"></div>
                    </div>
                </div>
                <div class="p-4 bg-primary-500 w-full md:col-span-4 text-center divide-x-0 divide-y-0">
                    <div class="text-lg font-semibold uppercase text-gray-100">APPLICABLE FEES</div>
                </div>

                <div class="text-left md:border-b md:border-gray-400">
                    <table class="w-full font-medium">
                        <tr class="block md:hidden text-gray-900 text-xl text-center">
                            <th class="p-5">Design Ready File</th>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span> Data Check Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">Free</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span>  Correction Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">50 AED onwards</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-gray-700 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                                </span>
                                <span>Design Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">---</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span>Sample Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">50 AED onwards</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-gray-700 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                                </span>
                                <span>Consultancy Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">---</span>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="text-left md:border-b md:border-gray-400">
                    <table class="table-auto w-full font-medium">
                        <tr class="block md:hidden text-gray-900 text-xl text-center">
                            <th class="p-5">Design in Word File</th>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span> Data Check Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">Free</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-gray-700 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                                </span>
                                <span>Correction Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">---</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span>Design Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">Actual Design fees</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span>Sample Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">50 AED onwards</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-gray-700 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                                </span>
                                <span>Consultancy Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">---</span>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="text-left md:border-b md:border-gray-400">
                    <table class="table-auto w-full font-medium">
                        <tr class="block md:hidden text-gray-900 text-xl text-center">
                            <th class="p-5">Design Materials</th>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span> Data Check Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">Free</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-gray-700 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                                </span>
                                <span>  Correction Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">---</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span>Design Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">Actual Design fees</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span>Sample Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">50 AED onwards</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-gray-700 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                                </span>
                                <span>Consultancy Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">---</span>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="text-left md:border-b md:border-gray-400">
                    <table class="table-auto w-full font-medium  md:border-r md:border-gray-400">
                        <tr class="block md:hidden text-gray-900 text-xl text-center">
                            <th class="p-5">Design Consultancy</th>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-gray-700 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                                </span>
                                <span> Data Check Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">---</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-gray-700 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                                </span>
                                <span>  Correction Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">---</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span>Design Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">Actual Design fees</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span>Sample Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">50 AED onwards</span>
                            </td>
                        </tr>
                        <tr class="bg-orange-100 text-sec">
                            <td class="p-5 flex items-center">
                                <span class="text-green-500 inline-block mr-2">
                                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <span>Consultancy Fees</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-5 flex items-center">
                                <span class="text-gray-800">250 AED/Hour</span>
                            </td>
                        </tr>
                    </table>
                </div>


            </div>
        </div>
    </div>
    <div class="mt-5 text-right">
        <a href="#" class="theme-link text-primary-500 font-medium">Refer Actual Design Fees</a>
    </div>

</section>


<section class="note py-8">
    <div class="font-semibold text-lg">NOTE:</div>
    <ul class="ml-5 mt-5">
        <li class="mt-2">Kindly prepare your contents fully before you visit our office.</li>
        <li class="mt-1">50% advance payment of the design fees is a must.</li>
        <li class="mt-1">We don’t provide any kind of translation service.</li>
        <li class="mt-1">Any error in spelling/grammar that may carried out in final printinig, will not be our responsibility</li>
    </ul>

</section>





@endsection
