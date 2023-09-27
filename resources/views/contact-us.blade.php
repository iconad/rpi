@extends('layouts.printo')

@section('content')
<div class="contact-us md:p-5 p-4 md:px-20 sm:block hidden">
    <div class="text-left py-8">
    <h1 class="text-3xl md:text-5xl mb-1">Contact Us.</h1>
        <p class="text-3xl md:text-5xl mb-6">Reach Out Today.</p>
    </div>

    <div class="flex flex-wrap justify-between form-blocks sm:flex hidden">
        <!-- Left side with 3 smaller centered blocks in a grid -->
        <div class="w-full md:w-1/2 mb-4 md:mb-0 grid grid-cols-1 md:grid-cols-3 gap-4 clientsblock">
            <!-- Block 1 -->
            <div class="border rounded-lg smaller-block clients">
                <h3 class="text-3xl font-semibold mb-2">200+</h3>

                <h2 class="text-xs mb-20">Clients</h2>
                <p>Over 200 satisfied clients trust our expertise and exceptional services.</p>
            </div>
            <!-- Block 2 -->
            <div class="border rounded-lg smaller-block Projects">
                <h3 class="text-3xl font-semibold mb-2">300+</h3>
                <h2 class="text-xs project-padding">Projects</h2>
                <p>We've successfully completed over 300 projects, delivering outstanding results every time.</p>
            </div>
            <!-- Block 3 -->
            <div class="border rounded-lg smaller-block happyclients">
                <h3 class="text-3xl font-semibold mb-2">100%</h3>
                <h2 class="text-xs mb-20">Happy Clients</h2>
                <p>Our focus on client satisfaction ensures a 100% happiness rate with our services.</p>
            </div>
        </div>

        <!-- Right side with the form -->
        <div class="w-full md:w-1/2">
            <div class="border rounded-lg contact-form">
            <form class="p-0 md:p-6 rounded-lg py-6">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">NAME</label>
                <input type="text" name="name" class="w-full px-4 py-2 mb-4 border " placeholder="Full Name">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">PHONE NUMBER</label>
                <input id="phoneInput" name="phone" type="tel" class="w-full px-10 py-2 mb-4 border pl-10 "
                    style="width: 100% !important;" placeholder="Your Phone Number">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">EMAIL ADDRESS</label>
                <input type="email" name="email" class="w-full px-4 py-2 mb-4 border " placeholder="Email">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">MESSAGE</label>
                <textarea class="w-full px-4 py-2 mb-4 border " name="message" rows="6"
                    placeholder="Message"></textarea>

                <button class="bg-black text-white px-4 py-2 rounded-full">Send Message</button>
            </form>
            </div>
        </div>
    </div>


    
    <div class="flex justify-center mt-28">
    <!-- Phone block -->
    <div class="flex justify-center border contact-phone">
        <div class="phone-block w-1/2 text-center">
            <div class="icon-title">
                <!-- Phone icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21 .380a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.380-1.210l1.293-.970c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                </svg>
                <h3 class="text-xl">Phone</h3>
            </div>
           <a href="tel:+97165341113"> <p class="contact-p">+971 6 534 1113</p></a>
        </div>

        <!-- Email block -->
        <div class="phone-block w-1/2 text-center">
            <div class="icon-title">
                <!-- Email icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                <h3 class="text-xl">Email</h3>
            </div>
           <a href="mailto:info@printo.ae"> <p class="contact-p">info@printo.ae</p></a>
        </div>

        <!-- Location block -->
        <div class="phone-block w-1/2 text-center">
            <div class="icon-title">
                <!-- Location icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                <h3 class="text-xl">Location</h3>
            </div>
            <p class="contact-p">Sharjah, UAE</p>
        </div>
    </div>
</div>




    <!-- Full-width block with light green background -->
    <div class="reach mt-28">
        <div class="container mx-auto p-12 px-24">
            <h3 class="text-3xl md:text-5xl text-left font-semibold mb-8">How to Reach Out</h3>
            <p class="text-left text-xl mb-4 how-contact">Selecting the ideal printing partner to cater to your multifaceted needs, encompassing top-notch quality, blazing speed, and impeccable customer service, can often feel like a daunting task. But why settle for less when you can reach out to a print service that not only comprehends your requirements but also adds a touch of finesse?</p>
            <p class="text-left text-xl mb-4 how-contact">Embark on a seamless journey to bring your print projects to life, whether they involve flyers, brochures, business cards, posters, banners, or any other print collateral, at Printo.</p>
            <p class="text-left text-xl mb-4 how-contact">We are not just about meeting your budget, we are about exceeding your expectations. Let us transform your printing aspirations into a stunning reality, with a serious commitment to excellence.</p>
        </div>
    </div>
</div>



<!-- mobile version started from here -->

<div class="contact-us md:p-5 p-4 md:px-20 md:hidden">
    <div class="text-left py-8">
    <h1 class="text-3xl md:text-5xl mb-1">Contact Us.</h1>
        <p class="text-3xl md:text-5xl mb-6">Reach Out Today.</p>
    </div>

    <div class="flex flex-wrap justify-between px-8">
    <div class="w-full md:w-1/2">
        <!-- Right side with the form -->
            <div class="border rounded-lg contact-form">
            <form class="p-2 md:p-6 rounded-lg py-6">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">NAME</label>
                <input type="text" name="name" class="w-full px-4 py-2 mb-4 border " placeholder="Full Name">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">PHONE NUMBER</label>
                <input id="phoneInput" name="phone" type="tel" class="w-full px-10 py-2 mb-4 border pl-10 "
                    style="width: 100% !important;" placeholder="Your Phone Number">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">EMAIL ADDRESS</label>
                <input type="email" name="email" class="w-full px-4 py-2 mb-4 border " placeholder="Email">

                <label class="block mb-2 pt-6 text-1xl md:text-lg">MESSAGE</label>
                <textarea class="w-full px-4 py-2 mb-4 border " name="message" rows="6"
                    placeholder="Message"></textarea>

                <button class="bg-black text-white px-4 py-2 rounded-full">Send Message</button>
            </form>
            </div>
        </div>
    </div>


    
    <div class="flex justify-center mt-8">
    <!-- Phone block -->
    <div class="flex justify-center border contact-phone">
        <div class="phone-block w-1/4 text-center">
            <div class="icon-title">
                <!-- Phone icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-2 h-2 icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21 .380a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.380-1.210l1.293-.970c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                </svg>
                <h3 class="text-xs title-font">Phone</h3>
            </div>
           <a href="tel:+97165341113"> <p class="contact-p">+971 6 534 1113</p></a>
        </div>

        <!-- Email block -->
        <div class="phone-block w-1/4 text-center">
            <div class="icon-title">
                <!-- Email icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-2 h-2 icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                <h3 class="text-xs title-font">Email</h3>
            </div>
           <a href="mailto:info@printo.ae"> <p class="contact-p">info@printo.ae</p></a>
        </div>

        <!-- Location block -->
        <div class="phone-block w-1/4 text-center">
            <div class="icon-title">
                <!-- Location icon -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-2 h-2 icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                </svg>
                <h3 class="text-xs title-font">Location</h3>
            </div>
            <p class="contact-p">Sharjah, UAE</p>
        </div>
    </div>
</div>


<div class="w-full md:w-1/2 mb-4 md:mb-0 grid grid-cols-3 gap-5  mt-8">
            <!-- Block 1 -->
            <div class="border smaller-block clients">
                <h3 class="mobile-font-one font-semibold mb-2">200+</h3>

                <h2 class="mobile-font-two mb-16">Clients</h2>
                <p class="mobile-font-three">Over 200 satisfied clients trust our expertise and exceptional services.</p>
            </div>
            <!-- Block 2 -->
            <div class="border smaller-block Projects">
                <h3 class="mobile-font-one font-semibold mb-2">300+</h3>
                <h2 class="mobile-font-two project-padding">Projects</h2>
                <p class="mobile-font-three">We've successfully completed over 300 projects, delivering outstanding results every time.</p>
            </div>
            <!-- Block 3 -->
            <div class="border smaller-block happyclients">
                <h3 class="mobile-font-one font-semibold mb-2">100%</h3>
                <h2 class="mobile-font-two mb-16">Happy Clients</h2>
                <p class="mobile-font-three">Our focus on client satisfaction ensures a 100% happiness rate with our services.</p>
            </div>
        </div>




    <!-- Full-width block with light green background -->
    <div class="reach mt-8">
        <div class="container mx-auto p-8">
            <h3 class="text-3xl md:text-5xl text-left">How to</h3>
            <h3 class="text-3xl md:text-5xl text-left mb-6">Reach Out</h3>
            <p class="text-left text-xs mb-2 how-contact">Selecting the ideal printing partner to cater to your multifaceted needs, encompassing top-notch quality, blazing speed, and impeccable customer service, can often feel like a daunting task. But why settle for less when you can reach out to a print service that not only comprehends your requirements but also adds a touch of finesse?</p>
            <p class="text-left text-xs mb-2 how-contact">Embark on a seamless journey to bring your print projects to life, whether they involve flyers, brochures, business cards, posters, banners, or any other print collateral, at Printo.</p>
            <p class="text-left text-xs mb-2 how-contact">We are not just about meeting your budget, we are about exceeding your expectations. Let us transform your printing aspirations into a stunning reality, with a serious commitment to excellence.</p>
        </div>
    </div>
</div>


<script>
        // Wait for the DOM to be ready
        document.addEventListener('DOMContentLoaded', function () {
            // Find the element by class name
            var selectedFlag = document.querySelector('.iti--separate-dial-code .iti__selected-flag');

            // Check if the element exists
            if (selectedFlag) {
                // Change the background color to a new value (e.g., red)
                selectedFlag.style.backgroundColor = 'white';
            }
        });
    </script>
@endsection