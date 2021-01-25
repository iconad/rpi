<template>
    <div>
        <div v-if="$apollo.queries.products.loading" class="flex items-enter justify-center mx-12">
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
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Menu</th>
                    <th class="px-4 py-3">Featured</th>
                    <th class="px-4 py-3">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >
                    <tr class="text-gray-700 dark:text-gray-400" v-for="(product, i) in products" :key="i">
                        <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div>
                            <a :href="`/manage/products/${product.id}`" class="font-semibold theme-link hover:border-transparent">{{product.title}}</a>
                            <span
                                v-if="product.label"
                                :class="[
                                    `inline-bock px-3 py-px font-medium rounded-lg shadow text-xs ${product.label.color}`,
                                    product.label.color === 'yellow-300' ? 'text-gray-900' : 'text-gray-100'
                                ]">
                                {{product.label.title}}
                            </span>
                            </div>
                        </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span v-if="product.category">{{product.category.title}}</span>
                            <span v-else>---</span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span v-if="product.category.menu">{{product.category.menu.title}}</span>
                            <span v-else>---</span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span>Yes</span>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <change-status @updated="updateProducts" :status="product.status" :id="product.id" model="products"></change-status>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div v-if="products.length === 0" class="text-center font-medium p-5 text-sm text-gray-500 uppercase">
                Nothing found!
            </div>
        </div>

    </div>
</template>

<script>
    import gql from 'graphql-tag'
    import products from "../../../../../gql/queries/products.gql";

    export default {
        methods: {
            updateProducts () {
                this.$apollo.queries.products.refetch()
            },
        },
        apollo: {
            products() {
                return {
                    query: products,
                    update(data) {
                        return data.products;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
