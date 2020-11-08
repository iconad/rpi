@if (count($breadcrumbs))
<nav class="bg-grey-100 w-full my-5">
    <ol class="flex text-grey-500 items-center">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li><a class="inline-block text-sm text-primary-500 font-medium theme-link hover:border-transparent" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                <li class="mx-1 text-primary-400 mt-1 block"> → </li>
            @else
                <li><span class="inline-block text-sm text-primary-500 font-medium text-sec-500">{{ $breadcrumb->title }}</span></li>
            @endif
        @endforeach
    </ol>
</nav>
@endif
