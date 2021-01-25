<div>
    <ul class="hidden lg:flex py-5 px-3 justify-end font-medium text-sm md:text-base">
        <li class="mr-4">
            <a class="text-green-500" href="/">Be a Reseller</a>
        </li>
        <li class="mr-4 flex items-center justify-center text-primary-500">
            <a href="/" class="flex items-center">
                <span class="block mr-2">
                    <img class="w-4" src="{{ asset('assets/images/call-icon.png') }}" alt="">
                </span>
                <span class="block hover:text-sec tracking-wider">04 551 6095</span>
            </a>
            <a href="/" class="block ml-4">
                <span class="block text-green-500">
                    <svg class="fill-current w-4 h-4 mb-1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </span>
            </a>
        </li>
        <li class="flex items-center text-primary-500 hover:text-sec">
            @if (Auth::check())
                <top-navbar-dropdown :roles="{{Auth::user()->getRoleNames()}}" :user="{{Auth::user()}}"></top-navbar-dropdown>
            @else
            <a href="/login" class="block">
                Account / Sign In
            </a>
            @endif

        </li>
    </ul>
</div>
