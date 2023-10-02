@extends('layouts.printo')

@section('content')
<div class="contact-us md:p-5 p-4 md:px-20 sm:block">
    <div class="text-left py-8">
    <h1 class="text-3xl md:text-5xl mb-1">Standard Business <br class="md:hidden block" />Cards </h1>
    </div>

    <div class="min-h-screen flex flex-col justify-center items-center">
    <div class="flex flex-row p-20">
        <img src="{{ asset('images/product-details/product1.png') }}" alt="Image 1" class="w-1/2 h-auto pr-10">
        <img src="{{ asset('images/product-details/product2.png') }}" alt="Image 2" class="w-1/2 h-auto pl-10">
    </div>
    <div class="text-center mt-4">
        <h1 class="text-3xl font-bold">Centered Text</h1>
        <p class="text-gray-600">Some description or additional text here.</p>
    </div>
</div>


</div>
    <!-- New Section -->
    <div class="flex justify-center items-center">
    <div class="text-center">
        <h2 class="text-2xl font-bold">Another Centered Heading</h2>
        <div class="mt-2">
            <label for="selectOption" class="mr-2">Select an option:</label>
            <select id="selectOption" class="border rounded p-2">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
        </div>
    </div>
</div>

<div class="flex justify-center items-center mt-8">
    <!-- Table 1 -->
    <table id="table1" class="border border-gray-400">
        <!-- Table headers -->
        <thead>
            <tr>
                <th class="border p-2">table 1</th>
                <th class="border p-2">table 1</th>
                <th class="border p-2">table 1</th>
            </tr>
        </thead>
        <!-- Table body (content will change based on select) -->
        <tbody>
            <tr>
                <td class="border p-2">Data 1</td>
                <td class="border p-2">Data 2</td>
                <td class="border p-2">Data 3</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <!-- Table 2 (initially hidden) -->
    <table id="table2" class="hidden border border-gray-400">
        <!-- Table headers -->
        <thead>
            <tr>
                <th class="border p-2">table two</th>
                <th class="border p-2">table two</th>
                <th class="border p-2">table two</th>
            </tr>
        </thead>
        <!-- Table body (content will change based on select) -->
        <tbody>
        <tr>
                <td class="border p-2">Data 1</td>
                <td class="border p-2">Data 2</td>
                <td class="border p-2">Data 3</td>
            </tr>
        </tbody>
    </table>

    <!-- Table 3 (initially hidden) -->
    <table id="table3" class="hidden border border-gray-400">
        <!-- Table headers -->
        <thead>
            <tr>
                <th class="border p-2">table three</th>
                <th class="border p-2">table three</th>
                <th class="border p-2">table three</th>
            </tr>
        </thead>
        <!-- Table body (content will change based on select) -->
        <tbody>
        <tr>
                <td class="border p-2">Data 1</td>
                <td class="border p-2">Data 2</td>
                <td class="border p-2">Data 3</td>
            </tr>
        </tbody>
    </table>
</div>



<script>
    // JavaScript to update the table based on the selected option
    document.addEventListener("DOMContentLoaded", function () {
    const selectOption = document.getElementById('selectOption');
    const table1 = document.getElementById('table1');
    const table2 = document.getElementById('table2');
    const table3 = document.getElementById('table3');

    selectOption.addEventListener('change', () => {
        // Get the selected option value
        const selectedOption = selectOption.value;

        // Hide all tables
        table1.classList.add('hidden');
        table2.classList.add('hidden');
        table3.classList.add('hidden');

        // Show the selected table
        switch (selectedOption) {
            case 'option1':
                table1.classList.remove('hidden');
                break;
            case 'option2':
                table2.classList.remove('hidden');
                break;
            case 'option3':
                table3.classList.remove('hidden');
                break;
        }
    });
});
</script>



@endsection