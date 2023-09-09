<div class="theme-container">

     {{-- <main-navbar></main-navbar> --}}


     <nav class="bg-white text-black py-4 flex justify-between items-center">
          <div class="flex items-center">
               <!-- Add your logo here -->
               <a href="#"><img src="{{ asset('images/home/logo.png') }}" alt="Printo" class="h-16 w-30"></a>
          </div>

          <div class="md:hidden">
               <button id="mobile-menu-button" class="text-gray-700 hover:text-red-300 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0,0,256,256">
                         <path d="M256 166.32v-76.64q0-6.17-4.38-10.54t-10.54-4.38h-236.16q-6.16 0-10.54 4.38t-4.38 10.54v76.64q0 6.16 4.38 10.54t10.54 4.38h236.16q6.16 0 10.54-4.38t4.38-10.54z" />
                    </svg>
               </button>
          </div>

          <ul id="mobile-menu" class="hidden md:flex space-x-6 flex-nowrap">
               <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Printing</a>
               </li>
               <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Packaging</a>
               </li>
               <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Banners &
                         Displays</a></li>
               <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Merch</a>
               </li>
               <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Corporate</a>
               </li>
               <li><a href="#" class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">Wallpapers</a>
               </li>
          </ul>
          <div class="hidden md:flex relative items-center">
               <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0,0,256,256">
                         <g transform="translate(64,64) scale(0.5,0.5)">
                              <g fill="#000000" fill-rule="nonzero">
                              <g transform="scale(5.12,5.12)">
                                   <path d="M21,3c-9.37891,0 -17,7.62109 -17,17c0,9.37891 7.62109,17 17,17c3.71094,0 7.14063,-1.19531 9.9375,-3.21875l13.15625,13.125l2.8125,-2.8125l-13,-13.03125c2.55469,-2.97656 4.09375,-6.83984 4.09375,-11.0625c0,-9.37891 -7.62109,-17 -17,-17zM21,5c8.29688,0 15,6.70313 15,15c0,8.29688 -6.70312,15 -15,15c-8.29687,0 -15,-6.70312 -15,-15c0,-8.29687 6.70313,-15 15,-15z">
                                   </path>
                              </g>
                              </g>
                         </g>
                    </svg>
               </div>
               <input type="text" placeholder=" " class="border-2 border-gray-700 rounded-l-full rounded-r-full px-4 py-2 pl-12 pr-10">
               <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-700 mr-4">
                    Search
               </span>
          </div>
     </nav>
     
</div>
