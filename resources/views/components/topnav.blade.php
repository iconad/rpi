<div>

    <ul class="hidden lg:flex py-5 px-3 justify-end font-medium text-sm md:text-base">

            <li class="mr-4  flex justify-start  text-primary-500">

        <a  class="flex items-center">
                <span class="block mr-2 ">
                    <img class="w-4" src="{{ asset('assets/images/call-icon.png') }}" alt="">
                </span>
                <span class="block hover:text-sec tracking-wider">+971 6 534 1113</span>
            </a>
           
            <a href="mailto:info@printo.ae" class="flex items-center ml-4">
                <span class="block mr-2">
                    <img class="w-4" src="{{ asset('assets/images/email.png') }}" alt="">
                </span>
                <span class="block hover:text-sec tracking-wider">info@printo.ae</span>
            </a>

        </li>
        <li class="flex items-center ml-auto text-primary-500 hover:text-sec">
            @if (Auth::check())
                <top-navbar-dropdown :roles="{{Auth::user()->getRoleNames()}}" :user="{{Auth::user()}}"></top-navbar-dropdown>
            @else
            <a href="/login" class="block">
                Account / Sign In
            </a>
            @endif

        </li>


     
        <a  href="https://www.facebook.com/Printo-103831525403061" class="text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5 ml-4" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"> </path>
                            </svg>
                        </a>



                        <a href ="https://twitter.com/PrintoUae" class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">

                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                             </svg>
                        </a>
                        <a href="https://www.instagram.com/printoae/" class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/company/printo-uae" class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                                <path stroke="none"
                                    d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                </path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                            </svg>
                        </a>
    </ul>
</div>
