<div class="w-full mx-auto">
    @foreach (['red', 'orange', 'green', 'blue'] as $msg)
        @if(Session::has($msg))
        <div class="py-4 text-sm font-semibold text-{{$msg}}-500 bg-{{$msg}}-100 border-red-500" >
            <div class="container px-6 flex items-center justify-between mb-1 mx-auto">
            <div class="flex items-center">
                <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                <span>{{ Session::get($msg) }}</span>
            </div>
            </div>
        </div>

        @endif
    @endforeach


    @if ($errors->any())
    <div class="py-4 text-sm font-semibold text-red-500 bg-red-100 border-red-500" >
        @foreach ($errors->all() as $error)
        <div class="container px-6 flex items-center justify-between mb-1 mx-auto">
        <div class="flex items-center">
            <svg class="w-4 h-4 mr-2 fill-current"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
            <span>{{$error}}</span>
        </div>
        </div>
        @endforeach
        </div>
    {{-- Error message --}}
    @endif

</div>
