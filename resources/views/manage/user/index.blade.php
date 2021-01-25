@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.users') }}

<div id="dashboard">

    <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
      <span>Users</span>
    </div>
    <!-- CTA -->

    <div class="mt-10">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                    <div class="border overflow-hidden border-b border-gray-200 sm:rounded-lg sm:rounded-tr-none">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Date Joined
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                            </tr>
                        </thead>
                        @if (count($users) != 0)
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($users as $user)

                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 text-gray-800">
                                        {{ $user->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 text-gray-800">
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 text-gray-800">
                                        {{ $user->email }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 text-gray-800">
                                        <a href="`/manage/users/${pp.user.id}`" class="theme-link hover:border-transparent">
                                            {{date('d M, Y', strtotime($user->created_at))}}
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 text-gray-800">
                                        <a href="/manage/users/{{$user->id}}" class="theme-link hover:border-transparent">
                                            View
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                        @else
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center p-3 text-base leading-5 font-medium text-gray-600"> 0 record found! </td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


@endsection



