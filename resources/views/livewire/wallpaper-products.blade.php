<div>

    @livewire('wallpaper-products-header', [
        'subcategory' => $subcategory,
        'selectedColors' => $selectedColors,
        'selectedMaterials' => $selectedMaterials,
        'colors' => $colors,
        'materials' => $materials
    ])
    <div class="lg:flex">
        <div id="productSidebar" class=" {{ $isSidebar ? 'w-1/3' : 'hidden' }} ">
            <div class="mt-5 lg:m-5 ml-0 h-full rounded overflow-hidden">

                <div class="p-3 product-filter bg-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="font-semibold">Materials</div>
                        <div class="font-semibold cursor-pointer">━</div>
                    </div>

                    <form action="/products/wallpapers/{{$subcategory->slug}}" method="get">
                        @if(isset($_GET['sort']))
                        <input type="hidden" name="sort" value="{{ $_GET['sort'] }}">
                        @endif
                        @if(isset($_GET['search']))
                        <input type="hidden" name="search" value="{{ $_GET['search'] }}">
                        @endif
                        <ul class="mt-3 flex flex-col space-y-2">
                            @foreach ($materials as $key => $material)
                                <li>
                                    <label class="w-full flex items-center space-x-2">
                                        <span>
                                            {{-- {{$selectedColors}} --}}
                                            <input type="checkbox"
                                                onChange="this.form.submit()"
                                                name="materials[]"
                                                value="{{$material->id}}"
                                                @if( isset($_GET['materials']) && in_array($material->id, $selectedMaterials)) checked @endif />
                                        </span>


                                        <span class="block -mt-1 select-none"> {{$material->title}}</span>

                                    </label>
                                </li>
                            @endforeach
                        </ul>

                    </form>
                </div>
                {{-- one filter end --}}

            </div>
        </div>
        <div class="w-full">
            @if($products->count() == 0)
            <div class="h-64 w-full flex items-center justify-center">
                <div class="text-center">
                    <div class="text-lg font-semibold text-gray-700">0 products found! </div>
                    <div class="text-gray-700 text-xs font-medium">try to change your filter </div>
                </div>
            </div>
            @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                @foreach ($products as $product)
                <div>
                    <div >
                        <div class="p-3 text-lg font-semibold text-primary">{{$product->title}}</div>
                    <a href="/product-order/wallpaper/{{$product->slug}}">
                        @if($product->getMedia('images')->count() != 0)
                        <thumb-image-blade classess="w-full h-64 object-cover" image="{{$product->getMedia('images')[0]->file_name}}" id="{{$product->getMedia('images')[0]->id}}"></thumb-image-blade>
                        @endif
                    </a>
                    <div class="p-3">
                        <div class="mb-2 font-semibold text-sec-500">
                            Price starting from <span> {{$product->lowestPrice()->price}} </span> AED
                            {{-- <div>
                                @foreach (collect($product->variants)->sortByDesc('price') as $variant)
                                    <div>
                                        {{$variant->price}}
                                    </div>
                                @endforeach
                            </div> --}}
                        </div>
                        <div class="mb-2 capitalize">
                            <span class="font-semibold text-black">Delivery</span>
                            <span class="inline-block ml-3">
                                {{$product->delivery_time}} business
                                <span>
                                    {{ $product->delivery_time < 1 ? 'day' : "days" }}
                                </span>
                            </span>
                        </div>
                        {{-- <div class="mb-2 capitalize flex items-cener">
                            <span class="font-semibold text-black">Colors</span>
                            <div class="flex items-center justify-start ml-4">
                                @foreach ($product->variants as $variant)
                                    <span class="inline-block w-5 h-5 rounded mr-1 border border-gray-300" title="{{$variant->color->title}}" style="background: {{$variant->color->hex}}">
                                    </span>
                                @endforeach
                            </div>
                        </div> --}}
                    </div>
                    <div class="flex items-center justify-around p-3 pt-0 border-2 border-t-0 border-l-0 border-r-0 border-sec">
                        <a href="/product-order/wallpaper/{{$product->slug}}" class="mr-auto theme-link font-medium text-red-500 hover:border-transparent">Order Now</a>
                    </div>
                    </div>
                </div>
                @endforeach

            </div>
            @endif
        </div>
    </div>

</div>
