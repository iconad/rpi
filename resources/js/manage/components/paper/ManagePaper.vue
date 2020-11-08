<template>
    <div>
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>Papers</span>
            <button @click="sideBar('create-paper')" class="text-sm font-semibold block theme-link">Add New Paper</button>
            </div>
            <!-- New Table -->
            <div v-if="$apollo.queries.papers.loading" class="flex items-enter justify-center mx-12">
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
                        <th class="px-4 py-3">side</th>
                        <th class="px-4 py-3">status</th>
                        <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                        <tr class="text-gray-700 dark:text-gray-400" v-for="(paper, i) in papers" :key="i">
                            <td class="px-4 py-3">
                                <p>{{i+1}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold hover:border-transparent">{{paper.title}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p>{{paper.side}}</p>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <change-status :status="paper.status" :id="paper.id" model="papers"></change-status>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <button class="action-button-warning" @click="sideBarEdit('edit-paper', paper, i)">Edit</button>
                                    <delete-record @updated="updateTable" :id="paper.id" model="papers" class="ml-3"></delete-record>
                                </span>
                            </td>
                        </tr>
                        <tr v-if="papers.length === 0">
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
    import papers from "../../../../../gql/queries/papers.gql";

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
                this.$apollo.queries.papers.refetch()
                this.$store.commit('isSidebar', false)
            }
        },
        apollo: {
            papers() {
                return {
                    query: papers,
                    update(data) {
                        return data.papers;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
