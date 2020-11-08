<template>
    <div>
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>Menu</span>
            <create-menu @updated="menuUpdated"></create-menu>
            </div>
            <!-- New Table -->
            <div v-if="$apollo.queries.menus.loading" class="flex items-enter justify-center mx-12">
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
                        <th class="px-4 py-3">status</th>
                        <th class="px-4 py-3">label</th>
                        <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >

                        <tr class="text-gray-700 dark:text-gray-400" v-for="(menu, i) in menus" :key="i">
                            <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div>
                                <p class="font-semibold hover:border-transparent">{{menu.title}}</p>
                                </div>
                            </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <change-status :status="menu.status" :id="menu.id" model="menu"></change-status>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <assigned-label-button @updated="menuUpdated" :menu="menu" model="menu" ></assigned-label-button>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <edit-menu @updated="menuUpdated" :menu="menu"></edit-menu>
                                    <delete-record @updated="menuUpdated" :id="menu.id" model="menu" class="ml-3"></delete-record>
                                </span>
                            </td>
                        </tr>
                        <tr v-if="menus.length === 0">
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

    import EditMenu from './EditMenu'
    import CreateMenu from './CreateMenu'

    import gql from 'graphql-tag'
    import menus from "../../../../../gql/queries/menus.gql";

    export default {
        components: {
            CreateMenu,
            EditMenu
        },
        methods: {
            menuUpdated () {
                this.$apollo.queries.menus.refetch()
            }
        },
        apollo: {
            menus() {
                return {
                    query: menus,
                    update(data) {
                        return data.menus;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
