<template>
    <div>
         <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span> {{username}}'s Orders </span>
            <span>
                <span class="uppercase text-sm font-medium text-gray-600 inline-block mr-1">Filter Orders by</span>
                <select v-model="searchBy" class="rounded text-base px-2 py-5px focus:outline-none border">
                    <option value="id">Order ID</option>
                    <option value="product">Product Name</option>
                </select>
                <input type="search" v-model="term" @keyup="searchOrders" :placeholder="`Search Order ${searchBy}`" class="rounded w-full md:w-20rem text-base px-2 py-1 focus:outline-none border">
            </span>
        </div>

        <div class="mt-10">
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="flex items-center justify-end text-sm font-medium">
                        <label v-for="(sts, i) in allstatus" :key="sts">
                            <span
                            :class="[
                                sts === status ? 'bg-primary-500 text-white border-primary-500' : '',
                                i === allstatus.length ? 'border-r-0' : '',
                                i === 0 ? '' : 'border-l-0',
                                $apollo.queries.orders.loading ? '' : 'border-b-0'
                             ]"
                            class="inline-block px-3 py-1 cursor-pointer hover:bg-primary-500 hover:text-white capitalize border border-gray-300 hover:border-primary-500">{{sts}}</span>
                            <input class="hidden" type="radio" name="status" :value="sts" v-model="status" >
                        </label>
                    </div>
                    <div v-if="$apollo.queries.orders.loading" class="flex justify-center w-full">
                        <div class="loader"></div>
                    </div>
                    <div v-else class="border overflow-hidden border-b border-gray-200 sm:rounded-lg sm:rounded-tr-none">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Date Order
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Order No.
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                User
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Product
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Price
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Actions
                            </th>
                            </tr>
                        </thead>
                        <tbody v-if="orders.length != 0" class="bg-white divide-y divide-gray-200">
                            <tr v-for="order in orders" :key="order.id">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 font-medium text-gray-800">
                                       {{order.created_at | moment("Do MMMM, YYYY")}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base uppercase leading-5 font-medium text-gray-800">
                                        {{order.id}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 font-medium text-gray-800">
                                        <a :href="`/manage/users/${order.user.id}`" class="theme-link hover:border-transparent"> {{order.user.name}} </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 font-medium text-gray-800">
                                        <a v-if="order.status == 'cart'" :href="`/profile/orders/${order.id}/upload-your-design`" class="theme-link">{{order.product.title}}</a>
                                        <a v-else :href="`/manage/orders/${order.id}`" class="theme-link">{{order.product.title}}</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 font-medium text-gray-800">
                                        {{order.price_total}} AED
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <span v-if="order.status == 'cart' " class="capitalize text-base leading-5 font-semibold rounded-full bg-blue-100 text-blue-600"> Cart</span>
                                    <span v-else-if="order.status == 'pending' " class="capitalize text-base leading-5 font-semibold rounded-full bg-orange-100 text-orange-500"> Pending</span>
                                    <span v-else-if="order.status == 'confirmed' " class="capitalize text-base leading-5 font-semibold rounded-full bg-gray-100 text-gray-700"> Confirmed</span>
                                    <span v-else-if="order.status == 'onhold' " class="capitalize text-base leading-5 font-semibold rounded-full bg-orange-100 text-orange-600"> On Hold</span>
                                    <span v-else-if="order.status == 'delivered' " class="capitalize text-base leading-5 font-semibold rounded-full bg-green-100 text-green-600"> delivered</span>
                                    <span v-else-if="order.status == 'rejected' " class="capitalize text-base leading-5 font-semibold rounded-full bg-red-100 text-red-600"> rejected</span>
                                </td>
                                 <td class="px-6 py-4 whitespace-no-wrap">
                                     <a :href="`/manage/orders/${order.id}`" class="theme-link hover:border-transparent font-medium text-gray-700">View</a>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr>
                                <td colspan="6" class="text-center p-3 text-base leading-5 font-medium text-gray-600"> 0 record found! </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    import gql from 'graphql-tag'
    import ordersQuery from "../../../../../gql/queries/ordersbyuser.gql";

    export default {
        props: ['user_id','username'],
        data() {
            return {
                allstatus: ['all', 'cart', 'pending', 'confirmed', 'delivered', 'on-hold', 'rejected'],
                status: 'all',
                term: null,
                searchBy: 'id'
            }
        },
        watch: {
            status (value) {
                this.$apollo.queries.orders.refetch({
                    status: value
                })
            },
            searchBy (value) {
                this.$apollo.queries.orders.refetch({
                    search_by: this.searchBy,
                })
            }
        },
        methods: {
            searchOrders: _.debounce(function () {
                if(this.term != null) {
                    this.$apollo.queries.orders.refetch({
                        term : this.term,
                        search_by: this.searchBy,
                    })
                }
            }, 500)
        },
        apollo: {
            orders() {
                return {
                    query: ordersQuery,
                    variables: {
                        status: this.status,
                        term: this.term,
                        user_id: this.user_id,
                        search_by: this.searchBy,
                    },
                    update(data) {
                        return data.manageordersbyuser;
                    },
                };
            },
        }
    }
</script>
