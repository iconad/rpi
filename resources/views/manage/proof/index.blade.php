@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.pending-proofs') }}

<div id="dashboard">

    <manage-pending-proofs></manage-pending-proofs>

</div>


@endsection
