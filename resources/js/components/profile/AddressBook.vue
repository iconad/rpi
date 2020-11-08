<template>
    <div>
        <div class="text-2xl font-semibold text-gray-900 flex items-center justify-between">
            <span>Address Book </span>
            <span>
                <input type="search" placeholder="Search Delivery Address " class="rounded w-full md:w-64 text-base p-2 focus:outline-none border">
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
                                    Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                    Address
                                </th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                    Mobile
                                </th>
                                <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <!-- <tbody class="bg-white divide-y divide-gray-200">

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

                            </tr>

                        </tbody> -->
                    </table>
                    <div class="text-center font-medium text-lg my-12">No Results Found!</div>
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
