<div>
    <div class="grid grid-cols-12 gap-3 mt-2">
        @foreach ($options as $option)
        <div>
            <label class=" {{ $option->id == $selectedOption ? 'ring-4 ring-sec-500 ' : '' }} active:ring-4 ring-sec-500 focus:ring-4 hover:ring-4 cursor-pointer select-none w-full h-12 rounded flex items-center justify-center border border-gray-200" style="background: {{$option->$title}}">
                <input required type="radio" class="hidden" wire:model="selectedOption" name="color" value="{{$option->id}}">
            </label>
            <span class="block text-center mt-1 font-medium capitalize text-gray-500 text-base">
                {{$option->title}}
            </span>
        </div>

        @endforeach
    </div>
</div>
