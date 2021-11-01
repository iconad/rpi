<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Edit Price / Size</div>
            <!-- <hr class="my-2"> -->
            <ValidationObserver v-slot="{ invalid }">
            <form @submit.prevent="submitForm">
                <div v-if="$apollo.queries.package.loading" class="mx-12">
                    <div class="loader-dots"></div>
                </div>
                <div class="form-element" v-else>
                    <label class="w-full block relative">
                        <span class="text-sm font-medium mb-1">Paper</span>
                        <div type="text" disabled class="form-input font-medium select-none bg-gray-100"> {{package.paper.title}} </div>
                    </label>
                </div>

                <div class="-mt-3">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Quantity</span>
                        <ValidationProvider name="editingTable.data.quantity" rules="required|number">
                            <div slot-scope="{ errors }">
                                <input type="number" class="form-input" v-model="editingTable.data.quantity">
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
                            <td class="p-2 py-3 border font-medium text-center flex items-center space-x-3">
                                <span v-if="package && package.product.selectedFinishings.length != 0" @click="selectSize(size, size.id)" :class="isSizeEdit && size.id == package_price_size_id ? `bg-gray-600 text-gray-100` : `text-gray-700 bg-gray-100` " class="inline-block hover:bg-gray-600 hover:text-gray-100 tracking-wide rounded-full border font-medium py-1 px-2 cursor-pointer text-xs">Select </span>

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
                    <span class="text-sm px-4 action-button-default" @click="addSizeMethod">
                        <span v-if="addSize">Hide</span>
                        <span v-else>Add Size</span>
                    </span>
                </div>


                <div class="update-size">
                    <template v-if="isSizeEdit">
                        <!-- <pre>
                            {{package.product.selectedFinishings.length != 0 ? package.product.selectedFinishings[0] : null}}
                        </pre> -->
                        <edit-size-finishing
                            @sizeUpdate="onUpdateSize"
                            @priceUpdate="onUpdatePrice"
                            @finishingsUpdate="getFinishingsByQuantity(package_price_size_id)"
                            :prices="prices"
                            :menu="package.product.category.menu"
                            :selectedsizes="sizes"
                            :selectedSize="selectedSize"
                            :finishings="package.product.selectedFinishings"
                            :finishingsbyquantity="finishingsbyquantity">
                        </edit-size-finishing>
                    </template>

                </div>


                <template v-if="addSize">

                    <template v-if="!$apollo.queries.package.loading">
                        <sizes-by-category method="post" :selectedsizes="sizes" :menu="package.product.category.menu" @update="onSelectSize"></sizes-by-category>
                    </template>

                    <div class="-mt-3">
                        <label class="w-full block">
                            <span class="text-sm font-medium mb-1">Price</span>
                            <ValidationProvider name="editingTable.data.price" rules="required|number">
                                <div slot-scope="{ errors }">
                                    <input type="number" class="form-input" v-model="newPrice.price">
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </label>
                    </div>

                    <sizes-finishings :finishings="package.product.selectedFinishings"></sizes-finishings>

                    <div class="mt-5 hidden">
                        <label for="block">
                            <span class="font-medium mb-1">Finishing</span>
                        </label>
                        <template v-for="item in package.product.selectedFinishings" >
                        <div v-if="item.options.length != 0" class="border-b lastchild-notborder flex items-center justify-start py-3" :key="item.id">
                            <div class="w-32 text-sm">{{ item.finishing.title }}</div>
                            <div v-for="option in item.options" :key="option.id" class="space-x-3">
                                <div class="text-center w-full text-sm p-2">{{ option.title }}</div>
                                <input type="text" v-model="finishingPrices" class="text-center text-sm p-2 border focus:border-gray-400 w-24 rounded focus:outline-none active:outline-none">
                            </div>
                        </div>
                        </template>
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

    import editSizeFinishing from './EditSize'
    import SizesByCategory from './Sizes'
    import SizesFinishings from './Finishings'


    import sizes from "../../../../../../gql/queries/sizes.gql";
    import packageQuery from "../../../../../../gql/queries/package.gql";
    import prices from "../../../../../../gql/queries/packageprice.gql";
    import finishingsbyquantityQuery from "../../../../../../gql/queries/finishingsbyquantity.gql";

    extend('required', {
        ...required,
        message: 'This field is required'
    });


    export default {
        props: ['pid', 'pkgid'],
        components: {
            editSizeFinishing,
            SizesByCategory,
            SizesFinishings,
            ValidationProvider,
            ValidationObserver
        },
        data() {
            return {
                addSize: false,
                finishingPrices: [],
                newPrice: {
                    size: null,
                    price: null
                },
                package_price_size_id: null,
                selectedSize: null

            }
        },
        computed: {
            isSizeEdit () {
                return this.$store.state.isSizeEdit
            },
            newFinishings () {
                return this.$store.state.newFinishings
            },
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
            addSizeMethod () {
                this.addSize = !this.addSize
                this.$store.commit('isSizeEdit', false)
            },
            selectSize (size, sizeid) {
                this.$store.commit('isSizeEdit', true)
                this.$store.commit('newFinishings', 'clear')
                this.addSize = false
                this.selectedSize = size
                this.newPrice.price = size.price
                this.newPrice.size = size.size.id
                this.package_price_size_id = sizeid
                this.getFinishingsByQuantity(sizeid)
            },

            getFinishingsByQuantity (sizeid) {
                this.$apollo.queries.finishingsbyquantity.refetch({
                    package_price_size_id: sizeid
                })
            },

            updateTable (index) {
                this.$store.commit('deleteSizePriceFromPackage', index)
                this.$apollo.queries.prices.refetch()
            },
            onSelectSize (data) {
                this.newPrice.size = data
            },
            onUpdateSize (data) {
                this.newPrice.size = data
            },
            onUpdatePrice (data) {
                this.newPrice.price = data
            },
            onUpdateSizeAndPrice (data) {
                this.newPrice.size = data.size
                this.newPrice.price = data.price
            },
            submitForm () {

                axios.put(`/manage/products/${this.pid}/packages/${this.pkgid}/prices/${this.editingTable.data.id}`, {
                    quantity: this.editingTable.data.quantity,
                    size: this.newPrice.size,
                    addsize: this.addSize,
                    price: this.newPrice.price,
                    packageprice: this.editingTable.data.id,
                    finishings: this.newFinishings,
                    selectedsize_id: this.isSizeEdit ? this.selectedSize.id : false,
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
            finishingsbyquantity() {
                return {
                    query: finishingsbyquantityQuery,
                    variables: {
                        package_price_size_id: this.package_price_size_id
                    },
                    update(data) {
                        return data.finishingsbyquantity;
                    }
                };
            },
        }

    }
</script>

<style lang="scss">
.pretty .state label:before, .pretty .state label:after {
    top: 0px!important;
}
.lastchild-notborder {
    &:last-child {
        border: none!important;
    }
}
</style>
