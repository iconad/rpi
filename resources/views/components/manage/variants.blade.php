<div>
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Title</th>
                <th class="px-4 py-3">Stock</th>
                <th class="px-4 py-3">Price</th>
                <th class="px-4 py-3">Color</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                @foreach ($variants as $variant)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <p>{{$variant->id}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="font-semibold hover:border-transparent">
                            <a href="/manage/products/{{$pid}}/variants/{{$variant->id}}" class="font-semibold theme-link hover:border-transparent">
                                {{$variant->title}}
                            </a>
                        </p>
                    </td>
                    <td class="px-4 py-3">
                        <p>{{$variant->stock}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p>{{$variant->price}}</p>
                    </td>
                    <td class="px-4 py-3">

                        @if ($variant->color)
                        <div class="font-medium w-32 rounded-full overflow-hidden flex items-center justify-between border" style="border-color: {{$variant->color->hex}}">
                            <span class="inline-block pl-2 text-xs">{{$variant->color->id}}</span>
                            <span class="inline-block pl-2 text-xs">{{$variant->color->hex}}</span>
                            <span class="inline-block p-3 w-12" style="background: {{$variant->color->hex}}"></span>
                        </div>
                        @else
                        <p>---</p>
                        @endif

                    </td>
                    <td class="px-4 py-3 text-xs">
                        <change-status :status="{{$variant->status}}" id="{{$variant->id}}" model="packages"></change-status>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span>
                            <form method="post" action="/manage/products/{{$pid}}/packages/{{$variant->id}}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="action-button-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </span>
                    </td>
                </tr>
                @endforeach
                @if ($variants->count() == 0)
                <tr>
                    <td colspan="5">
                        <div class="text-center font-medium p-5 pb-0 text-sm text-gray-500 uppercase">
                            Nothing found!
                        </div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
