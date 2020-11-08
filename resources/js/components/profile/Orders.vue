<template>
    <div>
        <div class="text-2xl font-semibold text-gray-900 flex items-center justify-between">
            <span>Orders </span>
            <span>
                <input type="search" placeholder="Search Order by Order Number/Name/Products " class="rounded w-full md:w-35rem text-base p-2 focus:outline-none border">
            </span>
        </div>

        <div class="mt-10">
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="border overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                            Date Order
                        </th>
                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                            Order No.
                        </th>
                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                            Product
                        </th>
                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                            Price
                        </th>
                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                            Status
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-base leading-5 font-medium text-gray-800">
                                    05 Nov 1993
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-base leading-5 font-medium text-gray-800">
                                    ORD-3423433
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-base leading-5 font-medium text-gray-800">
                                    <a href="#" class="theme-link">Prduct Name here</a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-base leading-5 font-medium text-gray-800">
                                    234 AED
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <span class="capitalize text-base leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Denaied
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-base leading-5 font-medium text-gray-800">
                                    05 Nov 1993
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-base leading-5 font-medium text-gray-800">
                                    ORD-3423433
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-base leading-5 font-medium text-gray-800">
                                    <a href="#" class="theme-link">Prduct Name here</a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-base leading-5 font-medium text-gray-800">
                                    234 AED
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <span class="capitalize text-base leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    delivered
                                </span>
                            </td>
                        </tr>

                        <!-- More rows... -->
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>

</style>
