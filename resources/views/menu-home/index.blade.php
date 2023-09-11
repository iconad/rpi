<!DOCTYPE html>
<html>

<head>
    <title>Menu</title>
</head>

<body>
    <ul>
        @foreach ($menus ?? [] as $menu)
        <li>
            <a href="{{ $menu->link }}"
                class="hover:text-red-300 text-xs md:text-sm lg:text-base truncate">{{ $menu->title }}</a>
        </li>
        @endforeach
    </ul>
</body>

</html>