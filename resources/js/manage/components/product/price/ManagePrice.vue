<template>
    <div>

            <!-- Old Name "Add New price / Size" -->
            <!-- change to "Package" -->


        <div class="mb-3 text-lg font-semibold text-gray-800 mb-2 flex items-center justify-between">
            <span>Packages</span>
            <button @click="sideBar('create-price')" class="text-sm font-semibold block theme-link">Add New Package Price</button>
        </div>
            <!-- New Table -->
            <div v-if="$apollo.queries.prices.loading" class="flex items-enter justify-center mx-12">
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
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Region</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                        <tr class="text-gray-700 dark:text-gray-400" v-for="(price, i) in prices" :key="i">
                            <td class="px-4 py-3">
                                <p>{{i+1}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <p v-if="price.quantity">{{price.quantity}}</p>
                                <p v-else>---</p>
                            </td>
                            <td class="px-4 py-3 font-medium">
                                <ul class="text-sm text-gray-800">
                                    <li v-for="(size, i) in price.sizes" :key="i">{{size.price}}</li>
                                </ul>
                            </td>
                            <td class="px-4 py-3 font-medium">
                                <ul class="text-sm text-gray-800">
                                    <li v-for="(size, i) in price.sizes" :key="i">{{size.size.region}}</li>
                                </ul>
                            </td>
                            <td class="px-4 py-3 font-medium">
                                <ul class="text-sm text-gray-800">
                                    <li v-for="(size, i) in price.sizes" :key="i">{{size.size.type}}</li>
                                </ul>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <button class="action-button-warning" @click="sideBarEdit('edit-price', price, i)">Edit</button>
                                    <delete-record @updated="updateTable" :id="pid" :id2="pkgid" :id3="price.id" model="products" model2="packages" model3="prices" class="ml-3"></delete-record>
                                </span>
                            </td>
                        </tr>
                        <tr v-if="prices.length === 0">
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
        <side-bar @updated="updateTable" :pkgid="pkgid" :pid="pid"></side-bar>
    </div>
</template>
<script>

    import SideBar from './../../SideBar'

    import gql from 'graphql-tag'
    import prices from "../../../../../../gql/queries/prices.gql";

    export default {
        props: ['pkgid', 'pid'],
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
                this.$apollo.queries.prices.refetch()
                this.$store.commit('isSidebar', false)
            }
        },
        apollo: {
            prices() {
                return {
                    query: prices,
                    variables: {
                    package_id: this.pkgid
                    },
                    update(data) {
                        return data.prices;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
