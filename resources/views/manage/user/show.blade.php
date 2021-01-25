
@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.user', $user) }}

<div id="dashboard">

    <div class="content mt-12 mb-32">
        <div class="flex justify-center">
            <div class="border border-b-0 border-gray-200 w-full text-center px-4 py-2 capitalize font-semibold text-gray-700">
                {{$user->name}}
                <span class="text-gray-500 lowercase">/ {{$user->email}}</span>
            </div>
        </div>

        <div class="table table-fixed w-full bg-gray-100 border border-gray-200 p-3">

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> User ID </div>
                <div> {{$user->id}}</div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Name </div>
                <div> {{ $user->name }} </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Email </div>
                <div> {{$user->email}} </div>
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Mobile </div>
                @if ($user->mobile)
                <div> {{$user->mobile}} </div>
                @else
                <div> --- </div>
                @endif
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Office </div>
                @if ($user->office)
                <div> {{$user->office}} </div>
                @else
                <div> --- </div>
                @endif
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Company </div>
                @if ($user->company)
                <div> {{$user->company}} </div>
                @else
                <div> --- </div>
                @endif
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Company TRN </div>
                @if ($user->company_trn)
                <div> {{$user->company_trn}} </div>
                @else
                <div> --- </div>
                @endif
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Country </div>
                @if ($user->country)
                <div> {{$user->country}} </div>
                @else
                <div> --- </div>
                @endif
            </div>

            <div class="flex items-center border-b border-gray-300 p-2">
                <div class="w-64 font-semibold"> Address </div>
                @if ($user->address)
                <div> {{$user->address}} </div>
                @else
                <div> --- </div>
                @endif
            </div>

            <div class="flex items-center p-2 pb-0">
                <div class="w-64 font-semibold"> Date </div>
                <div> {{date('d M, Y', strtotime($user->created_at))}} </div>
            </div>

        </div>

        <div class="table table-fixed w-full bg-gray-100 border border-gray-200 p-3 mt-5">

            <div class="text-xl font-semibold mb-3">Address Books</div>

            @if (count($user->books)  != 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    @foreach ($user->books as $book)

                    <div class="border border-gray-300 rounded p-3">
                        <div class="flex items-center border-b border-gray-300 p-2">
                            <div class="w-64 font-semibold"> Company Name </div>
                            <div class="w-full"> {{$book->company_name}}</div>
                        </div>

                        <div class="flex items-center border-b border-gray-300 p-2">
                            <div class="w-64 font-semibold"> First Name </div>
                            <div class="w-full"> {{ $book->first_name }} </div>
                        </div>

                        <div class="flex items-center border-b border-gray-300 p-2">
                            <div class="w-64 font-semibold"> Last Name </div>
                            <div class="w-full"> {{ $book->last_name }} </div>
                        </div>

                        <div class="flex items-center border-b border-gray-300 p-2">
                            <div class="w-64 font-semibold"> Number </div>
                            <div class="w-full"> ({{ $book->country_code }}) {{$book->mobile_number}} </div>
                        </div>

                        <div class="flex items-center border-b border-gray-300 p-2">
                            <div class="w-64 font-semibold"> City </div>
                            <div class="w-full"> {{$book->city}} </div>
                        </div>

                        <div class="flex items-center border-b border-gray-300 p-2">
                            <div class="w-64 font-semibold"> Address </div>
                            <div class="w-full"> {{$book->address}} </div>
                        </div>

                        <div class="flex items-center p-2 pb-0">
                            <div class="w-64 font-semibold"> Landmark </div>
                            <div class="w-full"> {{$book->landmark}} </div>
                        </div>

                    </div>
                    @endforeach

                </div>

            @else

                <div class="flex items-center">
                    <div class="w-full"> 0 Adderss found </div>
                </div>

            @endif

        </div>

        <div class="table table-fixed w-full bg-gray-100 border border-gray-200 p-3 mt-5">

            <div class="text-xl font-semibold mb-3">Orders</div>

            @if (count($user->orders)  != 0)
            <div class="flex items-center space-x-4">
                <div class="w-auto"> Total {{count($user->orders)}} Orders </div>
                <div class="w-auto">
                    <a href="/manage/users/{{$user->id}}/orders" class="theme-link">View All</a>
                </div>
            </div>

            @else

                <div class="flex items-center">
                    <div class="w-full"> 0 Orders found </div>
                </div>

            @endif

        </div>

</div>


@endsection
