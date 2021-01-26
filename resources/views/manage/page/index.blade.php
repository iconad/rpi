@extends('manage.layouts.app')

@section('content')

{{ Breadcrumbs::render('manage.page-categories') }}

<div id="dashboard">


    <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
      <span>Pages</span>
      <a href="{{route('page-categories.create')}}" class="text-sm block theme-link">Add New Page</a>
    </div>
    <!-- CTA -->


    <x-pagesbycategory :cid="$cid" :pages="$pages" />

</div>


@endsection
