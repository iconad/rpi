@extends('layouts.app')

@section('content')

<section class="pages-wrapper my-10">

    <div class="pages-cover h-22rem relative bg-no-repeat bg-center bg-cover" style="background-image: url(https://www.printarabia.ae/img/static/design/pro-design-service/banner/pro-design-service1200x300.jpg)">
        <div class="absolute w-full left-0 bottom-0 p-10">
            <h1 class="text-6xl text-white font-bold leading-none">Pro Design Service</h1>
        </div>
    </div>

    <div class="my-24 text-center text-gray-900">
        <p class="text-3xl font-semibold mb-1">No Design? No Problem.</p>
        <p class="text-base">Let our expert designers help you. We design all — from Business Cards, to Flyers, Brochures, Posters, and what not!</p>
    </div>

    <div>
        <div class="flex">
            <div class="w-full pr-0 md:pr-16 border-r border-gray-500">
                <div class="text-primary-500">
                    <span class="flex items-center justify-center w-24 h-24 rounded-full border border-primary-500">
                        <svg class="fill-current w-16 h-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 16l-6-6-1 2 8 8 1-1 7-7-1-2-6 6V0H9z"/></svg>
                    </span>
                </div>
                <div class="text-sec font-semibold text-2xl my-5">What We Need</div>
                <ul>
                    <li class="mb-5">
                        <div class="text-xl mb-1 font-semibold text-gray-900">Final Text</div>
                        <p class="text-gray-900">Provide final proof-read text in a digital format. Please no scans
                            or faxes that needs to be typed out.</p>
                    </li>
                    <li class="mb-5">
                        <div class="text-xl mb-1 font-semibold text-gray-900">Hi-resolution Images</div>
                        <p class="text-gray-900">Images you would like to use. Quality must be high
                            resolution (minimum 300dpi).</p>
                    </li>
                    <li class="mb-5">
                        <div class="text-xl mb-1 font-semibold text-gray-900">Graphics</div>
                        <p class="text-gray-900">Graphics, logos or maps in vector format (PDF/AI). If none
                            are available, please refer to our Art Working Services below.</p>
                    </li>
                    <li class="mb-5">
                        <div class="text-xl mb-1 font-semibold text-gray-900">Design Sketch</div>
                        <p class="text-gray-900">Provide a sketch of design/layout as a sample indicating
                            what should go where.</p>
                    </li>
                </ul>

                <design-sketch-samples linktext="See Samples"></design-sketch-samples>

            </div>
            <div class="w-full pl-0 md:pl-16">

                <div class="text-primary-500">
                    <span class="flex items-center justify-center w-24 h-24 rounded-full border border-primary-500">
                        <svg class="fill-current w-16 h--16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 4l-6 6-1-2 8-8 1 1 7 7-1 2-6-6v16H9V4z"/></svg>
                    </span>
                </div>
                <div class="text-sec font-semibold text-2xl my-5">What You Will Get</div>
                <ul>
                    <li class="mb-5">
                        <div class="text-xl mb-1 font-semibold text-gray-900">Design Proof</div>
                        <p class="text-gray-900">One (1) design proof (jpg) will be sent to you by email.
                            After reviewing your feedback and comments the design
                            will be adjusted accordingly. You will get three (3) rounds
                            of revisions to adjust the design to your liking. Further
                            changes after the 3 rounds will incur additional design fees.
                            </p>
                    </li>

                    <li class="mb-5">
                        <p class="text-primary-500 font-medium"> <span class="font-semibold">NOTE: </span> As standard, we do not release our working design
                            files. Should you need them, we will release the artwork for
                            an additional fee. The release fee is 100% of the original
                            design fee.</p>
                    </li>
                </ul>

                <a href="#" class="text-primary-500 text-lg theme-link font-medium">Refer to ‘Data Submission Guidelines’</a>

            </div>
        </div>
    </div>

</section>

<section class="design-fee my-12">
    <div class="text-sec font-semibold text-2xl my-5">Design Fee</div>

    <table class="table-responsive w-full text-left text-lg">
        <thead class="bg-primary-500 text-white">
          <tr>
            <th class="px-8 py-4">Product</th>
            <th class="px-8 py-4">Size/Area</th>
            <th class="px-8 py-4">
                <span class="block">Fees</span>
                <span class="block text-sm font-light">English Only</span>
            </th>
            <th class="px-8 py-4">
                <span class="block">Fees</span>
                <span class="block text-sm font-light">English + Arabic</span>
            </th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border px-6 py-3 capitalize font-semibold">Business Card</td>
                <td class="border px-6 py-3">UAE Standard: 90x50mm</td>
                <td class="border px-6 py-3">100 AED</td>
                <td class="border px-6 py-3">150 AED</td>
            </tr>
            <tr>
                <td class="border px-6 py-3"></td>
                <td class="border px-6 py-3">EU Standard: 85x55mm</td>
                <td class="border px-6 py-3">100 AED</td>
                <td class="border px-6 py-3">150 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3 capitalize font-semibold">Office Stationery</td>
                <td class="border border-gray-400 px-6 py-3">Letterhead: A4, A5, DL</td>
                <td class="border border-gray-400 px-6 py-3">200 AED</td>
                <td class="border border-gray-400 px-6 py-3">300 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Envelope: DL, C6, C6, C4</td>
                <td class="border border-gray-400 px-6 py-3">200 AED</td>
                <td class="border border-gray-400 px-6 py-3">300 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">NCR Pad: A4, A5</td>
                <td class="border border-gray-400 px-6 py-3">200 AED</td>
                <td class="border border-gray-400 px-6 py-3">300 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Presentation Folder: A4</td>
                <td class="border border-gray-400 px-6 py-3">700 AED</td>
                <td class="border border-gray-400 px-6 py-3">1000 AED</td>
            </tr>
            <tr>
                <td class="border px-6 py-3 capitalize font-semibold">Flyers</td>
                <td class="border px-6 py-3">A6: 100x 148mm</td>
                <td class="border px-6 py-3">200 AED</td>
                <td class="border px-6 py-3">300 AED</td>
            </tr>
            <tr>
                <td class="border px-6 py-3"></td>
                <td class="border px-6 py-3">A5: 148x210mm</td>
                <td class="border px-6 py-3">400 AED</td>
                <td class="border px-6 py-3">600 AED</td>
            </tr>
            <tr>
                <td class="border px-6 py-3"></td>
                <td class="border px-6 py-3">A4: 210x297mm</td>
                <td class="border px-6 py-3">800 AED</td>
                <td class="border px-6 py-3">1,100 AED</td>
            </tr>
            <tr>
                <td class="border px-6 py-3"></td>
                <td class="border px-6 py-3">A3: 297x420mm</td>
                <td class="border px-6 py-3">1,200 AED</td>
                <td class="border px-6 py-3">1,600 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3 capitalize font-semibold">Marketing Materials</td>
                <td class="border border-gray-400 px-6 py-3">Postcard: A6</td>
                <td class="border border-gray-400 px-6 py-3">200 AED</td>
                <td class="border border-gray-400 px-6 py-3">300 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Sticker: Up to 120x120mm</td>
                <td class="border border-gray-400 px-6 py-3">200 AED</td>
                <td class="border border-gray-400 px-6 py-3">300 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Tag: Up to 120x120mm</td>
                <td class="border border-gray-400 px-6 py-3">200 AED</td>
                <td class="border border-gray-400 px-6 py-3">300 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Ticket: Up to A5</td>
                <td class="border border-gray-400 px-6 py-3">250 AED</td>
                <td class="border border-gray-400 px-6 py-3">350 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Table Tent: Up to A5</td>
                <td class="border border-gray-400 px-6 py-3">400 AED</td>
                <td class="border border-gray-400 px-6 py-3">400 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Paper Bag: Up to A4</td>
                <td class="border border-gray-400 px-6 py-3">600 AED</td>
                <td class="border border-gray-400 px-6 py-3">800 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Door Hanger: Long A5, Long A4</td>
                <td class="border border-gray-400 px-6 py-3">550 AED</td>
                <td class="border border-gray-400 px-6 py-3">800 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Roll-up Banner: 850x2,000mm</td>
                <td class="border border-gray-400 px-6 py-3">600 AED</td>
                <td class="border border-gray-400 px-6 py-3">800 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">A4 Menu/Profile (Half/ Trifold)</td>
                <td class="border border-gray-400 px-6 py-3">1,000 AED</td>
                <td class="border border-gray-400 px-6 py-3">1,400 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">A3 Menu/Profile (Half/ Trifold)</td>
                <td class="border border-gray-400 px-6 py-3">1,400 AED</td>
                <td class="border border-gray-400 px-6 py-3">1,800 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">A1 Poster: 594x841mm</td>
                <td class="border border-gray-400 px-6 py-3">1,200 AED</td>
                <td class="border border-gray-400 px-6 py-3">1,400 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">A0 Poster: 841x1,189mm</td>
                <td class="border border-gray-400 px-6 py-3">1,700 AED</td>
                <td class="border border-gray-400 px-6 py-3">2,000 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Catalogue/Booklet: A4 (per page)</td>
                <td class="border border-gray-400 px-6 py-3">200 AED</td>
                <td class="border border-gray-400 px-6 py-3">300 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Catalogue/Booklet: A5 (per page)</td>
                <td class="border border-gray-400 px-6 py-3">150 AED</td>
                <td class="border border-gray-400 px-6 py-3">200 AED</td>
            </tr>
            <tr>
                <td class="border px-6 py-3 capitalize font-semibold">Calenders</td>
                <td class="border px-6 py-3">Desktop Calendar: A5 (per page)</td>
                <td class="border px-6 py-3">100 AED</td>
                <td class="border px-6 py-3">200 AED</td>
            </tr>
            <tr>
                <td class="border px-6 py-3"></td>
                <td class="border px-6 py-3">Wall Calendar: A5 (per page)</td>
                <td class="border px-6 py-3">150 AED</td>
                <td class="border px-6 py-3">250 AED</td>
            </tr>
            <tr>
                <td class="border px-6 py-3"></td>
                <td class="border px-6 py-3">Wall Calendar: A4 (per page)</td>
                <td class="border px-6 py-3">200 AED</td>
                <td class="border px-6 py-3">300 AED</td>
            </tr>
            <tr>
                <td class="border px-6 py-3"></td>
                <td class="border px-6 py-3">Banner Calendar: 300x660mm</td>
                <td class="border px-6 py-3">900 AED</td>
                <td class="border px-6 py-3">1,200 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3 capitalize font-semibold">Logo Design</td>
                <td class="border border-gray-400 px-6 py-3">Logo/Logotype:</td>
                <td class="border border-gray-400 px-6 py-3">500 AED</td>
                <td class="border border-gray-400 px-6 py-3">750 AED</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-gray-400 px-6 py-3"></td>
                <td class="border border-gray-400 px-6 py-3">Logo Recreation/Tracing</td>
                <td class="border border-gray-400 px-6 py-3">250 AED</td>
                <td class="border border-gray-400 px-6 py-3">300 AED</td>
            </tr>
        </tbody>
      </table>
      <div class="text-right my-5">
        <a href="http://" class="red-button">Order Now</a>
      </div>
</section>


<section class="my-12">
    <div class="flex flex-wrap md:flex-nowrap">
        <div class="w-full md:w-1/4">
            <div class="text-sec text-xl font-semibold mt-5">Artworking Service</div>
        </div>
        <div class="w-full">
            <div class="content">
                <p>We primarily accept data created in Adobe Photoshop (PSD, EPS),Illustrator (AI, EPS) or Indesign
                    (PDF). Should data prepared in other file formats have problems, we can offer our Art Working
                    Services. For a small fee of 50 AED, we can perform non-creative services to make your print data
                    ready. Such art working services include:</p>
                    <ul>
                        <li>Updating previously printed or design files with new content (new names, info)</li>
                        <li>Troubleshooting data (text close to edges, replacing low-res images with better
                            quality ones).</li>
                    </ul>
                    <a href="http://" class="theme-link text-primary-500 font-medium">Click to find out more</a>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap md:flex-nowrap mt-8">
        <div class="w-full md:w-1/4">
            <div class="text-sec text-xl font-semibold mt-5">Recreation Service</div>
        </div>
        <div class="w-full">
            <div class="content">
                <p>If you don’t have the original editable files, or printable data, we can re-make print data from your
                    scan/picture/printed sample for a fee of 50% the above design fees for the corresponding size. <u>This
                    is not a creative service.</u> We will recreate the artwork as close to the original document as possible,
                    however fonts and colours may have to be changed. (Colour matching to the original scan/picture/
                    printed sample will be close to, not exact — unless you know CMYK colour values).</p>
                    <a href="http://" class="theme-link text-primary-500 font-medium">Click to find out more</a>
            </div>
        </div>
    </div>
</section>






@endsection
