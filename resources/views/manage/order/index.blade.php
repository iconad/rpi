@extends('manage.layouts.app')

@section('content')
{{ Breadcrumbs::render('manage.orders') }}

<div id="dashboard">

    <manage-orders></manage-orders>

</div>


@endsection
