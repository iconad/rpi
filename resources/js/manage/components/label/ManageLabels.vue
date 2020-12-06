<template>
    <div>
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>Label</span>
            <create-label @updated="updatedLabels"></create-label>
            </div>
            <!-- New Table -->
            <div v-if="$apollo.queries.labels.loading" class="flex items-enter justify-center mx-12">
                <div class="loader"></div>
            </div>
            <div v-else class="w-full overflow-hidden rounded-lg shadow-xs">
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

                        <tr class="text-gray-700 dark:text-gray-400" v-for="(label, i) in labels" :key="i">
                            <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div>
                                <p class="font-semibold hover:border-transparent">{{label.title}}</p>
                                </div>
                            </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                {{label.color}}
                                <span :class="`inline-block w-16 h-5 ${label.color} rounded`"></span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <edit-label @updated="updatedLabels" :label="label"></edit-label>
                                    <delete-record @updated="updatedLabels" :id="label.id" model="labels" class="ml-3"></delete-record>
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
    import CreateLabel from './CreateLabel'

    import gql from 'graphql-tag'
    import labels from "../../../../../gql/queries/labels.gql";

    export default {
        components: {
            CreateLabel,
            EditLabel
        },
        methods: {
            updatedLabels () {
                this.$apollo.queries.labels.refetch()
            }
        },
        apollo: {
            labels() {
                return {
                    query: labels,
                    update(data) {
                        return data.labels;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
