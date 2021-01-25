<template>
    <div>
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>options</span>
            <button @click="sideBar('create-print-option')" class="text-sm font-semibold block theme-link">Add New Option</button>
            </div>
            <!-- New Table -->
            <div v-if="$apollo.queries.options.loading" class="flex items-enter justify-center mx-12">
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
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Extra Days</th>
                        <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                        <tr class="text-gray-700 dark:text-gray-400" v-for="(option, i) in options" :key="i">
                            <td class="px-4 py-3">
                                <p>{{i+1}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold hover:border-transparent">{{option.title}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p>{{option.type}} </p>
                            </td>
                            <td class="px-4 py-3">
                                <p>{{option.price}} </p>
                            </td>
                            <td class="px-4 py-3">
                                <p>{{option.days}} </p>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <button class="action-button-warning" @click="sideBarEdit('edit-print-option', option, i)">Edit</button>
                                    <delete-record @updated="updateTable" :id="printid" :id2="option.id" model="printing" model2="options"  class="ml-3"></delete-record>
                                </span>
                            </td>
                        </tr>
                        <tr v-if="options.length === 0">
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
        <side-bar :printid="printid" @updated="updateTable"></side-bar>
    </div>
</template>
<script>

    import SideBar from './../../SideBar'

    import gql from 'graphql-tag'
    import options from "../../../../../../gql/queries/printingoptions.gql";

    export default {
        props: ['printid'],
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
                this.$apollo.queries.options.refetch()
                this.$store.commit('isSidebar', false)
            }
        },
        apollo: {
            options() {
                return {
                    query: options,
                    variables: {
                        print_id: this.printid
                    },
                    update(data) {
                        return data.printingoptions;
                    },
                };
            },
        }
    }
</script>
