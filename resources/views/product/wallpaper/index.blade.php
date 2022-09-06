@extends('layouts.app')

@section('headlinks')
    @livewireStyles
@endsection

@section('content')

    <div class="breadcumbs-wrapper">
        {{ Breadcrumbs::render('wallpapers.index', $subcategory->slug) }}
    </div>



    @livewire('wallpaper-products', [
        'subcategory' => $subcategory,
        'products' => $products,
        'selectedColors' => $selectedColors,
        'selectedMaterials' => $selectedMaterials,
        'colors' => $colors,
        'materials' => $materials
    ])

@endsection

@section('scripts')
    @livewireScripts


    <script>

        let isSidebar = sessionStorage.getItem("isSidebar");
        let el = document.querySelector('#productSidebar');
        let checkboxButton = document.querySelector('#isSidebarCheckbox');


        if(isSidebar) {
            el.classList.remove('hidden');
            el.classList.add('lg:w-1/3');
            el.classList.add('w-full');
            checkboxButton.setAttribute('checked', 'checked');

            customCheck();


        } else {
            el.classList.add('hidden');
            el.classList.remove('lg:w-1/3');
            el.classList.remove('w-full');
            checkboxButton.removeAttribute('checked');

            customUnCheck();

        }

        function customCheck() {

            let isSidebarCheckboxBox = document.querySelector('#isSidebarCheckboxBox');
            let isSidebarCheckboxTick = document.querySelector('#isSidebarCheckboxTick');
            let isSidebarCheckboxCross = document.querySelector('#isSidebarCheckboxCross');

            isSidebarCheckboxBox.classList.add('justify-end');
            isSidebarCheckboxCross.classList.remove('hidden');
            isSidebarCheckboxTick.classList.add('hidden');

        }

        function customUnCheck() {

        let isSidebarCheckboxBox = document.querySelector('#isSidebarCheckboxBox');
        let isSidebarCheckboxTick = document.querySelector('#isSidebarCheckboxTick');
        let isSidebarCheckboxCross = document.querySelector('#isSidebarCheckboxCross');

        isSidebarCheckboxBox.classList.remove('justify-end');
        isSidebarCheckboxBox.classList.add('justify-start');
        isSidebarCheckboxTick.classList.remove('hidden');
        isSidebarCheckboxCross.classList.add('hidden');

        }



        function toggleSidebar (e) {

            let el = document.querySelector('#productSidebar');

            if(e.checked) {
                el.classList.remove('hidden');
                el.classList.add('lg:w-1/3');
                el.classList.add('w-full');
                sessionStorage.setItem("isSidebar", true);
                customCheck();

            } else {
                el.classList.add('hidden');
                el.classList.remove('lg:w-1/3');
                el.classList.remove('w-full');
                sessionStorage.removeItem("isSidebar");
                customUnCheck();

            }
        }

    </script>

@endsection
