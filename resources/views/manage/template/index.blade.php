@extends('manage.layouts.app')

@section('content')

<div id="dashboard">

    <manage-templates :cid="{{json_encode($cid)}}"></manage-templates>

</div>


@endsection
