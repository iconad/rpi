@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.estimates') }}

<div id="dashboard">

    <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
        <span>Estimates</span>
    </div>

    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">Responses From RPI</th>
                <th class="px-4 py-3">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >

                @foreach ($estimates as $estimate)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <p class="text-gray-700">{{$estimate->id}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="text-gray-700">{{$estimate->first_name}} {{$estimate->last_name}} </p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="text-gray-700">{{$estimate->email}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="text-gray-700">{{date('d M, Y', strtotime($estimate->created_at))}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="text-gray-100 font-semibold px-2 rounded inline-block {{count($estimate->responses) != 0 ? 'bg-green-500' : 'bg-red-500'}} ">{{count($estimate->responses)}}</p>
                    </td>
                    <td class="px-4 py-3">
                        <p class="text-gray-700">
                            <a href="/manage/estimates/{{$estimate->id}}" class="theme-link"> View </a>
                        </p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection
