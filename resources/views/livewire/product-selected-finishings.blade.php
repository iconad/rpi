<div class="w-full overflow-hidden rounded-lg shadow-xs">

    <div class=" {{ $isDeleteModal ? 'fixed' :  'hidden' }} delete-prompt inset-0 bg-black bg-opacity-50 flex items-center justify-center z-10">
        <div class="w-96 bg-white border shadow-2xl flex flex-col justify-between rounded ">
            <div class="p-5 text-center space-y-3">
                <span class="block text-lg font-semibold">Are you sure?</span>
                <span class="block text-sm">All the data related to this finishing will be deleted. you wouldn't be able to recover the data.</span>
            </div>
            <div class="flex items-center">
                <span wire:click="deleteOption()" class="text-red-500 font-medium w-full p-2 cursor-pointer hover:bg-gray-200 text-center border border-b-0 border-l-0">Delete</span>
                <span wire:click="cancelDelete()" class="w-full p-2 cursor-pointer hover:bg-gray-200 text-center border border-b-0 border-r-0">Cancel</span>
            </div>
        </div>
    </div>

    @if (count($finishings) == 0 )
    <div class="text-center font-medium p-5 text-sm text-gray-500 uppercase">
        Nothing found!
    </div>
    @else
    <div class="mb-3 text-lg font-semibold text-gray-800 mb-2 flex items-center justify-between">
        <span>Selected Finishings</span>
        <span wire:click="refreshFinishings" class="text-sm block text-gray-500 hover:text-gray-700 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
        </span>
    </div>
    <div class="space-y-5">
    @foreach ($finishings as $finish)
        <div class="flex items-center">
        <div class="w-full">
            <span class="inline-block px-1 mb-2 rounded bg-gray-500 font-semibold text-gray-100 uppercase">{{$finish->finishing->title}}</span>
            <table class="w-full border-l">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50" >
                        <th class="px-4 py-3">Title </th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Extra Days</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                @foreach ($finish->options as $option)
                    <tr>
                        <td class="border p-2">
                            <span>{{$option->title}}</span>
                        </td>
                        <td class="border p-2">
                            <span>{{$option->price}}</span>
                        </td>
                        <td class="border p-2">
                            <span>{{$option->days}}</span>
                        </td>
                        <td class="border p-2">
                            <span wire:click="confirmDelete({{$option}})" class="cursor-pointer text-red-600 uppercase font-medium text-xs tracking-wider">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                            </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    @endforeach
    </div>
    @endif
</div>
