<div>

    @livewire('shirt-products-header', [
        'category' => $category,
        'selectedColors' => $selectedColors,
        'colors' => $colors
    ])


    <div class="lg:flex">
        <div id="productSidebar" class=" {{ $isSidebar ? 'w-1/3' : 'hidden' }} ">
            <div class="mt-5 lg:m-5 ml-0 h-full rounded overflow-hidden">
                <form action="/products/shirts/{{$category->slug}}" method="get">

                <div class="p-3 product-filter bg-gray-100">

                    @if(isset($_GET['sort']))
                    <input type="hidden" name="sort" value="{{ $_GET['sort'] }}">
                    @endif
                    @if(isset($_GET['search']))
                    <input type="hidden" name="search" value="{{ $_GET['search'] }}">
                    @endif

                    <ul class="mt-3 flex flex-col space-y-2">
                        <li class="flex items-center justify-between mb-2">
                            <div class="font-semibold">Colors</div>
                            {{-- <div class="font-semibold cursor-pointer">━</div> --}}
                        </li>
                        @foreach ($colors as $key => $color)
                            <li>
                                <label class="w-full flex items-center space-x-2">
                                    <span id="customCheck{{ str_replace(' ', '', $color->title)}}" class="cursor-pointer hover:bg-green-400 hover:border-green-400 custom-checks w-4 h-4 rounded border-2 border-gray-300 bg-white"></span>
                                    <input type="checkbox"
                                        data-custom-check="customCheck{{ str_replace(' ', '', $color->title)}}"
                                        class="hidden custom-color-check-inputs w-4 h-4"
                                        onChange="this.form.submit()"
                                        name="colors[]"
                                        value="{{$color->id}}"
                                        @if(in_array($color->id, $selectedColors)) checked @endif />
                                    <span class="block mt-1 select-none"> {{$color->title}}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-5 border border-gray-300 w-full">
                    <ul class="flex flex-col space-y-2">
                        <li class="flex items-center justify-between mb-2">
                            <div class="font-semibold">Gender</div>
                        </li>
                        @php
                            $genders = ['male', 'female', 'child', 'infents', 'unisex'];
                        @endphp
                        @foreach ($genders as $item)
                            <li>
                                <label class="w-full flex items-center space-x-2">
                                    <span id="customCheck{{ str_replace(' ', '', $item)}}" class="cursor-pointer hover:bg-green-400 hover:border-green-400 custom-checks w-4 h-4 rounded border-2 border-gray-300 bg-white"></span>

                                    <input type="checkbox"
                                        data-custom-check="customCheck{{ str_replace(' ', '', $item)}}"
                                        class="hidden custom-gender-check-inputs w-4 h-4"
                                        onChange="this.form.submit()"
                                        name="genders[]"
                                        value="{{$item}}"
                                        @if(in_array($item, $selectedGenders)) checked @endif />

                                    <span class="block mt-1 select-none capitalize"> {{$item}}</span>

                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-5 border border-gray-300 w-full">
                    <ul class="flex flex-col space-y-2">
                        <li class="flex items-center justify-between mb-2">
                            <div class="font-semibold">Necks</div>
                        </li>
                        @php
                            $necks = ['v neck', 'u neck', 'round neck'];
                        @endphp
                        @foreach ($necks as $item)
                            <li>
                                <label class="w-full flex items-center space-x-2">
                                    <span id="customCheck{{ str_replace(' ', '', $item)}}" class="cursor-pointer hover:bg-green-400 hover:border-green-400 custom-checks w-4 h-4 rounded border-2 border-gray-300 bg-white"></span>

                                    <input type="checkbox"
                                        data-custom-check="customCheck{{ str_replace(' ', '', $item)}}"
                                        class="hidden custom-neck-check-inputs w-4 h-4"
                                        onChange="this.form.submit()"
                                        name="necks[]"
                                        value="{{$item}}"
                                        @if(in_array($item, $selectedNecks)) checked @endif />

                                    <span class="block mt-1 select-none capitalize"> {{$item}}</span>

                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-5 border border-gray-300 w-full">
                    <ul class="flex flex-col space-y-2">
                        <li class="flex items-center justify-between mb-2">
                            <div class="font-semibold">Materials</div>
                        </li>
                        @php
                            $materials = ['cotton', 'polyester', 'polyurethane', 'linen'];
                        @endphp
                        @foreach ($materials as $item)
                            <li>
                                <label class="w-full flex items-center space-x-2">
                                    <span id="customCheck{{ str_replace(' ', '', $item)}}" class="cursor-pointer hover:bg-green-400 hover:border-green-400 custom-checks w-4 h-4 rounded border-2 border-gray-300 bg-white"></span>

                                    <input type="checkbox"
                                        data-custom-check="customCheck{{ str_replace(' ', '', $item)}}"
                                        class="hidden custom-material-check-inputs w-4 h-4"
                                        onChange="this.form.submit()"
                                        name="materials[]"
                                        value="{{$item}}"
                                        @if(in_array($item, $selectedMaterials)) checked @endif />

                                    <span class="block mt-1 select-none capitalize"> {{$item}}</span>

                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <hr class="my-5 border border-gray-300 w-full">
                    <ul class="flex flex-col space-y-2">
                        <li class="flex items-center justify-between mb-2">
                            <div class="font-semibold">Types</div>
                        </li>
                        @php
                            $types = ['t shirt', 'polo shirt', 'long sleeves', 'sleeve-less'];
                        @endphp
                        @foreach ($types as $item)
                            <li>
                                <label class="w-full flex items-center space-x-2">

                                    <span id="customCheck{{ str_replace(' ', '', $item)}}" class="cursor-pointer hover:bg-green-400 hover:border-green-400 custom-checks w-4 h-4 rounded border-2 border-gray-300 bg-white"></span>

                                    <input type="checkbox"
                                        data-custom-check="customCheck{{ str_replace(' ', '', $item)}}"
                                        class="hidden custom-type-check-inputs w-4 h-4"
                                        onChange="this.form.submit()"
                                        name="types[]"
                                        value="{{$item}}"
                                        @if(in_array($item, $selectedTypes)) checked @endif />

                                    <span class="block mt-1 select-none capitalize"> {{$item}}</span>

                                </label>
                            </li>
                        @endforeach
                    </ul>

                </div>
                {{-- product filter --}}
            </form>

            </div>
        </div>
        <div class="w-full">

            <div class="mt-3 py-5">
                {{-- <div class="text-lg font-medium">Sub Categories</div> --}}
                <ul class=" flex items-center space-x-4 font-medium">
                    @foreach ($category->subcategories as $subcateg)
                        <li>
                            <a href="/products/shirts/{{$category->slug}}/{{$subcateg->slug}}" class="border border-gray-300 px-3 text-xs py-1 rounded theme-link"> {{$subcateg->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>


            @if($products->count() == 0)
            <div class="h-64 w-full flex items-center justify-center">
                <div class="text-center">
                    <div class="text-lg font-semibold text-gray-700">0 products found! </div>
                    <div class="text-gray-700 text-xs font-medium">try to change your filter </div>
                </div>
            </div>
            @else
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
                @foreach ($products as $product)
                <div>
                    <div>
                    <div class="p-3 text-lg font-semibold text-primary">{{$product->title}}</div>
                    <div class="bg-gray-100 rounded-t-lg">
                        <a href="/product-order/shirt/{{$product->category->slug}}">
                            @if($product->getMedia('images')->count() != 0)
                            <thumb-image-blade classess="w-full h-64 object-contain" image="{{$product->getMedia('images')[0]->file_name}}" id="{{$product->getMedia('images')[0]->id}}"></thumb-image-blade>
                            @endif
                        </a>
                    </div>
                    <div class="p-3">
                        <div class="text-xl uppercase text-primary">{{$product->unique_code}}</div>
                        <div class="mb-1">
                            <div class="text-xs text-primary capitalize">
                                - {{$product->category->title}}
                                {{$product->cloth_type}}
                                100% {{$product->material}}
                            </div>
                            <div class="text-xs text-primary capitalize">
                                - With or Without Printing
                            </div>
                        </div>
                        <div class="mb-1 text-xl font-bold text-sec-500">
                            <span> {{$product->lowestPrice()->price}} </span> AED
                        </div>
                        <div class="flex items-center space-x-2 text-xs">
                            <div class="px-1 bg-gray-500 text-white">
                                <span> {{$product->variants->count()}} sizes </span>
                            </div>
                            <div class="px-1 bg-green-500 capitalize text-white">
                                <span> {{$product->gender}} </span>
                            </div>
                        </div>

                    </div>
                    @php
                     if ($product->color->hex == '#FFFFFF') {
                        $borderColor = "#f0efeb";
                     }else{
                        $borderColor = $product->color->hex;
                     }
                    @endphp
                    <div class="flex items-center justify-around p-3 pt-0 border-2 border-t-0 border-l-0 border-r-0 border-sec" style="border-color: {{$borderColor}}">
                        <a href="/product-order/shirt/{{$product->category->slug}}" class="mr-auto theme-link text-base font-medium text-red-500 hover:border-transparent">Order Now</a>
                    </div>
                    </div>
                </div>
                @endforeach

            </div>
            @endif
        </div>
    </div>

</div>
