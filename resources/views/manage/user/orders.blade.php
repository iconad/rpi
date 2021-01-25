@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.user.orders', $user) }}

<div id="dashboard">

    <manage-user-orders :username="{{ json_encode(Auth::user()->name) }}" :user_id="{{ json_encode(Auth::user()->id) }}"></manage-user-orders>

</div>


@endsection
