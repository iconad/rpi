<div>

    <div class="grid grid-cols-12 gap-3 mt-2">

        <div>
            <label class="active:ring-4 ring-sec-500 focus:ring-4 hover:ring-4 cursor-pointer select-none w-full h-12 rounded flex items-center justify-center border border-gray-200">
                <input type="checkbox" class="" wire:model="selectedOptions" name="color" value="male">
                <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                    Male
                </span>
            </label>
        </div>

        <div>
            <label class="active:ring-4 ring-sec-500 focus:ring-4 hover:ring-4 cursor-pointer select-none w-full h-12 rounded flex items-center justify-center border border-gray-200">
                <input type="checkbox" class="" wire:model="selectedOptions" name="color" value="female">
                <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                    Female
                </span>
            </label>
        </div>

        <div>
            <label class="active:ring-4 ring-sec-500 focus:ring-4 hover:ring-4 cursor-pointer select-none w-full h-12 rounded flex items-center justify-center border border-gray-200">
                <input type="checkbox" class="" wire:model="selectedOptions" name="color" value="kids">
                <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                    kids
                </span>
            </label>
        </div>

        <div>
            <label class="active:ring-4 ring-sec-500 focus:ring-4 hover:ring-4 cursor-pointer select-none w-full h-12 rounded flex items-center justify-center border border-gray-200">
                <input type="checkbox" class="" wire:model="selectedOptions" name="color" value="infents">
                <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                    infents
                </span>
            </label>
        </div>

        <div>
            <label class="active:ring-4 ring-sec-500 focus:ring-4 hover:ring-4 cursor-pointer select-none w-full h-12 rounded flex items-center justify-center border border-gray-200">
                <input type="checkbox" class="" wire:model="selectedOptions" name="unisex" value="female">
                <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                    Unisex
                </span>
            </label>
        </div>

    </div>
</div>

{{ print_r($selectedOptions) }}
