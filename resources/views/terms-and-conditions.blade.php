@extends('layouts.app')

@section('content')

{{-- <section id="pageBreadcrumbs">
    <x-breadcrumbs />
</section> --}}
{{-- breadcrumbs --}}

<section class="my-12">
    <div class="text-center">
        <h1 class="text-3xl font-semibold text-gray-900">Terms of Use</h1>
        <h2 class="text-xl font-medium text-gray-700">For using the services of rpi.ae</h2>
    </div>
    <div class="terms bg-gray-100 border border-gray-100 rounded-lg p-10 mt-10">

        <div class="flex flex-wrap md:flex-nowrap items heading box">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">1</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Payment
                </div>
                {{-- heading --}}
                <div class="content">
                    <ul>
                        <li>All orders require a 50% Down Payment or a 100% Full Payment to begin production</li>
                        <li>When paying with Points, any amount less than 50% of the balance is not sufficient to start production.</li>
                        <li>Any deposit or payment against a Design Fee, is NON-REFUNDABLE.</li>
                        <li>Points may be issued in lieu of refunds. Any over-payments or supplementary invoice adjustments resulting in a positive client balance, will be credited as Points for amount in difference.</li>
                    </ul>

                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">2</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Delivery Date
                </div>
                {{-- heading --}}
                <div class="content">
                    <p>
                        The expected delivery date will be confirmed once you have approved the final design proof OR once you have made the payment (Full or 50%) whichever comes later.
                    </p>

                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">3</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Delivery Promise
                </div>
                {{-- heading --}}
                <div class="content">
                    <p>
                        <u>The delivery date displayed on your order is our best effort, but it is not 100% guaranteed.</u> There may be delays due to unexpected production difficulties or conjunction. In such a situation we will notify you in advance. We do not take any responsibilities for any damages caused due to the delays.
                    </p>

                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">4</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Color Difference
                </div>
                {{-- heading --}}
                <div class="content">
                    <ul>
                        <li>Printed (CMYK) colors are not able to match to screen (RGB) colors. Please understand that RGB (red, green, blue) colors are screen colors recently with digital led light in the back. Offset and digital printing is done with CMYK (Cyan, Magenta, Yellow, Black) on a physical paper with inks. RGB and CMYK are 2 different color spectrums and can not be compared.</li>
                        <li>There will always be color shifting when printing RGB in CMYK. This is an unfortunate but expected standard result of offset/digital printing not just in the UAE but anywhere in the world. We will not reprint your item because the colors on your screen(phone or PC) showing different colors from the actual printed material on the paper you received.</li>
                        <li>We will also not accept any claims or rejects for comparing your current printed items to: CMYK colour values you did NOT provide at the time of placing the order; a physical sample you failed to provide beforehand; an old item you printed before on a different date without providing us the order reference number.</li>

                    </ul>

                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">5</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Product Guarantee-Refund-Reprint
                </div>
                {{-- heading --}}
                <div class="content">
                    <p><u>We guarantee that our print products will not be defective in accordance with print industry standards.</u> In the unlikely event that a printed item does not meet the print industry quality standards or a misprint happen on Print Arabia side, first we will pick up the product and rectify our fault and once the fault has been rectified we will reprint the mistaken product fully or partially free of charge. You must allow us the appropriate time for the reprint, we are not able to exchange items within hours, it might take days depending on the product. Due to the custom nature of our print services(we are printing it only for YOU),we are NOT able to offer a refund on any mistprinted item. We can only offer to reprint the item(s). In case you need to product for a specific time, you must order items in advance and not leave things at the very last minute.
                    </p>
                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">6</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Modifying Orders
                </div>
                {{-- heading --}}
                <div class="content">
                    <p><u>All our orders are custom made to your specification and/or personalized by you.</u>
                        Custom designs and artwork created by Print Arabia and our team are subject to human error. If an error occurs in regards to pricing, paper, finishing, turnaround time or any other aspect of an order that is found to be our fault, Print Arabia maintains the right to cancel the order and provide a full refund to the Client.
                    </p>

                    <p>
                        Any miscommunication that occurs from the Client to Print Arabia during the quoting / estimate process will not qualify the order for cancellation or a refund. If any changes are made to an order, it will be viewed as a new order and will not qualify as a reprint.
                    </p>

                    <p>
                        Print Arabia reserves the right to deduct a minimum of 20% cancellation fee from the order if the design project is cancelled and a refund is issued to the Client. Any approved refunds will be processed via the original payment method.
                    </p>

                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">7</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Cancellation Fees / Partial Refunds
                </div>
                {{-- heading --}}
                <div class="content">

                    <p><u>Due to the custom nature of our products, no order can be cancelled/modified once you have approved it.</u>
                        Here is a breakdown of the cancellation fee depending on which stage of the process your data is at:</p>
                    <ul>
                        <li>Cancelling before we returning your data proof: 5% of the product price or min. 50 AED.</li>
                        <li>Cancelling after returning your data proof but you have not approved yet: 10% of the product price or minimum 100 AED.</li>
                        <li>Cancelling your order after approving your proof and the status shows printing, ready for delivery or completed: 100% of the product price - regardless if you accept the product or not. Once a product has started / finished printing no refund will be provided.</li>
                    </ul>
                    <p>Any approved refunds will be processed via the original payment method.</p>

                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">8</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Abandoned / Forfeitted Orders
                </div>
                {{-- heading --}}
                <div class="content">
                    <p>
                        <u>Any deposits against orders not attended by the client in a timely manner meaning the order is abandoned by you for more than 60 days from first contact, not replying to our contacts (calls, email, sms) will be considered abandoned; and as a result will be cancelled and any/all deposit(s) forfeited. Such forfeitures for abandoned projects are not eligible for refund or points.</u>
                    </p>
                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">9</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Reprint Requests
                </div>
                {{-- heading --}}
                <div class="content">

                    <p> <u>If a printing error has occurred that is a result of our production mistake, a reprint will be offered at no cost.</u> Reprints will use the SAME file as was used in the original order, you are not entitled to submit any new file for the reprint.We can not reprint AND refund your payment, we can only provide a free reprint.</p>

                    <p> <u>Any error caused/created by the you (spelling, typos, wrong names/titles, bad punctuation/spelling, etc.) is not entitled to a free reprint.</u> We do not offer refund and reprint.</p>

                    <p>We will not reprint your print order under any circumstances, due to:</p>
                    <ul class="ml-5">
                        <li>Differences in colour between the printed item compared to your digital screen.</li>
                        <li>Differences in colour between your previously printed material and currently printed by us. The digital proof (soft proof) sent over email is only to confirm design layout, text accuracy, image proportion and placement, it is NOT a colour proof (Hard proof or Press proof).</li>
                        <li>For 100% colour accuracy, we strongly recommend you to invest in an actual printed colour proof.
                            (Additional costs and production time are required).</li>
                    </ul>
                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">10</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Start of Production
                </div>
                {{-- heading --}}
                <div class="content">

                    <p>Production for your print order will ONLY start once you have approved the final digital proof in our online system. Until that happens your order will remain with a "waiting for approval" status on our system. This means we will not start any production on your job, and that may delay the initial projected delivery date.</p>

                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">11</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Mistake Responsibilities
                </div>
                {{-- heading --}}
                <div class="content">

                    <p>We will be not liable for any errors NOT caught or corrected by you when you review your final digital proof. Once you have approved the final digital proof, any mistakes or errors (of spelling, typography, layout, size, etc.) found in the printed material will be your sole responsibility regardless you and the designer or whoever has made the mistake.</p>

                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <div class="flex flex-wrap md:flex-nowrap items heading box mt-5">
            <div class="w-full md:w-auto mb-5 md:mb-0">
                <span class="h-10 w-10 text-2xl rounded-full bg-primary-500 text-white font-semibold flex items-center justify-center">12</span>
            </div>
            <div class="md:ml-6 sec w-full">
                <div class="text-2xl text-sec font-semibold heading">
                    Image Resolution Quality
                </div>
                {{-- heading --}}
                <div class="content">

                    <p>We will be not responsible for poor blurry quality due to low quality images provided by the client for their design. Please submit only high quality/high-resolution images and elements. If you provide low quality images, we will presume you are aware of the blurry print quality and agreed to print it this way.</p>
                    <p>If you have no knowledge of graphic design please ask us about our professional design services. We offer FREE graphic design service if you order and pay in full online.</p>

                </div>
                {{-- content --}}
            </div>
            {{-- sec --}}
        </div>
        {{-- box --}}

        <terms-and-conditions-form></terms-and-conditions-form>

    </div>
</section>



@endsection
