<template>
    <div>
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>color</span>
            <create-color @updated="updatedColors"></create-color>
            </div>
            <!-- New Table -->
            <div v-if="$apollo.queries.colors.loading" class="flex items-enter justify-center mx-12">
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

                        <tr class="text-gray-700 dark:text-gray-400" v-for="(color, i) in colors" :key="i">
                            <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div>
                                <p class="font-semibold hover:border-transparent">{{color.title}}</p>
                                </div>
                            </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span :class="
                                [
                                `inline-block font-medium w-24 h-8 text-base flex items-center justify-center border border-gray-200 rounded`,
                                color.hex === '#FFFFFF' ? 'text-gray-700' : 'text-gray-100',
                                ]" :style="`background: ${color.hex}`"> {{color.hex}} </span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <edit-color @updated="updatedColors" :data="color"></edit-color>
                                    <delete-record @updated="updatedColors" :id="color.id" model="colors" class="ml-3"></delete-record>
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

    import EditColor from './EditColor'
    import CreateColor from './CreateColor'

    import gql from 'graphql-tag'
    import colors from "../../../../../gql/queries/colors.gql";

    export default {
        components: {
            CreateColor,
            EditColor
        },
        methods: {
            updatedColors () {
                this.$apollo.queries.colors.refetch()
            }
        },
        apollo: {
            colors() {
                return {
                    query: colors,
                    update(data) {
                        return data.colors;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
