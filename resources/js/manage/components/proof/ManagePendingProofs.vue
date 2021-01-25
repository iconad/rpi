<template>
    <div>
         <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>Pending Proofs </span>
            <span>
                <span class="uppercase text-sm font-medium text-gray-600 inline-block mr-1">Filter by Pending Proofs ID</span>
                <input type="search" v-model="term" @keyup="searchPendingProofs" :placeholder="`Pending Proof ID`" class="rounded w-full md:w-20rem text-base px-2 py-1 focus:outline-none border">
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
                                $apollo.queries.pps.loading ? '' : 'border-b-0'
                             ]"
                            class="inline-block px-3 py-1 cursor-pointer hover:bg-primary-500 hover:text-white capitalize border border-gray-300 hover:border-primary-500">{{sts}}</span>
                            <input class="hidden" type="radio" name="status" :value="sts" v-model="status" >
                        </label>
                    </div>
                    <div v-if="$apollo.queries.pps.loading" class="flex justify-center w-full">
                        <div class="loader"></div>
                    </div>
                    <div v-else class="border overflow-hidden border-b border-gray-200 sm:rounded-lg sm:rounded-tr-none">
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Pending Proof ID
                            </th>
                            <th class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-700 uppercase tracking-wider">
                                Order ID
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
                        <tbody v-if="pps.length != 0" class="bg-white divide-y divide-gray-200">
                            <tr v-for="pp in pps" :key="pp.id">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 font-medium text-gray-800">
                                       {{pp.created_at | moment("Do MMMM, YYYY")}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base uppercase leading-5 font-medium text-gray-800">
                                        PP-{{pp.id}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base uppercase leading-5 font-medium text-gray-800">
                                        ORD-{{pp.order.id}}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 font-medium text-gray-800">
                                        <a :href="`/manage/users/${pp.user.id}`" class="theme-link hover:border-transparent"> {{pp.user.name}} </a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 font-medium text-gray-800">
                                        <a v-if="pp.status == 'cart'" :href="`/profile/orders/${pp.id}/upload-your-design`" class="theme-link">{{pp.order.product.title}}</a>
                                        <a v-else :href="`/manage/pending-proofs/${pp.id}`" class="theme-link">{{pp.order.product.title}}</a>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-base leading-5 font-medium text-gray-800">
                                        {{pp.order.price_total}} AED
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <span v-if="pp.status == 'pending' " class="capitalize text-base leading-5 font-semibold rounded-full bg-blue-100 text-blue-600"> Pending</span>
                                    <span v-else-if="pp.status == 'paid' " class="capitalize text-base leading-5 font-semibold rounded-full bg-orange-100 text-orange-500"> Paid</span>
                                    <span v-else-if="pp.status == 'declined' " class="capitalize text-base leading-5 font-semibold rounded-full bg-red-100 text-red-600"> Declined</span>
                                </td>
                                 <td class="px-6 py-4 whitespace-no-wrap">
                                     <a :href="`/manage/pending-proofs/${pp.id}`" class="theme-link hover:border-transparent font-medium text-gray-700">View</a>
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
    import peindingProofsQuery from "../../../../../gql/queries/pendingproofs.gql";

    export default {
        props: ['user_id'],
        data() {
            return {
                allstatus: ['all', 'pending', 'paid', 'declined'],
                status: 'all',
                term: null,
            }
        },
        watch: {
            status (value) {
                this.$apollo.queries.pps.refetch({
                    status: value
                })
            },
        },
        methods: {
            searchPendingProofs: _.debounce(function () {
                if(this.term != null) {
                    this.$apollo.queries.pps.refetch({
                        term : this.term,
                        search_by: this.searchBy,
                    })
                }
            }, 500)
        },
        apollo: {
            pps() {
                return {
                    query: peindingProofsQuery,
                    variables: {
                        status: this.status,
                        term: this.term,
                    },
                    update(data) {
                        return data.managependingproofs;
                    },
                };
            },
        }
    }
</script>
