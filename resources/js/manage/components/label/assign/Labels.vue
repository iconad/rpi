<template>
    <div>
        <div class="mb-3 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            </div>
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Color</th>
                        <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >

                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div>
                                <p class="font-semibold hover:border-transparent">{{label.title}}</p>
                                </div>
                            </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span :class="`inline-block w-16 h-5 ${label.color} rounded`"></span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <edit-label :refresh="refresh" :model="model" @updated="updatedLabels" :label="label" :title="title" :id="id"></edit-label>
                                </span>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

    import EditLabel from './EditLabel'

    export default {
        props: ['label', 'id', 'title', 'model', "refresh"],
        components: {
            EditLabel
        },
        methods: {
            updatedLabels () {
                this.$emit('updated')
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
