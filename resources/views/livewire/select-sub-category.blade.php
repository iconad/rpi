<div>

    <div class="form-element mt-10">
        <label>
            <span class="text-gray-800 block">Pricing Type</span>
            <div class="relative">
                <select wire:model="priceType" class="block appearance-none capitalize w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="pricing_type" value="{{ old('delivery_time') }}">
                    @foreach ($priceTypes as $item)
                    <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                    </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </label>
    </div>
    <!-- form-ele -->

    @if ($priceType == 'fixed price')
    <div class="form-element mt-10 flex items-center space-x-5">

        <label class="block w-full">
            <span class="text-gray-800 block">Width (cm)</span>
            <input type="text" name="width" class="form-input" wire:model="width" required>
        </label>
        <label class="block w-full">
            <span class="text-gray-800 block">Height (cm)</span>
            <input type="text" name="height" class="form-input" wire:model="height" required>
        </label>

    </div>
    <!-- form-ele -->
    @endif

    <div class="form-element mt-10">
        <label>
            <span class="text-gray-800 block mb-1">Category</span>
            <div class="relative">
                <select wire:model="selectedCategory" wire:change="getSubCategories" class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="category_id">
                    @foreach ($categories as $catg)
                        <option value="{{$catg->id}}">{{$catg->title}} </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </label>
    </div>

    @if (!$nosubcategory)
    <div class="form-element mt-5">
        <label>
            @if ($subCategories->count() == 0)
            <span class="text-gray-800 text-sm block mb-1"> 0 sub categories found! <a class="theme-link border-gray-400 pb-px" href="/manage/categories/{{$selectedCategory}}/sub-categories/create">Add new</a> </span>
            @else
            <span class="text-gray-800 block mb-1">Sub Category </span>
            <div class="relative">
                <select wire:model="selectedSubCategory" wire:change="onSelectSubCategory" class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="sub_category_id">
                    @foreach ($subCategories as $catg)
                        <option value="{{$catg->id}}">{{$catg->title}} </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            @endif
        </label>
    </div>
    @endif

    <div class="form-element my-3">
        <label for="subcateogry" class="flex items-center">
            <input type="checkbox" wire:model="nosubcategory" class="h-4 w-4">
            <span class="inline-block ml-2">No Subcategory</span>
        </label>
    </div>


</div>

{{--
<div class="hidden relative">
    <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none" name="category_id">
        @foreach ($categories as $catg)
            @if ($catg->id == $product->category->id)
            <option selected value="{{$catg->id}}">{{$catg->title}}  ({{ $catg->menu->title }})</option>
            @else
            <option value="{{$catg->id}}">{{$catg->title}}  ({{ $catg->menu->title }})</option>
            @endif
        @endforeach
    </select>
    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
    </div>
</div> --}}
