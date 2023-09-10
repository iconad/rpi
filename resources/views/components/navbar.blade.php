{{-- <main-navbar></main-navbar> --}}
<header class="bg-white shadow-lg hidden md:block">


    <!-- Navigation with Search Bar -->
    <nav class="bg-white text-black py-4 px-14 md:px-15 flex justify-between items-center">
        <div class="flex items-center md:ml-4">
            <!-- Add your logo here -->
            <a href="#"><img src="{{ asset('images/home/logo.png') }}" alt="Printo" class="h-16 w-30"></a>
        </div>

        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-700 hover:text-red-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0,0,256,256">
                    <path
                        d="M256 166.32v-76.64q0-6.17-4.38-10.54t-10.54-4.38h-236.16q-6.16 0-10.54 4.38t-4.38 10.54v76.64q0 6.16 4.38 10.54t10.54 4.38h236.16q6.16 0 10.54-4.38t4.38-10.54z" />
                </svg>
            </button>
        </div>



        <ul id="mobile-menu" class="hidden md:flex space-x-6 flex-nowrap pl-4 pr-2">
            <li><a href="https://printo.ae/categories/print-products"
                    class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Printing</a>
            </li>
            <li><a href="https://printo.ae/categories/packaging"
                    class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Packaging</a>
            </li>
            <li><a href="https://printo.ae/categories/banners-displays"
                    class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Banners
                    &
                    Displays</a></li>
            <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Merch</a>
            </li>
            <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Corporate</a>
            </li>
            <li><a href="https://printo.ae/categories/wallpapers"
                    class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Wallpapers</a>
            </li>
        </ul>
        <div class="hidden md:flex relative items-center">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0,0,256,256">
                    <g transform="translate(64,64) scale(0.5,0.5)">
                        <g fill="#000000" fill-rule="nonzero">
                            <g transform="scale(5.12,5.12)">
                                <path
                                    d="M21,3c-9.37891,0 -17,7.62109 -17,17c0,9.37891 7.62109,17 17,17c3.71094,0 7.14063,-1.19531 9.9375,-3.21875l13.15625,13.125l2.8125,-2.8125l-13,-13.03125c2.55469,-2.97656 4.09375,-6.83984 4.09375,-11.0625c0,-9.37891 -7.62109,-17 -17,-17zM21,5c8.29688,0 15,6.70313 15,15c0,8.29688 -6.70312,15 -15,15c-8.29687,0 -15,-6.70312 -15,-15c0,-8.29687 6.70313,-15 15,-15z">
                                </path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <input type="text" placeholder=" "
                class="border-2 border-gray-700 rounded-l-full rounded-r-full px-4 py-2 pl-12 pr-10">
            <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-700 mr-4">
                Search
            </span>
        </div>
    </nav>
</header>


<!-- Header for mobile -->
<header class="sm:hidden flex items-center justify-between p-4 bg-white">
    <div class="flex items-center">
        <img src="{{ asset('images/home/logo.png') }}" alt="Printo" class="w-16 logoheader h-8 mr-4">
        <div class="hidden sm:block">
            <input type="text" placeholder="Search" class="bg-gray-200 px-2 py-1 rounded-md">
        </div>
    </div>
    <div class="flex items-center">
        <button id="searchButton" class="mr-6">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50">
                <path
                    d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z">
                </path>
            </svg>
        </button>
        <button id="menuButton">
            <div class="w-6 h-px bg-gray-600 mb-1"></div>
            <div class="w-6 h-px bg-gray-600 mb-1"></div>
            <div class="w-6 h-px bg-gray-600"></div>
        </button>
    </div>
</header>

<!-- Search bar (hidden by default) -->
<div id="searchBar" class="hidden p-4 bg-white shadow-md">
    <input type="text" placeholder="Search" class="w-full bg-gray-200 px-2 py-1 rounded-md">
</div>

<!-- Mobile menu (hidden by default) -->
<div id="mobileMenu" class="sm:hidden fixed inset-y-0 right-0 w-1/2 h-screen p-4 transform translate-x-full">
    <ul class="space-y-4">
        <li><a href="https://printo.ae/categories/print-products" class="text-gray-800 hover:text-gray-600">Printing</a>
        </li>
        <li><a href="https://printo.ae/categories/packaging" class="text-gray-800 hover:text-gray-600">Packaging</a>
        </li>
        <li><a href="https://printo.ae/categories/banners-displays" class="text-gray-800 hover:text-gray-600">Banners &
                Displays</a></li>
        <li><a href="#" class="text-gray-800 hover:text-gray-600">Merch</a></li>
        <li><a href="#" class="text-gray-800 hover:text-gray-600">Corporate</a></li>
        <li><a href="https://printo.ae/categories/wallpapers" class="text-gray-800 hover:text-gray-600">Wallpapers</a>
        </li>
        <li><a href="https://printo.ae/estimate" class="text-gray-800 hover:text-gray-600">Estimate</a></li>
        <li><a href="#" class="text-gray-800 hover:text-gray-600">Blog</a></li>
        <li><a href="https://printo.ae/pages/about-us" class="text-gray-800 hover:text-gray-600">About Us</a></li>
    </ul>
    <button id="closeMenuButton" class="text-gray-600 hover:text-gray-800 absolute top-4 right-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
            </path>
        </svg>
    </button>
</div>
{{-- y[^M8@XV>Yp],/bJ --}}