<template>
    <div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10 mt-10">
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="passes(submitForm)">
                <div class="filter">

                    <div class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.06 31.06"><path d="M20.87 19.87a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#00a1e9"/><path d="M11.43 29.31a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#e4007f"/><path d="M11.19 10.19a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#ffe200"/><path d="M1.75 19.64a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#9fa0a0"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Body Colour</span>
                        </div>
                        <div class="w-full" >
                            <ValidationProvider name="paper.value.color" rules="required">
                                <div slot-scope="{ errors }">
                                    <multiselect class="customulti" @input="onGiftColorChange" v-model="gift.color" :options="variants">
                                        <template slot="singleLabel" slot-scope="props">
                                            <span class="option__desc">
                                                <span class="option__title" v-if="props.option.color">{{props.option.color.title}}</span>
                                            </span>
                                        </template>

                                        <template slot="option" slot-scope="props">
                                            <div class="option__desc">
                                                <span class="option__title" v-if="props.option.color">
                                                    {{props.option.color.title}}
                                                </span>
                                            </div>
                                        </template>
                                    </multiselect>
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>

                        </div>
                    </div>
                    <!-- input wrapper -->

                    <div class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2 2l2-2h12a2 2 0 012 2v16a2 2 0 01-2 2H4a2 2 0 01-2-2V2zm3 1v2h10V3H5zm0 4v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9zm4 0v6h2v-6h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">With Print?</span>
                        </div>
                        <div class="w-full flex items-center my-5 lg:my-0">
                        <ValidationProvider rules="oneOf:printed,blank" class="w-full flex" name="shirt.value.buyType" v-slot="{ errors }">
                            <label class="flex items-center cursor-pointer">
                                <pretty-radio p-bigger color="warning" value="printed" v-model="gift.buyType"></pretty-radio>
                                <span class="inline-block">Yes</span>
                            </label>
                            <label class="flex items-center cursor-pointer ml-6">
                                <pretty-radio p-bigger color="warning" value="blank" v-model="gift.buyType"></pretty-radio>
                                <span class="inline-block">No</span>
                            </label>
                            <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </ValidationProvider>
                        </div>
                    </div>
                    <!-- input wrapper -->

                    <div class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2 2l2-2h12a2 2 0 012 2v16a2 2 0 01-2 2H4a2 2 0 01-2-2V2zm3 1v2h10V3H5zm0 4v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9zm4 0v6h2v-6h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Quantity</span>
                        </div>
                        <div class="w-full flex items-center" v-if="variant != null">
                            <input type="number" v-on:keyup="checkMinMax" v-model="gift.quantity" class="border w-16 mt-2 p-1 outline-none focus:outline-none text-center text-lg" :max="variant.stock" min="5">
                            <div class="ml-4 mt-1">{{ variant.stock }} in stock</div>
                        </div>
                    </div>
                    <p class="text-theme-red-light text-center -mt-2 mb-4 text-sm font-medium" v-if="minMaxError"> Min: 5 & Max: {{variant.stock}} </p>

                    <!-- input wrapper -->


                    <!-- input wrapper -->
                    <div class="flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6"  viewBox="0 0 512 512"><path d="M414 304a59 59 0 100 118 59 59 0 000-118zm0 84a26 26 0 110-51 26 26 0 010 51zM329 91H17C7 91 0 98 0 107v254c0 10 7 17 17 17h51v-33H33V124h280v237h33V107c0-9-8-16-17-16z"/><path d="M149 345h223v33H149z"/><path d="M108 304a59 59 0 101 118 59 59 0 00-1-118zm0 84a26 26 0 111-51 26 26 0 01-1 51zM495 228H329v33h150v84h-24v33h40c10 0 17-7 17-17V244c0-9-7-16-17-16z"/><path d="M446 159c-3-5-9-8-15-8H329v33h92l38 68 29-16-42-77z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Turnaround </span>
                        </div>
                        <div class="w-full" v-if="isProduct">
                            <div class="p-2 w-full border focus:outline-none font-medium bg-white capitalize"> {{product.delivery_time}} business days </div>
                        </div>
                    </div>
                    <!-- input wrapper -->

                    <div class="flex items-center mb-5 input-wrapper" v-if="!minMaxError">
                        <div class="w-full lg:w-64 mb-2 flex">
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Price </span>
                        </div>
                        <div class="w-full">
                            <table class="table-fixed w-full text-left rounded-lg overflow-scroll">
                                <tbody>
                                    <tr>
                                        <th class="border border-gray-200 px-3 text-sm py-2">Product Price</th>
                                        <td class="border border-gray-200 px-3 text-sm py-2">{{price.product}}</td>
                                    </tr>
                                    <tr v-if="variant != null">
                                        <th class="border border-gray-200 px-3 text-sm py-2">Quantity</th>
                                        <td class="border border-gray-200 px-3 text-sm py-2">
                                            {{gift.quantity}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-200 px-3 text-sm py-2">Incl. VAT (5%)</th>
                                        <td class="border border-gray-200 px-3 text-sm py-2">{{price.vat.toFixed(2)}}</td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-200 px-3 text-sm py-2">Total</th>
                                        <td class="border border-gray-200 px-3 font-semibold text-base text-red-500 py-2">{{price.total.toFixed(2)}}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>



                    <div
                    v-if="user"
                    class="flex items-center mt-12 input-wrapper">
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
                            v-if="!minMaxError"
                            type="submit"
                            :disabled="invalid"
                            :class="[
                                invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed' : 'bg-primary-500 text-white',
                                minMaxError ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed' : 'bg-primary-500 text-white'
                            ] "
                            class="border p-5 w-3/4 mx-auto rounded font-medium text-2xl flex items-center justify-center">
                                <span
                                :class="[
                                    invalid ? 'text-gray-700' : 'text-gray-100',
                                    minMaxError ? 'text-gray-700' : 'text-gray-100',
                                ] "
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
                    <!-- input wrapper -->

                    <div v-else class="flex items-center mt-12 input-wrapper">
                        <a href="/login" class="text-base p-5 w-3/4 mx-auto border-2 border-primary-500 rounded font-medium flex items-center justify-center text-white text-primary-500 hover:bg-primary-500 hover:text-white transition ease-in-out duration-300">
                            Sign in before uploading your design
                        </a>
                    </div>

                </div>
            </form>
            </ValidationObserver>

            <div>
                <order-images-slider :images="images"></order-images-slider>
            </div>
        </div>


    </div>
</template>

<script>
    import PrettyRadio from 'pretty-checkbox-vue/radio';
    import Multiselect from 'vue-multiselect'

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, email, oneOf } from 'vee-validate/dist/rules';

    import OrderImagesSlider from './ImagesSlider'

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
            'variants',
            'category',
            'user',
            'images',
            'ordertype',
            'menu',
            'slug',
            'pid',
            'ptitle',
            ],
        components: {
            Multiselect,
            PrettyRadio,
            ValidationProvider,
            ValidationObserver,
            OrderImagesSlider,
        },
        data() {
            return {
                gift: {
                    color: null,
                    quantity: 5,
                    buyType: 'printed',
                },
                price: {
                    product: 0,
                    extra: 0,
                    vat: 0,
                    total: 0
                },
                days: {
                    finishing: 0,
                    product: 0,
                    total: 0,
                },
                variant: null,
                isShirtSizesError: false,
                radio: null,
                value: null,
                options: ['one', 'two', 'three'],
                minMaxError: false,
            }
        },
        watch: {
            gift: {
                handler(val){
                    this.sumPrice(val)
                }, deep: true
            },
        },
        computed: {
            isProduct () {
                return this.$store.state.isProduct
            },
            product () {
                if(this.isProduct) {
                    return this.$store.state.product
                }
            },
        },
        mounted() {
            console.log()
            if(this.variants.length != 0) {
                this.variant = this.variants[0]
                this.gift.color = this.variants[0]
            }
            this.$store.dispatch("getProduct", this.pid)
            this.price.product = this.variant.price
            this.sumPrice()
        },
        methods: {
            sumPrice() {
                let quantity = this.variant.price * this.gift.quantity
                let vat = (5 / 100) * (this.price.product + quantity);
                this.price.total = (this.price.product + quantity) + vat
                this.price.vat = vat
            },
            onGiftColorChange (val) {
                this.variant = val
            },
            checkMinMax (val) {
                if (this.gift.quantity < 5 || this.gift.quantity > this.variant.stock) {
                    this.minMaxError = true
                }else{
                    this.minMaxError = false
                }
            },
            submitForm: function () {
                let title = this.product.title + " " + this.variant.title;
                let color = "Color: " + this.gift.color.color.title+ ", HEX " + this.gift.color.color.hex;

                axios.post(`/profile/orders`, {
                    title: title,
                    product_id: this.product.id,
                    gift_color: color,
                    gift_quantity: this.gift.quantity,
                    price_product: this.price.product,
                    price_vat: this.price.vat,
                    price_total: this.price.total,
                    is_design: this.gift.buyType,
                    turnaround: this.variant.delivery_time,
                    status: "cart",
                    product_type: "gift",
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
                            title: 'Gift',
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
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style lang="scss" scoped>

</style>
