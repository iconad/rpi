@extends('layouts.app')

@section('content')

<section class="pages-wrapper my-10">

    <div class="pages-cover h-22rem relative bg-no-repeat bg-center bg-cover" style="background-image: url(https://www.printarabia.ae/img/static/design/artworking-service/banner/artworking-service1200x300.jpg)">
        <div class="absolute w-full left-0 bottom-0 p-5 md:p-10">
            <h1 class="text-5xl md:text-6xl text-white font-bold leading-none">Artworking Service</h1>
        </div>
    </div>


    <div class="my-24 text-center text-gray-900">
        <p class="text-3xl font-semibold mb-1">Send us what you have. We’ll make it work.</p>
        <p class="text-base">Need some changes to your data, but don’t have design software?</p>
        <p class="text-base">Already have a design, but you don’t have access to the working files?</p>
        <p class="text-base">Only have a printed copy and you lost your original data? This service is for you!</p>
    </div>

    <div class="mt-12">
        <div class="text-sec font-semibold text-2xl my-5">We don’t just print, we fix your design too!</div>
        <div class="content">
            <p class="text-gray-900">In addition to our complete design services, we also offer <span class="font-bold">Artworking Services and Data Recreation Services</span> – should you only require small modifications to pre-existing data. Our creative team of in-house designers are ready to handle any task, big or small.</p>
        <p class="text-gray-900">As design and print professionals, we use our expertise to guide you and your project along the way, recommending any special
            papers or finishings which would take your project from 0 to 100. We work in a strictly Mac environment using Adobe Design
            softwares (Illustrator, Photoshop or InDesign).</p>
        </div>
        <div class="flex flex-wrap md:flex-nowrap mt-16">
            <div class="w-full pr-0 md:pr-16 border-r border-gray-500">
                <div class="text-primary-500">
                    <span class="flex items-center justify-center w-24 h-24 rounded-full border border-primary-500">
                        <svg class="fill-current w-16 h-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M360 127l-30 8-9-31 31-8z"/><path d="M142 480H47L167 32h135l11 41 31-8-17-65H142L6 512h161l23-96h12v-32h-38zM377 188l-31 8-8-30 31-9z"/><path d="M370 240a136 136 0 100 272 136 136 0 000-272zm0 240a104 104 0 110-208 104 104 0 010 208z"/><path d="M354 377l-20-20-23 22 43 44 76-76-23-22zM234 151l21 75 30-8-32-122h-37l-60 224h62v-32h-20z"/></svg>
                    </span>
                </div>
                <div class="text-sec font-semibold text-2xl my-5">Data Artworking Services</div>
                <ul>
                    <li class="mb-5">
                        <p class="text-gray-900">Send us your data and tell us what changes or modifications you need applied. For a small fee (starting from) 50 Dhs, we perform non-creative services to make your files ready for print. Artworking services include but are not limited to:</p>
                    </li>
                    <li class="mb-5">
                        <div class="text-lg mb-1 font-semibold text-gray-900">Updating previously designed or printed files</div>
                        <ul class="ml-5 list-disc">
                            <li class="mt-2">With new information (names, titles, addresses)</li>
                            <li class="mt-1">By replacing layout content / logos</li>
                            <li class="mt-1">Applying image retouching / enhancements</li>
                            <li class="mt-1">Adjusting / tweaking colours</li>
                            <li class="mt-1">Logo / Graphic vectorisation</li>
                        </ul>
                    </li>
                    <li class="mb-5">
                        <div class="text-lg mb-1 font-semibold text-gray-900">Troubleshooting data</div>
                        <ul class="ml-5 list-disc">
                            <li class="mt-2">Adding necessary final touches (bleed, safety)</li>
                            <li class="mt-1">Converting RGB and Pantone data to CMYK</li>
                            <li class="mt-1">Replacing low resolution images with better quality ones</li>
                            <li class="mt-1">Adjusting content if text is too close to the edges</li>
                            <li class="mt-1">Resizing data from one size to another</li>
                        </ul>
                    </li>
                </ul>


            </div>
            <div class="w-full pl-0 md:pl-16">

                <div class="text-primary-500">
                    <span class="flex items-center justify-center w-24 h-24 rounded-full border border-primary-500">
                        <svg class="fill-current w-16 h-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M219 237v11a26 26 0 0053 0v-11a26 26 0 00-53 0zm37 0v11a10 10 0 01-21 0v-11a10 10 0 0121 0z"/><path d="M382 0c-4 0-8 4-8 8v29c0 15-12 27-26 27h-58c-29 0-52 23-52 52v33c-65 4-116 57-116 123v116a124 124 0 00247 0V272c0-66-51-119-116-123v-33c0-20 17-37 37-37h58c23 0 42-18 42-42V8c0-4-3-8-8-8zm-29 272v116a108 108 0 01-215 0V272a108 108 0 01215 0z"/></svg>
                    </span>
                </div>
                <div class="text-sec font-semibold text-2xl my-5">Data Recreation Service</div>
                <ul>
                    <li class="mb-1">
                        <p class="text-gray-900">If you do not have the original working files, editable files or printable files, we can recreate workable and editable files from your scan, picture or printed sample. The recreation fee would be 50% of the Design Fee for the corresponding size (as per the prices on our Design Services page)</p>
                    </li>

                    <li class="mb-5">
                        <a href="#" class="text-primary-500 text-sm theme-link font-medium">Check here</a>
                    </li>

                    <li class="mb-5">
                        <p class="text-primary-500 font-medium"> <span class="font-semibold">NOTE: </span> Recreations are not a Design Service. We will recreate artwork as close as possible to your original sample, however fonts and colours may have to be changed (unless you can provide us with both the font used, and CMYK colour values). Where possible, we will try to select colours as close as possible to your sample, however it may not always be exact. The proof will be provided for your approval before proceeding for printing.</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border p-10 mt-10 border-gray-500 relative">
            <div class="arrow-top rotate-45 transform"></div>
            <div class="flex flex-wrap md:flex-nowrap">
                <div class="w-auto mb-10 md:mb-0">
                    <img src="https://www.printarabia.ae/img/static/design/artworking-service/icons/digital-format.png" alt="ai iamge" class="w-full mx-auto">
                </div>
                <div class="w-full md:pl-12">
                    <div class="text-primary-500 font-semibold text-xl">We accept editable files in these formats:</div>
                    <ul class="my-2 list-disc ml-5">
                        <li class="mt-2"><span class="text-sec">Adobe Illustrator</span> — ai, .eps, .pdf</li>
                        <li class="mt-1"><span class="text-sec">Adobe Photoshop </span> — .psd, .tiff</li>
                        <li class="mt-1"><span class="text-sec">Adobe InDesign </span> — .indd (packaged files) or .pdf</li>
                    </ul>
                    <p class="text-gray-900">
                        Should your file be prepared in a different software, as long as the file is editable we should be able to work with it, without much problem. Unfortunately, flattened images (.jpg) are not editable and would require recreation services.
                    </p>
                    <hr class="my-5">
                    <div class="flex flex-wrap md:flex-nowrap justify-center items-center">
                        <div class="w-full pr-5">
                            <p>
                                If you would like to use our artworking services, place your online order, and select the option ‘pay at the time of proofing’. Then, send us an email with your required updates.
                            </p>
                        </div>
                        <div class="w-auto pl-5 whitespace-nowrap">
                            <a href="#" class="red-button">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<section class="my-12">
    <div class="flex flex-wrap md:flex-nowrap">
        <div class="w-full md:w-1/4">
            <div class="text-sec text-xl font-semibold mt-5">Our Design Services</div>
        </div>
        <div class="w-full">
            <div class="content">
                <p>We also offer full-scale design services (in English & Arabic languages) that are the projects we build and design from the ground up. We collect essential information, materials, and your design brief. Our design team creates a draft of your design. Then, using your feedback and 3 rounds of revisions we adjust your layout to your liking.</p>
                <a href="http://" class="theme-link text-primary-500 font-medium">Click to find out more</a>
            </div>
        </div>
    </div>
</section>






@endsection
