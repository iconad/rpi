@extends('layouts.app')

@section('content')
    <section class="page-wrapper">

        <x-profile-header />

        <div class="mt-10">
            <profile-form :user_id="{{ json_encode(Auth::user()->id) }}"></profile-form>
        </div>

    </section>

@endsection
