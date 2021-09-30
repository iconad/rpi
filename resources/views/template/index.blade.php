@extends('layouts.app')

@section('content')

<section class="pages-wrapper my-10 flex flex-col space-y-6">

    <div class="text-primary-500">
        <h1 class="text-2xl md:text-3xl font-semibold">Printo Templetes </h1>
        <div class="text-xl font-medium">Need Printo Support?</div>
    </div>
    <div class="text-primary-500 border-t border-b border-primary-300 py-3">
        <p>Create a Designs that gets people’s attention.</p>
    </div>

    <div class="text-gray-900 text-center">
        <div class="mt-5">
            <h1 class="text-2xl font-semibold">Artwork Templates</h1>
            <div class="text-lg font-medium">Please select one of our products below</div>
        </div>
    </div>

    <div class="categories">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2 md:gap-5">
            @foreach ($categories as $catg)
                <a href="/layout-templates/{{$catg->slug}}" class="category-box border hover:bg-cyan-50 transition bg-cyan-50 
                {{$category->slug === $catg->slug ? 'bg-cyan-50' : ''}} ">
                    <span class="image h-32 md:h-48 p-5 flex items-center justify-center">
                        <thumb-image-blade classess="w-4/5 md:w-full h-full object-cover" 
                        image="{{$catg->media[0]->file_name}}" id="{{$catg->media[0]->id}}"></thumb-image-blade>
                    </span>
                    <span class="py-5 px-2 block text-center">
                        <span class="block text-xs font-medium text-gray-800">{{$catg->title}}</span>
                    </span>
                </a>
            @endforeach
        </div>
    </div>


    <div>
        <div class="text-xl font-semibold text-primary-500"> {{$category->title}} </div>


        <div class="templates border border-primary-300 mt-3 rounded border-b-0">
            <div class="bg-cyan-500 text-center text-gray-100 font-medium text-lg flex items-center">
                <div class="p-2 w-64">Image</div>
                <div class="p-2 w-full">Size</div>
                <div class="p-2 w-64">Download</div>
            </div>
            @foreach ($templates as $template)
                <div class="flex items-center h-auto border-b border-primary-300">
                    <div class="w-22rem px-6 py-3 flex items-center justify-center border-r border-primary-300">
                        <thumb-image-blade classess="w-5/6 object-cover" 
                        image="{{$template->media[0]->file_name}}" id="{{$template->media[0]->id}}"></thumb-image-blade>
                    </div>
                    <div class="w-full text-center">
                        <div class="font-medium">{{$template->title}}</div>
                        <div class="text-lg">{{$template->size}}</div>
                    </div>
                    <div class="w-64 h-full border-l border-primary-300">
                        <div class="flex items-center space-x-2 justify-center">
                            @foreach ($template->files as $file)
                                <a href="{{ url('storage/'.$file->media[0]->id.'/'.$file->media[0]->file_name) }}">
                                    @if ($file->type == 'pdf')
                                    <svg class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M458 145H54c-25 0-45 20-45 45v180c0 25 20 45 45 45h404c25 0 45-20 45-45V190c0-25-20-45-45-45zM128 303h-17v35a15 15 0 01-30 0V224c0-4 2-8 4-11s7-4 11-4h32c26 0 48 21 48 47s-22 47-48 47zm129 46l-33 1a15 15 0 01-15-15V224c0-4 2-8 4-11s7-4 11-4h31c36 0 60 28 60 70 0 40-25 70-58 70zm153-86a15 15 0 010 30h-27v43a15 15 0 01-30 0V223c0-8 7-15 15-15h46a15 15 0 010 30h-31v25z"/><path d="M255 239h-16v81l17-1c20 0 29-20 29-40 0-9-2-40-30-40zM128 239h-17a8510 8510 0 010 34h17c9 0 18-8 18-17s-9-17-18-17zM442 115c-3-10-8-18-16-26l-62-66a75 75 0 00-54-23H110C85 0 65 20 65 45v70zM65 445v22c0 25 20 45 45 45h292c25 0 45-20 45-45v-22z"/></svg>
                                    @elseif($file->type == 'illustrator')
                                    <svg class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455 455"><g fill-rule="evenodd" clip-rule="evenodd">
                                        <path d="M186 154l-25 96h53l-27-96h-1z"/><path d="M0 0v455h455V0H0zm240 352l-18-62h-69l-17 62H80l73-239h71l74 239h-58zm133 0h-54V179h54v173zm-27-194c-17 0-29-13-28-27-1-16 11-28 28-28s28 12 29 28c0 14-12 27-29 27z"/></g></svg>
                                    @elseif($file->type == 'photoshop')
                                    <svg class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 455 455"><g fill-rule="evenodd" clip-rule="evenodd">
                                        <path d="M149 145l-22 2v72l18 1c29 0 47-15 47-40 0-22-15-35-43-35z"/>
                                        <path d="M0 0v455h455V0H0zm224 237c-18 17-46 25-79 25l-18-1v87H72V108c17-2 41-5 74-5 34 0 59 7 75 20 15 12 26 32 26 56s-8 44-23 58zm82 115c-23 0-43-5-57-13l10-39c10 6 31 13 47 13 17 0 24-5 24-14s-6-14-26-21c-37-12-51-32-50-53 0-32 28-57 71-57 21 0 39 4 50 10l-10 38c-8-5-23-10-38-10-13 0-21 5-21 14 0 8 7 13 29 20 33 12 47 29 48 55 0 32-26 57-77 57z"/></g></svg>
                                    @else
                                    <svg class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M376 274a119 119 0 000 238c66 0 120-53 120-119s-54-119-120-119zm36 105l-40 48a15 15 0 01-25-3l-16-32a15 15 0 1127-14l6 12 25-31a15 15 0 0123 20z"/><path d="M369 85l-61-62v-1a75 75 0 00-53-22H61C37 0 16 20 16 45v389c0 25 21 45 45 45h193a149 149 0 01137-234V138c-1-20-8-38-22-53zM176 335H96a15 15 0 010-30h80a15 15 0 010 30zm0-80H96a15 15 0 010-30h80a15 15 0 010 30zm0-80H96a15 15 0 010-30h80a15 15 0 010 30zm96 80h-16a15 15 0 010-30h16a15 15 0 010 30zm0-80h-16a15 15 0 010-30h16a15 15 0 010 30z"/></svg>
                                    @endif
                                </a>
                            @endforeach
                            @if (count($template->files) === 0)
                                <div class="flex items-center text-xs text-center justify-center text-primary-500 font-medium">
                                     link not available.
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($templates) === 0)
                <div class="flex items-center h-32 justify-center border-b border-primary-300 text-primary-500 font-medium">
                    No templates found!
                </div>
            @endif
        </div>


    </div>



@endsection
