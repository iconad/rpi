<div>
    <div class="form-element">
        <label>
            <span class="text-gray-800 block">Color </span>
            <select wire:model="selectedColor" name="color" class="form-input">
                {{-- <option value="{{{ null }}}">Select Color</option> --}}
                @foreach ($colors as $col)
                    <option value="{{$col->id}}"> {{$col->title}} {{$color->id}} {{$col->id}} </option>
                @endforeach
            </select>
        </label>
        @if ($selectedColor != null)
            <div style="background: {{$selectedColor}}" class="border border-gray-300 w-16 mt-3 h-6 rounded"></div>
        @endif
    </div>
    <!-- form-ele -->
</div>
