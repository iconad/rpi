<div class="w-full overflow-hidden rounded-lg shadow-xs">
    @if (count($points) == 0 )
    <div class="text-center font-medium p-5 text-sm text-gray-500 uppercase">
        Nothing found!
    </div>
    @else
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50" >
                <th class="px-4 py-3">Name </th>
                <th class="px-4 py-3">Detail</th>
                <th class="px-4 py-3">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
            @foreach ($points as $point)
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->
                    <div>
                        <a href="/manage/products/{{$pid}}/points/{{$point->id}}" class="font-semibold theme-link hover:border-transparent">{{$point->title}}</a>
                    </div>
                </div>
                </td>
                <td class="px-4 py-3 text-sm">
                    {{-- {{$point->body}} --}}
                    {{ \Illuminate\Support\Str::limit($point->body, 35) }}
                </td>
                <td class="px-4 py-3 text-xs flex items-cener">
                    <a href="/manage/products/{{$pid}}/points/{{$point->id}}" class="action-button-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    @endif
</div>
