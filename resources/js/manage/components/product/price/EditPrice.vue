<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Edit Price / Size</div>
            <!-- <hr class="my-2"> -->
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="submitForm">
                <div v-if="$apollo.queries.package.loading" class="mx-12">
                    <div class="loader-dots"></div>
                </div>
                <div class="form-element" v-else>
                    <label class="w-full block relative">
                        <span class="text-sm font-medium mb-1">Paper</span>
                        <div type="text" disabled class="form-input text-lg font-medium select-none bg-gray-100"> {{package.paper.title}} </div>
                    </label>
                </div>

                <div class="-mt-3">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Quantity</span>
                        <ValidationProvider name="editingTable.data.quantity" rules="required|number">
                            <div slot-scope="{ errors }">
                                <input type="number" class="form-input text-lg" v-model="editingTable.data.quantity">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>

                <div class="my-5" v-if="editingTable.data.sizes.length != 0">
                    <table class="table w-full text-sm">
                        <tr class="bg-gray-100">
                            <th class="p-2 border font-medium">Size</th>
                            <th class="p-2 border font-medium">Price</th>
                            <th class="p-2 border font-medium">Action</th>
                        </tr>
                        <tr v-for="(size, i) in editingTable.data.sizes" :key="i">
                            <td class="p-2 border font-medium text-center">
                                {{ size.size.region }}
                                <span class="capitalize"> / {{size.size.type}}</span>
                                <span> / {{size.size.portrait}}</span>
                                <span> / {{size.size.landscape}}</span>
                                <span>{{size.size.unit}}</span>
                            </td>
                            <td class="p-2 border font-medium text-center">{{size.price}}</td>
                            <td class="p-2 py-3 border font-medium text-center">
                                <delete-record
                                    @updated="updateTable(i)"
                                    classess="text-xs"
                                    :id="size.id"
                                    model="packagepricesizes"
                                    class="ml-3"></delete-record>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="flex items-center justify-end">
                    <span class="text-sm px-4 action-button-default" @click="addSize = !addSize">
                        <span v-if="addSize">Hide</span>
                        <span v-else>Add Size</span>
                    </span>
                </div>

                <template v-if="addSize">

                    <template v-if="!$apollo.queries.package.loading">
                        <sizes-by-category :selectedsizes="sizes" :menu="package.product.category.menu" @update="onSelectSize"></sizes-by-category>
                    </template>

                    <div class="-mt-3">
                        <label class="w-full block">
                            <span class="text-sm font-medium mb-1">Price</span>
                            <ValidationProvider name="editingTable.data.price" rules="required|number">
                                <div slot-scope="{ errors }">
                                    <input type="number" class="form-input text-lg" v-model="newPrice.price">
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </label>
                    </div>
                </template>

                <div class="mt-8">
                    <div class="w-32">
                        <button
                        type="submit"
                        :disabled="invalid"
                        :class="invalid ? 'bg-gray-200 text-gray-700 border-gray-200 hover:border-gray-200 hover:bg-gray-200 cursor-not-allowed':''"
                        class="theme-button text-base font-medium"
                        >Update</button>
                    </div>
                </div>


            </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, oneOf } from 'vee-validate/dist/rules';

    import SizesByCategory from './Sizes'


    import gql from 'graphql-tag'
    import sizes from "../../../../../../gql/queries/sizes.gql";
    import packageQuery from "../../../../../../gql/queries/package.gql";
    import prices from "../../../../../../gql/queries/packageprice.gql";

    extend('required', {
        ...required,
        message: 'This field is required'
    });


    export default {
        props: ['pid', 'pkgid'],
        components: {
            SizesByCategory,
            ValidationProvider,
            ValidationObserver,
        },
        data() {
            return {
                addSize: false,
                newPrice: {
                    size: null,
                    price: null
                }
            }
        },
        computed: {
            sizes () {
                if(!this.$apollo.queries.prices.loading) {
                    return this.prices[0].sizes.map(e => {
                        return e.size
                    })
                }
            },
            editingTable: {
                get: function () {
                    return this.$store.state.editingTable
                },
                set: function (value) {
                    // console.log(value)
                }
            },
        },
        methods: {
            updateTable (index) {
                this.$store.commit('deleteSizePriceFromPackage', index)
                this.$apollo.queries.prices.refetch()
            },
            onSelectSize (data) {
                this.newPrice.size = data
            },
            submitForm () {

                axios.put(`/manage/products/${this.pid}/packages/${this.pkgid}/prices/${this.editingTable.data.id}`, {
                    quantity: this.editingTable.data.quantity,
                    size: this.newPrice.size,
                    addsize: this.addSize,
                    price: this.newPrice.price,
                    packageprice: this.editingTable.data.id,
                })
                .then(response => {
                    this.$emit('updated')
                    this.$apollo.queries.prices.refetch()
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Price',
                        text: 'Updated!',
                    });
                })
            },
        },
        apollo: {
            package() {
                return {
                    query: packageQuery,
                    variables: {
                    id: this.pkgid
                    },
                    update(data) {
                        return data.package;
                    },
                };
            },
            prices() {
                return {
                    query: prices,
                    variables: {
                    id: this.editingTable.data.id
                    },
                    update(data) {
                        return data.packageprice;
                    },
                };
            },
        }

    }
</script>

<style lang="scss">
.pretty .state label:before, .pretty .state label:after {
    top: 0px!important;
}
</style>
