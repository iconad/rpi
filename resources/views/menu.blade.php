@extends('layouts.printo') // Use your layout if you have one

@section('content')
<div class="container">
    <h1>Menu</h1>

    <ul>
        @foreach($menuItems as $menuItem)
        <li>
            <a href="{{ $menuItem->link }}">{{ $menuItem->title }}</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection