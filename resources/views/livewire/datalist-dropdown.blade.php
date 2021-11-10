<div>
    <input list="paperList" class="form-input text-lg capitalize" name="paper" placeholder="Select Paper" wire:model="selectedItem">
    <datalist id="paperList">
        @foreach ($collection as $item)
        <option>
            <div class="flex items-center">
                <span class="block"> {{$item->title}} - {{$item->side}} </span>
                <span class="block"> ({{$item->id}}) </span>
            </div>
        </option>
        @endforeach
    </datalist>
    <input type="hidden" name="paper" value="{{$selectedId}}">
</div>
