@extends('manage.layouts.app')

@section('content')

<div id="dashboard">

    <manage-printing-options :printid="{{ json_encode($printid) }}"></manage-printing-options>

</div>


@endsection
