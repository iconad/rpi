<template>
    <div>
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>Finishings</span>
            <button @click="sideBar('create-finishing')" class="text-sm font-semibold block theme-link">Add New Finishing</button>
            </div>
            <!-- New Table -->
            <div v-if="$apollo.queries.finishings.loading" class="flex items-enter justify-center mx-12">
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
                        <th class="px-4 py-3">title</th>
                        <th class="px-4 py-3">delivery time</th>
                        <th class="px-4 py-3">video</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                        <tr class="text-gray-700 dark:text-gray-400" v-for="(finishing, i) in finishings" :key="i">
                            <td class="px-4 py-3">
                                <p>{{i+1}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold hover:border-transparent">{{finishing.title}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p>{{finishing.delivery_time}} working days</p>
                            </td>
                            <td class="px-4 py-3">
                                <p v-if="finishing.video_link">
                                    <a :href="finishing.video_link" class="theme-link border-b" target="_blank">Video</a>
                                </p>
                                <p v-else>No Video</p>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <change-status :status="finishing.status" :id="finishing.id" model="finishings"></change-status>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <button class="action-button-warning" @click="sideBarEdit('edit-finishing', finishing, i)">Edit</button>
                                    <delete-record @updated="updateTable" :id="finishing.id" model="finishings" class="ml-3"></delete-record>
                                </span>
                            </td>
                        </tr>
                        <tr v-if="finishings.length === 0">
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
        <side-bar @updated="updateTable"></side-bar>
    </div>
</template>
<script>

    import SideBar from './../SideBar'

    import gql from 'graphql-tag'
    import finishings from "../../../../../gql/queries/finishings.gql";

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
            updateTable () {
                this.$apollo.queries.finishings.refetch()
                this.$store.commit('isSidebar', false)
            }
        },
        apollo: {
            finishings() {
                return {
                    query: finishings,
                    update(data) {
                        return data.finishings;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
