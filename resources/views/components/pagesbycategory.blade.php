@if ($pages->count() != 0)
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
    <table class="w-full whitespace-no-wrap">
        <thead>
            <tr
            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Category</th>
            <th class="px-4 py-3">Status</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >

            @foreach ($pages as $page)
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                    <div>
                        <a href="/manage/page-categories/{{$cid}}/pages/{{$page->id}}/" class="font-semibold theme-link hover:border-transparent">
                            {{$page->title}}
                        </a>
                        {{-- <span
                            v-if="category.label"
                            :class="[
                                `inline-bock px-3 py-px font-medium rounded-lg shadow text-xs ${category.label.color}`,
                                category.label.color === 'yellow-300' ? 'text-gray-900' : 'text-gray-100'
                            ]">
                            {{category.label.title}}
                        </span> --}}
                    </div>
                </div>
                </td>
                <td class="px-4 py-3 text-sm">
                    {{ $page->category->title }}
                </td>
                <td class="px-4 py-3 text-xs">
                    <change-status :status="{{$page->status}}" id="{{$page->id}}" model="page-categories"></change-status>
                </td>
            </tr>
            @endforeach
            @if (count($pages) === 0)
            <tr>
                <td colspan="5">
                    <div class="text-center font-medium p-5 text-sm text-gray-500 uppercase">
                        Nothing found!
                    </div>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    </div>
</div>
@else
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        0 pages found!
    </div>
@endif
