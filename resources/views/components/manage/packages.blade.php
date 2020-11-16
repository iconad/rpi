<div>
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                <th class="px-4 py-3">#</th>
                <th class="px-4 py-3">Paper</th>
                <th class="px-4 py-3">Packages</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                @foreach ($packages as $package)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <p>{{$package->id}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="font-semibold hover:border-transparent">
                            <a href="/manage/products/{{$pid}}/packages/{{$package->id}}" class="font-semibold theme-link hover:border-transparent">
                                {{$package->paper->title}}
                            </a>
                        </p>
                    </td>
                    <td class="px-4 py-3">
                        <p>{{$package->prices->count()}}</p>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <change-status :status="{{$package->status}}" id="{{$package->id}}" model="packages"></change-status>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <span>
                            <form method="post" action="/manage/products/{{$pid}}/packages/{{$package->id}}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="action-button-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </span>
                    </td>
                </tr>
                @endforeach
                @if (count($packages) == 0)
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
