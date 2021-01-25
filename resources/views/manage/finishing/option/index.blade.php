@extends('manage.layouts.app')

@section('content')

<div id="dashboard">

    <manage-finishing-options :finishid="{{ json_encode($finishid) }}"></manage-finishing-options>

</div>


@endsection
