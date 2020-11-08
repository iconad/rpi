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




    {{-- <div class="flex items-center justify-between p-3 mb-8 text-sm font-semibold text-green-500 bg-green-100 rounded-full border border-green-500" >
      <div class="flex items-center">
        <svg
          class="w-5 h-5 mr-2"
          fill="currentColor"
          viewBox="0 0 20 20"
        >
          <path
            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
          ></path>
        </svg>
        <span>Star this project on GitHub</span>
      </div>
    </div> --}}
    {{-- success message --}}

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
