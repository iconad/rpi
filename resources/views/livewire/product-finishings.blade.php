<div class="w-full overflow-hidden rounded-lg shadow-xs">
    @if (count($finishings) == 0 )
    <div class="text-center font-medium p-5 text-sm text-gray-500 uppercase">
        Nothing found!
    </div>
    @else
    <div class="mb-3 text-lg font-semibold text-gray-800 mb-2 flex items-center justify-between">
        <span>All Finishings</span>
        <span wire:click="refreshFinishings" class="text-sm block text-gray-500 hover:text-gray-700 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </span>
    </div>

    <form wire:submit.prevent="submitFinishings" method="post" class="w-full space-y-5">
        @foreach ($finishings as $finish)
            <div class="flex items-center">
            <div class="w-full">
                <span class="inline-block px-1 mb-2 rounded bg-gray-500 font-semibold text-gray-100 uppercase">{{$finish->title}}</span>

                <table class="w-full border-b border-l">
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50" >
                        <th class="px-4 py-3">Title </th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Extra Days</th>
                    </tr>
                </thead>

                @foreach ($finish->options as $option)
                    <tr>
                        <td class="border border-b-0 p-2">

                            <label>
                                <input type="checkbox" wire:model="checkedFinishings" value="{{$option->id}}" class="mr-2" name="finishing-{{$finish->id}}">
                                <span>{{$option->title}}</span>
                            </label>
                        </td>
                        <td class="border border-b-0 p-2">
                            <span>{{$option->price}}</span>
                        </td>
                        <td class="border border-b-0 p-2">
                            <span>{{$option->days}}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            </div>
        @endforeach

        <div class="">
            <input type="submit" value="Update" class="px-4 py-2 border rounded hover:bg-white cursor-pointer">
        </div>

    </form>
    @endif
</div>
