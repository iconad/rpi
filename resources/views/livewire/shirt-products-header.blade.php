<div>
    <div class="p-5 h-full bg-gray-100 rounded lg:flex items-center justify-between">
        <div class="sort w-full md:pr-12">
            <div class="text-xl font-semibold pb-2"> {{$category->title}} </div>
            <hr class="w-full border-gray-500">
            <div class="font-semibold">
                <ul class="lg:flex items-center">
                    <li class="w-full lg:w-48 pt-2 lg:border-r lg:border-gray-500 flex items-center justify-between">
                        <div class="flex items-center space-x-1">
                            <span>
                                <svg class="fill-current w-5 h-5" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path d="M47 12a2 2 0 00-2-2H24a2 2 0 000 4h21a2 2 0 002-2zM3 14h5a6 6 0 100-4H3a2 2 0 000 4zm11-4a2 2 0 11-2 2 2 2 0 012-2zM45 22h-7a6 6 0 100 4h7a2 2 0 000-4zm-13 4a2 2 0 112-2 2 2 0 01-2 2zM22 22H3a2 2 0 000 4h19a2 2 0 000-4zM45 34H28a2 2 0 000 4h17a2 2 0 000-4zM18 30a6 6 0 00-6 4H3a2 2 0 000 4h9a6 6 0 106-8zm0 8a2 2 0 112-2 2 2 0 01-2 2z"/></svg>
                            </span>
                            <span>
                                Filter
                            </span>
                        </div>
                        <div class="lg:pr-3">
                            <label>
                            <span id="isSidebarCheckboxBox" class="cursor-pointer flex items-center border-2 border-gray-500 w-16 h-5 rounded overflow-hidden">
                                <span id="isSidebarCheckboxTick" class="flex items-center justify-center w-1/2 h-full bg-gray-500 text-white">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                                </span>
                                <span id="isSidebarCheckboxCross" class="flex items-center justify-center w-1/2 h-full bg-gray-500 text-white">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                            </span>
                            <input onchange="toggleSidebar(this)" id="isSidebarCheckbox" class="hidden" type="checkbox">
                            </label>
                        </div>
                    </li>
                    <li class="w-auto mt-6 lg:mt-0 lg:pt-2 flex items-center justify-between">
                        <div class="lg:pl-3 flex items-center space-x-1">
                            <span>
                                <svg class="fill-current w-5 h-4" xmlns="http://www.w3.org/2000/svg"><path d="M0 12h6v-2H0v2zM0 0v2h18V0H0zm0 7h12V5H0v2z" fill="#000" fill-rule="evenodd"/></svg>
                            </span>
                            <span>
                                Sort By
                            </span>
                        </div>

                        <form action="/products/shirts/{{$category->slug}}" method="get">

                        @if(isset($_GET['colors']))
                            @foreach ($_GET['colors'] as $color)
                                <input class="hidden" type="checkbox" name="colors[]" value="{{$color}}" checked>
                            @endforeach
                        @endif

                        @if(isset($_GET['genders']))
                            @foreach ($_GET['genders'] as $item)
                                <input class="hidden" type="checkbox" name="genders[]" value="{{$item}}" checked>
                            @endforeach
                        @endif

                        @if(isset($_GET['necks']))
                            @foreach ($_GET['necks'] as $item)
                                <input class="hidden" type="checkbox" name="necks[]" value="{{$item}}" checked>
                            @endforeach
                        @endif

                        @if(isset($_GET['materials']))
                            @foreach ($_GET['materials'] as $item)
                                <input class="hidden" type="checkbox" name="materials[]" value="{{$item}}" checked>
                            @endforeach
                        @endif

                        @if(isset($_GET['types']))
                            @foreach ($_GET['types'] as $item)
                                <input class="hidden" type="checkbox" name="types[]" value="{{$item}}" checked>
                            @endforeach
                        @endif
                        @if(isset($_GET['search']))
                        <input type="hidden" name="search" value="{{ $_GET['search'] }}">
                        @endif

                        <div class="pr-3 ml-5">
                           <select name="sort" onChange="this.form.submit()" class="focus:outline-none bg-transparent">
                               <option
                               @if( !isset($_GET['sort']) || $_GET['sort'] === 'newest') selected @endif
                               value="newest">Newest</option>

                               <option
                               @if(isset($_GET['sort']) && $_GET['sort'] === 'low-to-high') selected @endif
                               value="low-to-high">Low To High (Price)</option>

                               <option
                               @if(isset($_GET['sort']) && $_GET['sort'] === 'high-to-low') selected @endif
                               value="high-to-low">High To Low (Price)</option>
                           </select>
                        </div>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
        <div class="search w-20rem flex items-center mt-5 lg:mt-0 lg:pb-5">
            <div class="mr-2">
                <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 14a8 8 0 111-1l6 5-2 2-5-6zm-5 0A6 6 0 108 2a6 6 0 000 12z"/></svg>
            </div>
            <div class="w-full">
                <form action="/products/shirts/{{$category->slug}}" method="get">

                @if(isset($_GET['colors']))
                    @foreach ($_GET['colors'] as $color)
                        <input class="hidden" type="checkbox" name="colors[]" value="{{$color}}" checked>
                    @endforeach
                @endif

                @if(isset($_GET['genders']))
                    @foreach ($_GET['genders'] as $item)
                        <input class="hidden" type="checkbox" name="genders[]" value="{{$item}}" checked>
                    @endforeach
                @endif

                @if(isset($_GET['necks']))
                    @foreach ($_GET['necks'] as $item)
                        <input class="hidden" type="checkbox" name="necks[]" value="{{$item}}" checked>
                    @endforeach
                @endif

                @if(isset($_GET['materials']))
                    @foreach ($_GET['materials'] as $item)
                        <input class="hidden" type="checkbox" name="materials[]" value="{{$item}}" checked>
                    @endforeach
                @endif

                @if(isset($_GET['types']))
                    @foreach ($_GET['types'] as $item)
                        <input class="hidden" type="checkbox" name="types[]" value="{{$item}}" checked>
                    @endforeach
                @endif

                @if(isset($_GET['sort']))
                    <input type="hidden" name="sort" value="{{ $_GET['sort'] }}">
                @endif

                <input type="search" value="@if(isset($_GET['search'])){{$_GET['search']}}@endif" placeholder="Search in {{$category->title}} " class="w-full border-b border-gray-500  bg-transparent focus:outline-none" name="search" id="search">
                </form>
            </div>
        </div>
    </div>

</div>
