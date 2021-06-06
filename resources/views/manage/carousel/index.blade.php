@extends('manage.layouts.app')

@section('content')

{{-- {{ Breadcrumbs::render('manage.estimates') }} --}}

<div id="dashboard">

    <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
        <span>Sliders</span>
    </div>

    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">product</th>
                <th class="px-4 py-3">Cover</th>
                <th class="px-4 py-3">type</th>
                <th class="px-4 py-3">Date Created</th>
                <th class="px-4 py-3">status</th>
                <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >

                @foreach ($sliders as $slider)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <p class="text-gray-700">{{$slider->id}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="text-gray-700">{{$slider->title}} </p>
                    </td>
                    <td class="px-4 py-3">
                        @if ($slider->product_id != null)
                            <img class="w-32" src="{{"http://127.0.0.1:8000/storage/".$slider->product->getMedia('covers')[0]->id."/".$slider->product->getMedia('covers')[0]->file_name}}" alt="">
                        @else
                        <img class="w-32" src="{{"http://127.0.0.1:8000/storage/".$slider->media[0]->id."/".$slider->media[0]->file_name}}" alt="">
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <p class="text-gray-700">{{ $slider->type }}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="text-gray-700">{{date('d M, Y', strtotime($slider->created_at))}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <change-status :status="{{$slider->status}}" id="{{$slider->id}}" model="sliders"></change-status>
                    </td>
                    <td class="px-4 py-3">
                        <div class="">
                            <form method="post" action="/manage/sliders/{{$slider->id}}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="theme-button-red" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection
