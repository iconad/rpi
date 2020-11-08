<template>
    <div>
        <div v-if="$apollo.queries.categories.loading" class="flex items-enter justify-center mx-12">
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
                    <th class="px-4 py-3">Menu</th>
                    <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                    <tr class="text-gray-700 dark:text-gray-400" v-for="(category, i) in categories" :key="i">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div>
                            <a :href="`/manage/categories/${category.id}`" class="font-semibold theme-link hover:border-transparent">{{category.title}}</a>
                            <span
                                v-if="category.label"
                                :class="[
                                    `inline-bock px-3 py-px font-medium rounded-lg shadow text-xs bg-${category.label.color}`,
                                    category.label.color === 'yellow-300' ? 'text-gray-900' : 'text-gray-100'
                                ]">
                                {{category.label.title}}
                            </span>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{category.menu.title}}
                        </td>
                        <!-- <td class="px-4 py-3 text-sm">
                            <span v-if="category.featured === 0">NO</span>
                            <span v-else>Yes</span>
                        </td> -->
                        <td class="px-4 py-3 text-xs">
                            <change-status @updated="updateCategories" :status="category.status" :id="category.id" model="categories"></change-status>
                        </td>
                    </tr>
                    <tr v-if="categories.length === 0">
                            <td colspan="5">
                                <div class="text-center font-medium p-5 text-sm text-gray-500 uppercase">
                                    Nothing found!
                                </div>
                            </td>
                        </tr>
                </tbody>
                </table>
            </div>
    </div>
    </div>
</template>

<script>
    import gql from 'graphql-tag'
    import categories from "../../../../../gql/queries/categories.gql";

    export default {
        methods: {
            updateCategories () {
                this.$apollo.queries.categories.refetch()
            },
        },
        apollo: {
            categories() {
                return {
                    query: categories,
                    update(data) {
                        return data.categories;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
