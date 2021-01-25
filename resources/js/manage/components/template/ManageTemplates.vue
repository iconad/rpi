<template>
    <div>
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>Templates</span>
            <button @click="sideBar('create-template')" class="text-sm font-semibold block theme-link">Add New Template</button>
            </div>
            <!-- New Table -->
            <div v-if="$apollo.queries.templates.loading" class="flex items-enter justify-center mx-12">
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
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Files</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                        <tr class="text-gray-700 dark:text-gray-400" v-for="(template, i) in templates" :key="i">
                            <td class="px-4 py-3">
                                <p>{{i+1}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold hover:border-transparent">{{template.title}}</p>
                            </td>
                            <td class="px-4 py-3 text-sm">{{template.category.title}}</td>
                            <td class="px-4 py-3 text-xs">
                                <span @click="sideBarFiles('template-files', template)" class="action-button-info cursor-pointer">
                                {{template.files.length}} Files</span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <change-status :status="template.status" :id="template.id" model="templates"></change-status>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <button class="action-button-warning" @click="sideBarEdit('edit-template', template, i)">Edit</button>
                                    <delete-record @updated="updateTable" :id="template.category.id" model="template-categories" :id2="template.id" model2="templates" class="ml-3"></delete-record>
                                </span>
                            </td>
                        </tr>
                        <tr v-if="templates.length === 0">
                            <td colspan="6">
                                <div class="text-center font-medium p-5 text-sm text-gray-500 uppercase">
                                    Nothing found!
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <side-bar :template="template" :templatecategoryid="cid" @updated="updateTable"></side-bar>
    </div>
</template>
<script>

    import SideBar from './../SideBar'

    import gql from 'graphql-tag'
    import templatesQuery from "../../../../../gql/queries/templatesbycategory.gql";

    export default {
        props: ['cid'],
        components: {
            SideBar,
        },
        data() {
            return {
                template: null,
            }
        },
        methods: {
            sideBar (value) {
                this.$store.commit('isSidebar', true)
                this.$store.commit('sidebarType', value)
            },
            sideBarFiles (value, template) {
                this.template = template
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
                this.$apollo.queries.templates.refetch()
                this.$store.commit('isSidebar', false)
            }
        },
        apollo: {
            templates() {
                return {
                    query: templatesQuery,
                    variables: {
                        category_id: this.cid
                    },
                    update(data) {
                        return data.templatesbycategory;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
