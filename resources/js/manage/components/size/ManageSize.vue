<template>
    <div>
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>Sizes</span>
            <button @click="sideBar('create-size')" class="text-sm font-semibold block theme-link">Add New Size</button>
            </div>
            <!-- New Table -->
            <div v-if="$apollo.queries.sizes.loading" class="flex items-enter justify-center mx-12">
                <div class="loader"></div>
            </div>
            <div v-else class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Region</th>
                        <th class="px-4 py-3">type</th>
                        <th class="px-4 py-3">Product Type</th>
                        <th class="px-4 py-3">Dimensions</th>
                        <th class="px-4 py-3">price</th>
                        <th class="px-4 py-3">status</th>
                        <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                        <tr class="text-gray-700 dark:text-gray-400" v-for="(size, i) in sizes" :key="i">
                            <td class="px-4 py-3">
                                <p>{{i+1}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold hover:border-transparent">{{size.region ? size.region : '-'}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p>{{size.type ? size.type : '-'}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p v-if="size.menus.length != 0">
                                    <!-- {{size.menus.length}} product types -->
                                    <span v-for="(menu, i) in size.menus" class="action-button-default m-1 text-xs" :key="i">{{menu.title}}</span>
                                </p>
                                <p v-else >---</p>
                            </td>
                            <td class="px-4 py-3">
                                <p>
                                    <span v-if="size.portrait && size.landscape">{{size.portrait}}x{{size.landscape}}</span>
                                    {{size.unit}}
                                </p>
                            </td>
                            <td class="px-4 py-3">
                                <p v-if="size.price">{{size.price}}</p>
                                <p v-else>--</p>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <change-status :status="size.status" :id="size.id" model="sizes"></change-status>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <button class="action-button-warning" @click="sideBarEdit('edit-size', size, i)">Edit</button>
                                    <delete-record @updated="sizeUpdated" :id="size.id" model="sizes" class="ml-3"></delete-record>
                                </span>
                            </td>
                        </tr>
                        <tr v-if="sizes.length === 0">
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
        <side-bar @updated="sizeUpdated"></side-bar>
    </div>
</template>
<script>

    import SideBar from './../SideBar'

    import gql from 'graphql-tag'
    import sizes from "../../../../../gql/queries/sizes.gql";

    export default {
        components: {
            SideBar,
        },
        methods: {
            sideBar (value) {
                this.$store.commit('isSidebar', true)
                this.$store.commit('sidebarType', value)
            },
            sideBarEdit (value, table, index) {
                table = {
                    data: table,
                    index: index
                }
                this.$store.commit('isSidebar', true)
                this.$store.commit('sidebarType', value)
                this.$store.commit('editingTable', table)
            },
            sizeUpdated () {
                this.$apollo.queries.sizes.refetch()
                this.$store.commit('isSidebar', false)
            }
        },
        apollo: {
            sizes() {
                return {
                    query: sizes,
                    update(data) {
                        return data.sizes;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
