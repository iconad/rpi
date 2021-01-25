@extends('manage.layouts.app')

@section('content')

<div id="dashboard">

    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Create Option</div>
            <!-- <hr class="my-2"> -->
            <form action="{{route('options.store', $finishid)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Title</span>
                        <input type="text" name="title" class="form-input text-lg" value="{{ old('title') }}">
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Price</span>
                        <input type="number" name="price" class="form-input text-lg" value="{{ old('price') }}">
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Extra Working Days</span>
                        <input type="number" name="days" min="0" class="form-input text-lg" value="{{ old('days') }}">
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Thumbnail</span>
                        <input type="file" name="image" class="form-input text-lg">
                    </label>
                </div>
                <div class="mt-8">
                    <div class="w-32">
                        <button
                        type="submit"
                        class="theme-button text-base font-medium"
                        >Add</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>


@endsection
