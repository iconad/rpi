@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('product.package', $product, $package) }}

    <!-- Old Name "Packages" -->
    <!-- change to "Papers" -->


<div id="dashboard">
    <div class="w-full rounded-lg border border-gray-200 bg-white p-4 relative">
        <h2 class="my-6 text-xl font-semibold text-gray-700 dark:text-gray-200">{{ $product->title }}'s Paper</h2>
        <form action="/manage/products/{{$product->id}}/packages/{{$package->id}}" method="post" class="">
            @csrf
            {{method_field('PUT')}}
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Select Paper</span>
                    <select class="form-input text-lg capitalize" name="paper">
                        @foreach ($papers as $paper)
                            @if ($paper->id === $package->paper_id)
                                <option selected class="capitalize" value="{{$paper->id}}"> {{$paper->title}} ({{$paper->side}}) </option>
                            @else
                                <option class="capitalize" value="{{$paper->id}}"> {{$paper->title}} ({{$paper->side}}) </option>
                            @endif
                        @endforeach
                    </select>
                </label>
            </div>
            <!-- form-ele -->

            {{-- <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Quantity</span>
                    <input type="number" class="form-input" name="quantity" value="{{ $package->quantity }}">
                </label>
            </div> --}}
            <!-- form-ele -->

            <div class="form-element">
                <change-status :status="{{$package->status}}" id="{{$package->id}}" model="packages"></change-status>
            </div>

            <div class="form-element mt-8 mb-0">
                <input type="submit" value="Updated" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>

        <div class="absolute bottom-0 right-0 p-4">
            <form method="post" action="/manage/products/{{$product->id}}/packages/{{$package->id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="theme-button-red" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>

    </div>

  </div>



    {{-- Product Points Start From Here --}}
    <div class="rounded-lg border border-gray-200 bg-white p-4 my-6">
        {{-- <x-manage.packagesizes :package="$package" :pid="$product->id" /> --}}
        <manage-prices-sizes :pid="{{$product->id}}" :pkgid="{{$package->id}}"></manage-prices-sizes>
    </div>
    {{-- Product Points End From Here --}}


@endsection
