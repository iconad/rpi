@extends('layouts.printo')

@section('content')
<div class="contact-us md:p-5 p-4 md:px-20">
    <div class="text-left py-8">
        <h1 class="text-3xl md:text-5xl mb-1">Conditions.</h1>
        <p class="text-3xl md:text-5xl md:mb-6">Terms of Service.</p>
    </div>


    <div class="flex mt-4 flex-col md:flex-row mr-0 md:mr-8 md:flex hidden">
    <!-- Left Column -->
    <div class="w-full md:w-1/2 mb-4 md:mb-0">
        <div class="flex border-b-2 mb-8 flex-height pt-8">
            <div class="md:w-1/2 mb-8">
                <h2 class="text-xl md:text-2xl mb-2">Privacy</h2>
            </div>
            <div class="mt-12 md:mt-0 md:w-1/2 mb-8">
                <p class="text-1xl text-gray-500 mb-6">All prices listed on Printo.ae are in Dirhams (AED).</p>
                <p class="text-1xl text-gray-500 mb-6">Prices are exclusive of VAT. A 5% VAT will be added to all purchases in accordance with UAE VAT Law.</p>
                <p class="text-1xl text-gray-500 mb-6">After final artwork and job description approval, any requested changes will be the customer's responsibility and will incur additional charges.</p>
            </div>
        </div>
        <div class="flex  border-b-2 mb-8 flex-height pt-8">
            <div class="md:w-1/2 mb-8">
                <h2 class="text-xl md:text-2xl mb-2">Proof</h2>
            </div>
            <div class="mt-12 md:mt-0 md:w-1/2 ">
                <p class="text-1xl text-gray-500 mb-6">We will provide an online proof for your review and colour approval. Please thoroughly review the proof for any errors in layout and design, as jobs will not proceed to printing without your approval.</p>
                <p class="text-1xl text-gray-500 mb-6">Please note that an electronic proof may not accurately represent the final colour production of your job.</p>
                
          
           
            </div>
        </div>
        <div class="flex  border-b-2 flex-height pt-8">
           <div class="md:w-1/2 mb-8">
                <h2 class="text-xl md:text-2xl">Quality & <span> Quantity </span></h2>
            </div>
            <div class="mt-12 md:mt-0 md:w-1/2 ">
                <p class="text-1xl text-gray-500 mb-6">Printing in CMYK may result in colour shifting, with a ±5% variance to be accepted.</p>
                <p class="text-1xl text-gray-500 mb-6">In accordance with industry standards, a ±5% quantity variance is acceptable.</p>
                
            </div>
        </div>
        
    </div>

    

    <!-- Right Column -->
    <div class="w-full md:w-1/2 right-bg md-0 md:ml-8">
        <div class="flex  border-b-2 mb-8 flex-height pt-8 md:px-8">
            <div class="md:w-1/2 mb-8">
                <h2 class="text-xl md:text-2xl mb-2">Payment</h2>
            </div>
            <div class="mt-12 md:mt-0 md:w-1/2">
                <p class="text-1xl text-gray-500 mb-6">A 50% advance payment is required, with the balance due upon delivery.</p>
                <p class="text-1xl text-gray-500 mb-6">Orders will be considered confirmed only after final artwork approval and receipt of the 50% advance payment.</p>
                <p class="text-1xl text-gray-500 mb-6">Design fees are non-refundable.</p>
            </div>
        </div>
        <div class="flex  border-b-2 mb-8 flex-height pt-8 md:px-8">
            <div class="md:w-1/2 mb-8">
                <h2 class="text-xl md:text-2xl mb-2">Delivery</h2>
            </div>
            <div class="mt-12 md:mt-0 md:w-1/2 ">
                <p class="text-1xl text-gray-500 mb-6">Delivery timelines commence after receiving final artwork approval and the 50% advance payment.</p>
                <p class="text-1xl text-gray-500 mb-6">Free delivery is available in Dubai, Sharjah and Ajman. An additional charge of 50 AED applies for deliveries to Abu Dhabi.</p>
                <p class="text-1xl text-gray-500 mb-6">Deliveries to Fujairah, Umm Al Quwain and Ras Al Khaimah will incur an additional charge of 100 AED.</p>
            </div>
        </div>
        <div class="flex  border-b-2 flex-height pt-8 md:px-8  ">
           <div class="md:w-1/2">
                <h2 class="text-xl md:text-2xl mb-2">Colour</h2>
            </div>
            <div class="mt-12 md:mt-0 md:w-1/2 ">
                <p class="text-1xl text-gray-500 mb-6">The representation of colours may vary from screen to print due to different colour profiles.</p>
                <p class="text-1xl text-gray-500 mb-6">These Terms and Conditions provide clarity and transparency regarding the use of our services.</p>
                <p class="text-1xl text-gray-500 mb-6">By using Printo.ae, you agree to abide by these terms and conditions.</p>
            </div>
        </div>
        
    </div>
    
    </div>

<!-- Mobile version -->
</div>
<div class="flex flex-col justify-center items-center md:mt-12 md:mb-8 mt-8 mb-8 md:p-0 p-8 md:flex hidden">
    <p class="text-center text-xs md:text-2xl">If you have any questions or concerns, please don't hesitate to contact us.</p>
    <p class="text-center text-xs md:text-2xl">Thank you for choosing Printo.ae for your printing needs.</p>
</div>

<div class="flex flex-col md:flex-row mr-0 md:mr-8 md:hidden">
    <!-- Left Column -->
    <div class="w-full md:w-1/2 mb-4 md:mb-0 p-4">
        <div class="flex flex-col mb-8 pt-8 border-b-2">
            <div class="mb-8">
                <h2 class="text-xl md:text-2xl ">Privacy</h2>
            </div>
            <div>
                <p class="text-1xl text-gray-500 mb-6">All prices listed on Printo.ae are in Dirhams (AED).</p>
                <p class="text-1xl text-gray-500 mb-6">Prices are exclusive of VAT. A 5% VAT will be added to all purchases in accordance with UAE VAT Law.</p>
                <p class="text-1xl text-gray-500 mb-6">After final artwork and job description approval, any requested changes will be the customer's responsibility and will incur additional charges.</p>
            </div>
        </div>
        <div class="flex flex-col mb-8 pt-8 border-b-2">
            <div class="mb-8">
                <h2 class="text-xl md:text-2xl ">Proof</h2>
            </div>
            <div>
                <p class="text-1xl text-gray-500 mb-6">We will provide an online proof for your review and colour approval. Please thoroughly review the proof for any errors in layout and design, as jobs will not proceed to printing without your approval.</p>
                <p class="text-1xl text-gray-500 mb-6">Please note that an electronic proof may not accurately represent the final colour production of your job.</p>
            </div>
        </div>
        <div class="flex flex-col mb-8 pt-8">
            <div>
                <h2 class="text-xl md:text-2xl mb-6">Quality & Quantity </h2>
            </div>
            <div>
                <p class="text-1xl text-gray-500 mb-6">Printing in CMYK may result in colour shifting, with a ±5% variance to be accepted.</p>
                <p class="text-1xl text-gray-500">In accordance with industry standards, a ±5% quantity variance is acceptable.</p>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="right-bg ">
    <div class="w-full md:w-1/2 md-0 md:ml-8 p-4">
        <div class="flex flex-col mb-8 pt-8  border-b-2 md:px-8">
            <div class="mb-8">
                <h2 class="text-xl md:text-2xl ">Payment</h2>
            </div>
            <div>
                <p class="text-1xl text-gray-500 mb-6">A 50% advance payment is required, with the balance due upon delivery.</p>
                <p class="text-1xl text-gray-500 mb-6">Orders will be considered confirmed only after final artwork approval and receipt of the 50% advance payment.</p>
                <p class="text-1xl text-gray-500 mb-6">Design fees are non-refundable.</p>
            </div>
        </div>
        <div class="flex flex-col mb-8 pt-8  border-b-2 md:px-8">
            <div class="mb-8">
                <h2 class="text-xl md:text-2xl ">Delivery</h2>
            </div>
            <div>
                <p class="text-1xl text-gray-500 mb-6">Delivery timelines commence after receiving final artwork approval and the 50% advance payment.</p>
                <p class="text-1xl text-gray-500 mb-6">Free delivery is available in Dubai, Sharjah and Ajman. An additional charge of 50 AED applies for deliveries to Abu Dhabi.</p>
                <p class="text-1xl text-gray-500 mb-6">Deliveries to Fujairah, Umm Al Quwain and Ras Al Khaimah will incur an additional charge of 100 AED.</p>
            </div>
        </div>
        <div class="flex flex-col pt-8  md:px-8">
            <div>
                <h2 class="text-xl md:text-2xl mb-6">Colour</h2>
            </div>
            <div>
                <p class="text-1xl text-gray-500 mb-6">The representation of colours may vary from screen to print due to different colour profiles.</p>
                <p class="text-1xl text-gray-500 mb-6">These Terms and Conditions provide clarity and transparency regarding the use of our services.</p>
                <p class="text-1xl text-gray-500 mb-6">By using Printo.ae, you agree to abide by these terms and conditions.</p>
            </div>
        </div>
    </div>
    </div>
    <div class="flex flex-col justify-center items-center md:mt-12 md:mb-8 mt-8 mb-8 md:p-0 p-8">
    <p class="text-center text-xs md:text-2xl">If you have any questions or concerns, please don't hesitate to contact us. Thank you for choosing Printo.ae for your printing needs.</p>
</div>
</div>




@endsection