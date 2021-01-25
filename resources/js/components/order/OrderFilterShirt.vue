<template>
    <div>
        <div class="hidden">
            {{selectedShirt}}
            {{notSelectedShirtPrinting}}
        </div>
        <pre class="text-red-500">
            <!-- {{$store.state.selectedShirtPrinting}} -->
        </pre>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10 mt-10">
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="passes(submitForm)">
                <div class="filter">

                    <div v-if="ordertype ==='shirt'" class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.06 31.06"><path d="M20.87 19.87a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#00a1e9"/><path d="M11.43 29.31a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#e4007f"/><path d="M11.19 10.19a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#ffe200"/><path d="M1.75 19.64a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#9fa0a0"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Colour</span>
                        </div>
                        <div class="w-full" v-if="isProduct">
                            <ValidationProvider name="shirt.value.color" rules="required">
                                <div slot-scope="{ errors }">
                                    <input type="text" :value="product.title" class="border p-2 rounded w-full focus:outline-none" @click="showSelectShirtModal">
                                    <!-- <multiselect class="customulti" v-model="shirt.value.color" :options="shirt.data.color"></multiselect> -->
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </div>
                    </div>
                    <!-- input wrapper -->

                    <div class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M3 16l-3-3v7h7l-3-3 5-4-2-2-4 5zM17 4l3 3V0h-7l3 3-5 4 2 2 4-5zm-1 13l-3 3h7v-7l-3 3-4-5-2 2 5 4zM4 3l3-3H0v7l3-3 4 5 2-2-5-4z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Size</span>
                        </div>
                        <div class="w-full grid grid-cols-5 text-center" v-if="isProduct">

                            <div v-for="(variant, i) in product.variants" :key="variant.id">
                                <shirt-size-input @update-size="onUpdateSize" :index="i" :variant="variant"></shirt-size-input>
                            </div>

                            <div v-if="isShirtSizesError" class="col-span-5 text-left pt-1 pl-2">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">You must choose one size</p>
                            </div>
                        </div>
                    </div>

                    <!-- input wrapper -->

                    <div v-if="ordertype == 'shirt' "  class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2 2l2-2h12a2 2 0 012 2v16a2 2 0 01-2 2H4a2 2 0 01-2-2V2zm3 1v2h10V3H5zm0 4v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9zm4 0v6h2v-6h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Buy Type</span>
                        </div>
                        <div class="w-full flex items-center my-5 lg:my-0">
                        <ValidationProvider rules="oneOf:printed,blank" class="w-full flex" name="shirt.value.buyType" v-slot="{ errors }">
                            <label class="flex items-center cursor-pointer">
                                <pretty-radio p-bigger color="warning" value="printed" v-model="shirt.value.buyType"></pretty-radio>
                                <span class="inline-block">Buy Printed</span>
                            </label>
                            <label class="flex items-center cursor-pointer ml-6">
                                <pretty-radio p-bigger color="warning" value="blank" v-model="shirt.value.buyType"></pretty-radio>
                                <span class="inline-block">Buy Blank {{radio}}</span>
                            </label>
                            <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </ValidationProvider>
                        </div>
                    </div>
                    <!-- input wrapper -->
                    <div v-if="shirt.value.buyType === 'printed' && summed != 0" class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.8 26.3"><path class="cls-1" d="M383 26a9 9 0 01-7-4c-5-6 5-18 6-21l2-1 1 1a54 54 0 015 8c3 6 3 11 1 13a9 9 0 01-8 4zm0-22c-3 5-8 13-5 17a7 7 0 0011 0c3-4-2-13-6-17z" transform="translate(-366)"/><path class="cls-1" d="M375 0c-1 1-12 16-7 22a9 9 0 0015 0c5-6-7-21-8-22z" transform="translate(-366)"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Printing</span>
                        </div>
                        <div class="w-full" v-if="!$apollo.queries.printings.loading">
                            <multiselect @select="showShirtPrintingModal" class="customulti" v-model="shirt.value.printing" :options="notSelectedShirtPrinting">
                                <template slot="singleLabel" slot-scope="props">
                                    <span class="option__desc">
                                        <span class="option__title">{{props.option.title}}</span>
                                    </span>
                                </template>

                                <template slot="option" slot-scope="props">
                                    <div class="option__desc">
                                        <span class="option__title">{{props.option.title}}</span>
                                    </div>
                                </template>
                            </multiselect>
                            <div class="mt-2">
                                 <order-shirt-selected-printing></order-shirt-selected-printing>
                            </div>
                        </div>
                    </div>
                    <!-- input wrapper -->
                    <div class="flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6"  viewBox="0 0 512 512"><path d="M414 304a59 59 0 100 118 59 59 0 000-118zm0 84a26 26 0 110-51 26 26 0 010 51zM329 91H17C7 91 0 98 0 107v254c0 10 7 17 17 17h51v-33H33V124h280v237h33V107c0-9-8-16-17-16z"/><path d="M149 345h223v33H149z"/><path d="M108 304a59 59 0 101 118 59 59 0 00-1-118zm0 84a26 26 0 111-51 26 26 0 01-1 51zM495 228H329v33h150v84h-24v33h40c10 0 17-7 17-17V244c0-9-7-16-17-16z"/><path d="M446 159c-3-5-9-8-15-8H329v33h92l38 68 29-16-42-77z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Turnaround </span>
                        </div>
                        <div class="w-full">
                            <div class="p-2 w-full border focus:outline-none font-medium bg-white capitalize"> {{days.total}} business days </div>
                        </div>
                    </div>
                    <!-- input wrapper -->

                    <div class="flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex">
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Price </span>
                        </div>
                        <div class="w-full">
                            <table class="table-fixed w-full text-left rounded-lg overflow-scroll">
                                <tbody>
                                    <tr class="hidden">
                                        <th class="border border-gray-200 px-3 text-sm py-2">Product Price</th>
                                        <td class="border border-gray-200 px-3 text-sm py-2 font-semibold text-gray-700">
                                            {{price.product}}
                                        </td>
                                    </tr>
                                    <tr v-if="!isShirtSizesError">
                                        <th class="border border-gray-200 px-3 text-sm py-2">Quantity</th>
                                        <td class="border border-gray-200">
                                            <table class="table-fixed w-full font-semibold text-gray-700">
                                                <template v-for="(size, i) in selectedVariants">
                                                <tr :key="i" v-if="size.quantity != 0">
                                                    <td :class=" i+1 != selectedVariants.length ? 'border-b' : ''  " class="border-r border-gray-200 px-3 text-sm py-2">{{size.title}} </td>
                                                    <td :class=" i+1 != selectedVariants.length ? 'border-b' : ''  " class="border-gray-200 px-3 text-sm py-2">
                                                        {{size.quantity}} x
                                                        {{size.price}}
                                                    </td>
                                                </tr>
                                                </template>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-200 px-3 text-sm py-2">Printing</th>
                                        <td :class="summed != 0 ? 'border-t-0' : '' " class="border border-gray-200 px-3 text-sm py-2 font-semibold text-gray-700">{{price.printing}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-200 px-3 text-sm py-2">Extra</th>
                                        <td class="border border-t-0 border-gray-200 px-3 text-sm py-2 font-semibold text-gray-700">{{price.extra}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-200 px-3 text-sm py-2">Incl. VAT (5%)</th>
                                        <td class="border border-gray-200 px-3 text-sm py-2 font-semibold text-gray-700">{{price.vat}}</td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-200 px-3 text-sm py-2">Total</th>
                                        <td class="border border-gray-200 px-3 font-semibold text-base text-red-500 py-2">{{price.total}} AED</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>


                    <div v-if="user" class="flex items-center mt-12 input-wrapper">
                        <div class="w-full text-center" v-tooltip="{
                            content: invalid ? `Please fill the required fields first.` : ``,
                            placement: 'top-center',
                            classes: ['bg-theme-red text-white p-2 rounded-lg'],
                            offset: 5,
                            delay: {
                                show: 0,
                                hide: 300,
                            },
                        }">
                          <button
                            type="submit"
                            :disabled="isShirtSizesError"
                            :class=" isShirtSizesError ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed' : 'bg-primary-500 text-white'"
                            class="border p-5 w-3/4 mx-auto rounded font-medium text-2xl flex items-center justify-center">
                            <span
                            :class="[
                                isShirtSizesError ? 'text-gray-700' : 'text-gray-100'
                            ]"
                            class="inline-block mr-2">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 10v6H7v-6H2l8-8 8 8h-5zM0 18h20v2H0v-2z"/>
                                </svg>
                            </span>
                            <span>
                                Upload Your Design
                            </span>
                            </button>
                        </div>
                    </div>
                    <div v-else class="flex items-center mt-12 input-wrapper">
                        <a href="/login" class="text-base p-5 w-3/4 mx-auto border-2 border-primary-500 rounded font-medium flex items-center justify-center text-white text-primary-500 hover:bg-primary-500 hover:text-white transition ease-in-out duration-300">
                            Sign in before uploading your design
                        </a>
                    </div>
                    <!-- input wrapper -->
                </div>
            </form>
            </ValidationObserver>

            <div>
                <order-images-slider></order-images-slider>
            </div>
        </div>

        <modal width="900" adaptive height="auto" scrollable name="select-shirt-modal" class="relative">
            <div @click="$modal.hide('select-shirt-modal')" class="close absolute right-0 top-0 p-1 cursor-pointer text-red-500 flex items-center justify-center z-10">
                <svg class="fill-current w-6 h-6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
            </div>
            <div class="p-6">
                <order-select-shirt-modal @added="onSelecteShirtColour" :products="products"></order-select-shirt-modal>
            </div>
        </modal>


        <modal adaptive width="600" height="auto" scrollable name="shirt-printing" class="relative">
            <div @click="$modal.hide('shirt-printing')" class="close absolute right-0 top-0 p-1 cursor-pointer text-red-500 flex items-center justify-center z-10">
                <svg class="fill-current w-6 h-6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
            </div>
            <div class="p-6">
                <order-shirt-printing :print="shirt.value.printing" @added="hideModal"></order-shirt-printing>
            </div>
        </modal>
    </div>
</template>

<script>
    import PrettyRadio from 'pretty-checkbox-vue/radio';
    import Multiselect from 'vue-multiselect'

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, email, oneOf } from 'vee-validate/dist/rules';

    // components
    import OrderShirtSelectedPrinting from './shirt/ShirtSelectedPrinting'
    import OrderSelectShirtModal from './shirt/SelectShirt'
    import OrderShirtPrinting from './shirt/ShirtPrinting'
    import OrderImagesSlider from './ImagesSlider'
    import ShirtSizeInput from './shirt/ShirtSizeInput'

    import gql from 'graphql-tag'
    import productsbysubcategory from "../../../../gql/frontend/queries/productsbysubcategory.gql";
    import sizesbycategory from "../../../../gql/frontend/queries/sizesbycategory.gql";
    import finishingbyproduct from "../../../../gql/frontend/queries/finishingsbyproduct.gql";
    import shirtPrintings from "../../../../gql/frontend/queries/printing.gql";
    // import product from "../../../../gql/frontend/queries/product.gql";


   import _ from 'lodash'

    // Add the required rule
    extend('required', {
        ...required,
        message: 'This field is required'
    });

    // Add the email rule
    extend('email', {
    ...email,
    message: 'This field must be a valid email'
    });

    // Add the email rule
    extend('oneOf', {
    ...oneOf,
    message: 'You must select one option'
    });


    export default {
        props: [
            'ordertype',
            'menu',
            'user',
            'subcategory',
            'productsbycategory'
            ],
        components: {
            Multiselect,
            PrettyRadio,
            ShirtSizeInput,
            ValidationProvider,
            ValidationObserver,
            OrderImagesSlider,
            OrderSelectShirtModal,
            OrderShirtPrinting,
            OrderShirtSelectedPrinting
        },
        data() {
            return {
                shirt: {
                    value: {
                        printing: null,
                        sizes: {},
                        buyType: 'printed',
                    },
                    data: {
                        color: ["red", "green", "yellow", "blue", "black"],
                        sizes: {
                            small: 40,
                            medium : 50,
                            large : 150,
                            extraLarge : 149,
                            doubleExtraLarge : 100,
                        },
                        printing: ["flock", "metalic foal", "color printing"],

                    },
                },
                isPaperOrder: false,
                selectedVariantsTotalPrice: 0,
                selectedVariants: [],
                price: {
                    product: 0,
                    extra: 0,
                    printing: 0,
                    vat: 0,
                    total: 0
                },
                days: {
                    printing: 0,
                    product: 0,
                    total: 0,
                },
                isShirtSizesError: true,
                radio: null,
                value: null,
                options: ['one', 'two', 'three'],
                summed: 0
            }
        },
        watch: {
            price: {
                handler(val){
                    this.sumPrices(this.printingPrice, val)
                }, deep: true
            },
            printingPrice: {
                handler(val){
                    this.sumPrices(val, this.price)
                }, deep: true
            },
            selectedVariants: {
                handler(val){
                    // console.log(val.length)
                    if(!_.isEmpty(val)) {
                        this.isShirtSizesError = false

                        this.summed = 0
                        val.forEach(element => {
                            this.summed += parseInt(element.quantity)
                        });

                        if (this.summed === 0) {
                            this.isShirtSizesError = true
                            this.$store.commit('clearSelectedShirtPrinting')
                        }else{
                            this.isShirtSizesError = false
                        }

                    }else{
                        this.isShirtSizesError = true
                    }

                    this.price.extra = _.sum(this.selectedVariants.map(sv => sv.total))

                }, deep: true
            },
        },
        computed: {
            printingDays () {
                return this.$store.state.printingDays
            },
            printingPrice () {
                return this.$store.state.printingPrice
            },
            firstPrice () {
                if (this.isProduct) {
                    if (this.product.variants.length != 0) {
                        this.price.product = this.product.variants[0].price
                    }
                }
            },
            isProduct () {
                return this.$store.state.isProduct
                this.days.product = this.product.delivery_time
            },

            product () {
                if(this.isProduct) {
                    return this.$store.state.product
                }
            },
            selectedShirt () {
                if(!this.$apollo.queries.products.loading) {
                    if (this.products.length != 0) {
                        this.$store.dispatch("getProduct", this.products[0].id)
                        return this.products[0]
                    }
                }
            },
            notSelectedShirtPrinting () {
                if(!this.$apollo.queries.printings.loading) {
                    const selected = this.$store.state.selectedShirtPrinting.map(p => p.print)
                    const printing = this.printings
                    return _.difference(printing,selected);
                }
            },

        },
        methods: {
            sumPrices (printing, product) {
                let vat = (5 / 100) * (product.product + product.extra);

                this.price.printing = parseInt(printing.front) + parseInt(printing.back) + parseInt(printing.sleeves)

                this.price.total = (product.product + product.extra) + this.price.printing + vat

                this.price.vat = vat

                // Days
                this.sumDays(this.$store.state.printingDays)

            },
            sumDays (printing) {
                if(this.summed != 0) {
                    this.days.product = parseInt(this.product.delivery_time)
                    this.days.extra = parseInt(printing.front) + parseInt(printing.back) + parseInt(printing.sleeves)
                    this.days.total = this.days.product + this.days.extra
                }else{
                    this.days.product = 0
                    this.days.extra = 0
                    this.days.total = 0
                }
            },
            onUpdateSize (data) {

                const index = this.selectedVariants.findIndex((e) => e.id === data.variant.id);
                if (index === -1) {
                    this.selectedVariants.push(data.variant);
                } else {
                    this.selectedVariants[index].quantity = data.variant.quantity;
                    this.selectedVariants[index].total = data.variant.total
                }

            },
            checkShirtSizes (variant) {

                if(!_.isEmpty(this.shirt.value.sizes)) {

                let sizes = this.shirt.value.sizes
                let arraySizes = []
                for (let key in sizes) {
                    if(sizes[key] != 0) {
                        let tempSize = {
                            title: key,
                            quantity: sizes[key],
                        }
                        arraySizes.push(tempSize);

                        _.uniqBy(arraySizes, function (e) {
                            return e.title;
                        });
                    }
                };

                arraySizes.map(a => {

                    let totalAmount = parseInt(variant.price) * parseInt(a.quantity);

                    let tempVariant = {
                        id: variant.id,
                        title: variant.title,
                        sort_title: variant.short_title,
                        stock: variant.stock,
                        price: variant.price,
                        quantity: a.quantity,
                        total: totalAmount,
                    }

                    this.selectedVariants.splice(this.selectedVariants.findIndex(function(i){
                        return i.id === variant.id;
                    }), 1);
                    this.selectedVariants.push(tempVariant)
                 })

                }

            },
            showShirtPrintingModal () {
                this.$nextTick(() => {
                    this.$modal.show('shirt-printing');
                })
            },
            showSelectShirtModal () {
                this.$nextTick(() => {
                    this.$modal.show('select-shirt-modal');
                })
            },
            hideModal () {
                this.$modal.hide('shirt-printing');
                this.shirt.value.color = null
                this.shirt.value.printing = null
            },

            onSelecteShirtColour () {
                this.$modal.hide('select-shirt-modal');
                this.shirt.value.color = null
                this.shirt.value.printing = null
                this.refreshEveryThing()
            },

            refreshEveryThing () {
                this.selectedVariants = []
                this.summed = 0
                this.$store.commit('clearSelectedShirtPrinting')

                this.price.product = 0
                this.price.extra = 0
                this.price.printing = 0
                this.price.total = 0
                this.price.vat = 0

                this.days.printing = 0
                this.days.product = 0
                this.days.total = 0
            },

            submitForm: function () {

                let title = this.subcategory.category.title + " " + this.subcategory.title + " " + this.product.title;
                let shirt_color = "Color Name: " + this.product.color.title + " HEX: " + this.product.color.hex;
                let shirt_sizes = JSON.stringify(this.selectedVariants.filter(v => v.quantity != 0))

                let printings = JSON.stringify(this.$store.state.selectedShirtPrinting)

                axios.post(`/profile/orders`, {
                    title: title,
                    product_id: this.product.id,
                    shirt_color: shirt_color,
                    shirt_sizes: shirt_sizes,
                    shirt_printings: printings,
                    turnaround: this.days.total,
                    price_printing: this.price.printing,
                    price_extra: this.price.extra,
                    price_vat: this.price.vat,
                    price_total: this.price.total,
                    status: "cart",
                    product_type: "shirt",
                })
                .then(response => {
                    if(response.data.status) {
                        this.$swal({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            icon: 'success',
                            title: 'Shirt',
                            text: 'Added to cart!',
                        });
                        if (this.user) {
                            window.location.href = `/profile/orders/${response.data.orderid}/upload-your-design`
                        }else{
                            window.location.href = `/login`
                        }
                    }
                })

            }
        },
        apollo: {
            products() {
                return {
                    query: productsbysubcategory,
                    variables: {
                        subcatg_id: this.subcategory.id
                    },
                    update(data) {
                        return data.productsbysubcategory
                    },
                };
            },
            printings() {
                return {
                    query: shirtPrintings,
                    variables: {
                        product_id: this.pid
                    },
                    update(data) {
                        return data.printing
                    },
                };
            },
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style lang="scss" scoped>

</style>
