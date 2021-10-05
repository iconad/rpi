<div>
    <div id="dashboard">

        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Create Slider
        </h2>
        <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data" class="w-full rounded-lg border border-gray-200 bg-white p-4">
                @csrf
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Title</span>
                    <input class="form-input" name="title" value="{{ old('title') }}">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label class="block mb-3">
                    <input wire:model="coverRadio" value="product" type="radio" name="coverRadio" class="inline-block mr-3">
                    <span>Select cover from existing product</span>
                </label>
                <label class="block mb-3">
                    <input wire:model="coverRadio" value="new" type="radio" name="coverRadio" class="inline-block mr-3">
                    <span>Add new cover</span>
                </label>
            </div>
            <!-- form-ele -->

            @if ($coverRadio === 'product')
            <div class="form-element">
                <span class="text-gray-800 block">Product</span>
                <div class="relative">
                    <select wire:model="selectedProduct" wire:change="onSelectProduct" class="form-input text-base capitalize w-64" name="product">
                        @foreach ($products as $pro)
                            <option value="{{$pro}}" class="capitalize"> {{$pro->title}} </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    </div>
                </div>

                <div class="mt-3">
                    @if ($product->getMedia('covers')->count() != 0)
                        <img class="w-1/4" src="{{"https://printo.ae/storage/".$product->getMedia('covers')[0]->id."/".$product->getMedia('covers')[0]->file_name}}" alt="">
                    @else
                        <div class="text-base font-semibold text-red-500">Cover not uploaded for this product.</div>
                    @endif
                </div>

            </div>
            <!-- form-ele -->
            @else

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block mb-2">Cover Image</span>
                    <input type="file" name="image" class="focus:outline-none focus:bg-gray-200">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Target Link</span>
                    <input class="form-input" name="link" value="{{ old('link') }}">
                </label>
            </div>
            <!-- form-ele -->

            @endif

            {{-- <div class="form-element mt-8">
                <input class="custom-checkbox" name="featured" id="styled-checkbox-1" type="checkbox">
                <label for="styled-checkbox-1" class="cursor-pointer leading-none">Featured</label>
            </div> --}}
            <!-- form-ele -->

            <div class="form-element mt-8">
                <input type="submit" value="Submit" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>

      </div>
</div>
