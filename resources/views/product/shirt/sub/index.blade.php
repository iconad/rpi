@extends('layouts.app')

@section('headlinks')
    @livewireStyles
@endsection

@section('content')

    <div class="breadcumbs-wrapper">
        {{ Breadcrumbs::render('personalized-gifts.index', $subCategory->slug) }}
    </div>

    @livewire('shirt-sub-products', [
        'subCategory' => $subCategory,
        'products' => $products,
        'selectedColors' => $selectedColors,
        'selectedGenders' => $selectedGenders,
        'selectedNecks' => $selectedNecks,
        'selectedMaterials' => $selectedMaterials,
        'selectedTypes' => $selectedTypes,
        'colors' => $colors
    ])




@endsection

@section('scripts')
    @livewireScripts


    <script>



        let customChecks = document.querySelectorAll('.custom-checks');
        let customColorCheckInputs = document.querySelectorAll('.custom-color-check-inputs');
        let customGenderCheckInputs = document.querySelectorAll('.custom-gender-check-inputs');
        let customNeckCheckInputs = document.querySelectorAll('.custom-neck-check-inputs');
        let customMaterialCheckInputs = document.querySelectorAll('.custom-material-check-inputs');
        let customTypeCheckInputs = document.querySelectorAll('.custom-type-check-inputs');

        customColorCheckInputs.forEach(element => {
            let customCheck = element.getAttribute('data-custom-check');
            let isCheck = element.checked;
            if (isCheck) {
                let el = document.querySelector('#'+customCheck);
                el.classList.add('bg-green-500');
                el.classList.add('border-green-500');
            }
        });
        customGenderCheckInputs.forEach(element => {
            let customCheck = element.getAttribute('data-custom-check');
            let isCheck = element.checked;
            if (isCheck) {
                let el = document.querySelector('#'+customCheck);
                el.classList.add('bg-green-500');
                el.classList.add('border-green-500');
            }
        });
        customNeckCheckInputs.forEach(element => {
            let customCheck = element.getAttribute('data-custom-check');
            let isCheck = element.checked;
            if (isCheck) {
                let el = document.querySelector('#'+customCheck);
                el.classList.add('bg-green-500');
                el.classList.add('border-green-500');
            }
        });
        customMaterialCheckInputs.forEach(element => {
            let customCheck = element.getAttribute('data-custom-check');
            let isCheck = element.checked;
            if (isCheck) {
                let el = document.querySelector('#'+customCheck);
                el.classList.add('bg-green-500');
                el.classList.add('border-green-500');
            }
        });
        customTypeCheckInputs.forEach(element => {
            let customCheck = element.getAttribute('data-custom-check');
            let isCheck = element.checked;
            if (isCheck) {
                let el = document.querySelector('#'+customCheck);
                el.classList.add('bg-green-500');
                el.classList.add('border-green-500');
            }
        });


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
            el.classList.remove('gw-1/3');
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
                el.classList.remove('gw-1/3');
                el.classList.remove('w-full');
                sessionStorage.removeItem("isSidebar");
                customUnCheck();

            }
        }

    </script>

@endsection
