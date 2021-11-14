<template>
    <div>
        <pre> {{pricingtype}} </pre>
        <pre> sizeMaxError = {{sizeMaxError}} </pre>
        <pre> sizeMinError = {{sizeMinError}} </pre>
        <pre> minMaxError = {{minMaxError}} </pre>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10 mt-10">
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="passes(submitForm)">
                <div class="filter">

                    <div class="lg:flex items-center mb-5 input-wrapper" v-if="pricingtype == 'custom size'">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.06 31.06"><path d="M20.87 19.87a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#00a1e9"/><path d="M11.43 29.31a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#e4007f"/><path d="M11.19 10.19a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#ffe200"/><path d="M1.75 19.64a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#9fa0a0"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Mateial</span>
                        </div>
                        <div class="w-full">
                            <ValidationProvider name="paper.value.color" rules="required">
                                <div slot-scope="{ errors }">
                                    <multiselect class="customulti" @input="onGiftMaterialChange" v-model="wallpaper.material" :options="variants">
                                        <template slot="singleLabel" slot-scope="props">
                                            <span class="option__desc">
                                                <span class="option__title" v-if="props.option">{{props.option.title}}</span>
                                            </span>
                                        </template>

                                        <template slot="option" slot-scope="props">
                                            <div class="option__desc">
                                                <span class="option__title" v-if="props.option">
                                                    {{props.option.title}}
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

                    <div class="lg:flex items-center mb-5 input-wrapper" v-if="pricingtype == 'packages'">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-6 h-6" viewBox="0 0 491.3 491.3" xml:space="preserve"><path d="M482 113 249 26h-8L7 114c-4 1-9 8-6 14v247c0 4 3 8 7 9l231 80 5 2 6-1 234-81c5-1 7-5 7-9V123c0-5-5-8-9-10zm-31 10-205 77-62-23 195-80 72 26zM351 86l-205 85-5 49-38-16v-45l213-86 35 13zM245 46l42 16-197 80-50-19 205-77zM22 139l60 22v57l77 31 5-57 72 27v222L22 367V139zm449 228-215 74V218l215-80v229z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Mateial</span>
                        </div>
                        <div class="w-full">
                            <ValidationProvider name="paper.value.color" rules="required">
                                <div slot-scope="{ errors }">
                                    <multiselect class="customulti" @input="onGiftMaterialChange" v-model="wallpaper.material" :options="variants">
                                        <template slot="singleLabel" slot-scope="props">
                                            <span class="option__desc">
                                                <span class="option__title" v-if="props.option">{{props.option.title}}</span>
                                            </span>
                                        </template>

                                        <template slot="option" slot-scope="props">
                                            <div class="option__desc">
                                                <span class="option__title" v-if="props.option">
                                                    {{props.option.title}}
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

                    <div class="lg:flex items-center mb-5 input-wrapper"  v-if="pricingtype == 'custom size'">
                        <div class="w-full lg:w-64 mb-2 flex items-end">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M3 16l-3-3v7h7l-3-3 5-4-2-2-4 5zM17 4l3 3V0h-7l3 3-5 4 2 2 4-5zm-1 13l-3 3h7v-7l-3 3-4-5-2 2 5 4zM4 3l3-3H0v7l3-3 4 5 2-2-5-4z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Size</span>
                        </div>
                        <div class="w-full" >
                            <div class="grid grid-cols-2 gap-3 mt-3">
                                <div>
                                    <ValidationProvider name="wallpaper.customsize.width" rules="required">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-on:input="checkCustomMinMax" v-model="wallpaper.customsize.width" class="border w-full p-2 focus:outline-none" placeholder="Width (cm)">
                                            <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div>
                                    <ValidationProvider name="wallpaper.customsize.height" rules="required">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-on:input="checkCustomMinMax" v-model="wallpaper.customsize.height" class="border w-full p-2 focus:outline-none" placeholder="Height (cm)">
                                            <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                            </div>
                                <p v-if="sizeMinError != null" class="text-blue-600 mt-1 px-1 text-sm font-medium">{{ sizeMinError }}</p>
                                <p v-if="sizeMaxError != null" class="text-blue-600 mt-1 px-1 text-sm font-medium">{{ sizeMaxError }}</p>
                        </div>
                    </div>
                    <!-- input wrapper -->


                    <div class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-6 h-6" viewBox="0 0 496 496" xml:space="preserve"><path d="M96 384h64c9 0 16-7 16-16v-32H80v32c0 9 7 16 16 16zm0-32h64v16H96v-16zM208 272h16v16h-16zM144 272h48v16h-48z"/><path d="m359 240 1-8V80h16V0H120v80h16v152l1 8H0v80h16v152c0 13 11 24 24 24h176c13 0 24-11 24-24V320h16v152c0 13 11 24 24 24h176c13 0 24-11 24-24V320h16v-80H359zM136 64V16h224v48H136zm88 408c0 4-4 8-8 8H40c-4 0-8-4-8-8V320h192v152zm16-168H16v-48h224v48zm0-64h-80c-4 0-8-4-8-8V80h192v152c0 4-4 8-8 8h-96zm224 232c0 4-4 8-8 8H280c-4 0-8-4-8-8V320h192v152zm16-168H256v-48h224v48z"/><path d="M336 384h64c9 0 16-7 16-16v-32h-96v32c0 9 7 16 16 16zm0-32h64v16h-64v-16zM448 272h16v16h-16zM384 272h48v16h-48zM296 128V96h-96v32c0 9 7 16 16 16h64c9 0 16-7 16-16zm-80-16h64v16h-64v-16zM328 32h16v16h-16zM264 32h48v16h-48z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Quantity</span>
                        </div>
                        <div class="w-full flex items-center" v-if="variant != null">
                            <input type="number" v-on:keyup="checkMinMax" v-model="wallpaper.quantity" class="border w-16 mt-2 p-1 outline-none focus:outline-none text-center text-lg" :max="variant.stock" min="1">
                        </div>
                    </div>
                    <p class="text-theme-red-light text-center -mt-2 mb-4 text-sm font-medium" v-if="minMaxError"> Min: 5 & Max: {{variant.stock}} </p>

                    <!-- input wrapper -->


                    <div class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-6 h-6" viewBox="0 0 512.8 512.8" xml:space="preserve"><path d="M96 107A53 53 0 1 0 96 0a53 53 0 0 0 0 107zm0-85a32 32 0 1 1 0 64 32 32 0 0 1 0-64zM183 332c7-7 10-17 9-28l-14-124c-4-29-27-52-55-52H69c-28 0-51 23-55 52L0 304c-1 11 2 21 9 28 6 7 14 11 22 11l12 160c0 5 5 9 10 9h86c5 0 10-4 10-9l12-160c8 0 16-4 22-11zm-16-14c-1 2-4 4-8 4h-8c-5 0-10 4-10 10l-12 159H63L51 332c0-6-5-10-10-10h-8c-4 0-7-2-8-4-3-3-4-7-4-11l15-124c2-19 16-33 33-33h54c17 0 31 14 33 33l15 124c0 4-1 8-4 11zM277 342c-18 0-36-6-51-18a11 11 0 0 0-13 17c19 14 41 22 64 22a107 107 0 1 0-74-183 11 11 0 1 0 15 15 85 85 0 1 1 59 147z"/><path d="M511 224c-2-13-9-24-20-30-10-7-23-8-34-3-9 3-20-2-24-11-5-12-11-23-18-33-7-9-6-21 2-27 10-8 15-20 15-32-1-13-6-25-16-32-17-13-34-24-53-32-12-5-25-4-35 2-11 6-19 17-21 29-2 10-11 17-21 16h-37c-10 1-19-6-21-16a40 40 0 0 0-53-32 11 11 0 1 0 7 21 19 19 0 0 1 25 14c3 22 22 37 45 34h31c22 3 42-12 45-34 1-5 5-11 10-13 5-3 11-3 16-1 17 7 34 17 49 28a20 20 0 0 1 1 32 41 41 0 0 0-7 55c6 9 12 19 16 29 9 20 31 30 51 23 6-2 11-2 16 1s9 9 10 15a227 227 0 0 1 0 57c-1 7-5 12-10 15s-10 4-16 2c-20-8-42 2-51 22-4 10-10 20-16 29a41 41 0 0 0 7 56c4 4 7 9 6 15 0 6-3 12-7 16-15 11-32 21-49 28a19 19 0 0 1-26-14c-3-21-23-36-45-34h-31c-23-2-42 12-45 34-1 5-4 9-8 12s-9 5-14 4a11 11 0 1 0-4 21h7a40 40 0 0 0 40-34c2-10 11-17 21-16 12 2 25 2 37 0 10-1 19 6 21 16a40 40 0 0 0 56 31c19-8 36-19 53-31a41 41 0 0 0 1-65c-8-6-9-18-2-27 7-10 13-21 18-32 4-10 15-15 24-11 11 4 24 3 34-3 11-7 18-18 20-31a250 250 0 0 0 0-63z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Installation</span>
                        </div>

                        <div class="w-full flex items-center my-5 lg:my-0">

                            <div>
                                <ValidationProvider rules="oneOf:yes,no" class="w-full flex" name="wallpaper.installation" v-slot="{ errors }">
                                <label class="flex items-center cursor-pointer">
                                    <pretty-radio p-bigger color="warning" value="yes" v-model="wallpaper.installation"></pretty-radio>
                                    <span class="inline-block">Yes</span>
                                </label>
                                <label class="flex items-center cursor-pointer ml-6">
                                    <pretty-radio p-bigger color="warning" value="no" v-model="wallpaper.installation"></pretty-radio>
                                    <span class="inline-block">No</span>
                                </label>
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </ValidationProvider>

                                <div v-if="wallpaper.installation == 'yes'" class="mt-4">
                                    <ValidationProvider class="w-full flex" name="states" v-slot="{ errors }">
                                    <label v-for="(state, i) in states" :key="i" class="flex items-center cursor-pointer mr-5">
                                        <pretty-radio p-bigger color="warning" name="state" :value="state" v-model="wallpaper.state"></pretty-radio>
                                        <span class="inline-block">{{state.name}}</span>
                                    </label>
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                    </ValidationProvider>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- input wrapper -->

                    <!-- input wrapper -->
                    <div class="flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490 490" xml:space="preserve"><path d="m490 287-70-116h-73v134h84v-20h-64v-93h42l61 100v84h-25a52 52 0 0 0-102 0h-18V171h-30v-60h-93A106 106 0 1 0 71 258v139h45a52 52 0 0 0 102 0h125a52 52 0 0 0 102 0h45V287zM20 158a86 86 0 1 1 172 0 86 86 0 0 1-172 0zm147 260a32 32 0 1 1 0-64 32 32 0 0 1 0 64zm137-42h-86a52 52 0 0 0-102 0H92V263a107 107 0 0 0 117-131h65v60h30v184zm90 42a32 32 0 1 1 0-64 32 32 0 0 1 0 64z"/><path d="M145 148h-28V88H96v80h49z"/></svg>

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
                                    <tr v-if="wallpaper.installation == 'yes'">
                                        <th class="border border-gray-200 px-3 text-sm py-2">Installation Price</th>
                                        <td class="border border-gray-200 px-3 text-sm py-2">{{price.installation}}</td>
                                    </tr>
                                    <tr v-if="variant != null">
                                        <th class="border border-gray-200 px-3 text-sm py-2">Quantity</th>
                                        <td class="border border-gray-200 px-3 text-sm py-2">
                                            {{wallpaper.quantity}}
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

                 <div ref="ruleOf120" class="rule-of-120 mt-10" v-if="ruleof120">
                        <div class="flex border rounded">
                            <div class="w-1/3 p-5 bg-gray-200 bg-opacity-50 filter blur-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-16 h-16" viewBox="0 0 488 488" xml:space="preserve"><path d="M133 354a31 31 0 0 0-42 1c-6 6-9 14-9 22s3 15 9 20c5 6 12 9 20 9h1c8 0 15-3 21-9 12-11 12-30 1-42l-1-1zm-14 29c-2 2-5 3-7 3s-5 0-7-3c-3-2-3-5-3-7s1-5 3-7 4-3 7-3c2 0 5 1 7 3 4 4 4 11 0 14z"/><path d="M485 114 374 3c-4-4-10-4-14 0L3 360c-4 4-4 10 0 14l111 111c2 2 5 3 7 3l7-3 357-357c4-4 4-10 0-14zm-53 39-49-48a10 10 0 1 0-14 14l49 48-22 22-23-23a10 10 0 1 0-14 14l23 23-21 21-49-48a10 10 0 1 0-14 14l49 49-22 21-23-23a10 10 0 1 0-14 14l23 23-22 22-48-49a10 10 0 1 0-14 14l48 49-21 21-23-23a10 10 0 1 0-14 14l23 23-21 21-44-43a10 10 0 1 0-14 14l44 44-83 83-97-98L367 24l97 97-32 32z"/></svg>
                            </div>
                            <div class="w-full p-5 space-y-3">
                                <div class="font-semibold">The Rule of 120</div>
                                <div class="text-base">Either Height Or Width should be Maximum 120 CM Exp:(if width > 120 cm the height MUST be maximum 120 and minimum 100 CM )</div>
                            </div>
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
                            v-if="(pricingtype == 'custom size' && !minMaxError && !sizeMinError && !sizeMaxError) || pricingtype == 'packages' ||     pricingtype == 'fixed price'"
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
                                ]"
                                class="inline-block mr-2 capitalize">
                                    proceed to checkout
                                </span>
                            </button>
                        </div>
                    </div>
                    <!-- input wrapper -->

                    <div v-else class="flex items-center mt-12 input-wrapper capitalize">
                        <a href="/login" class="text-base p-5 w-3/4 mx-auto border-2 border-primary-500 rounded font-medium flex items-center justify-center text-white text-primary-500 hover:bg-primary-500 hover:text-white transition ease-in-out duration-300">
                            Sign in before proceeding to checkout
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
            'ruleof120',
            'category',
            'user',
            'images',
            'orderType',
            'menu',
            'pricingtype',
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
                wallpaper: {
                    material: null,
                    quantity: 1,
                    installation: 'yes',
                    state: null,
                    customsize: {
                        widht: null,
                        height: null
                    },
                },
                states: [
                    {
                        id: 1,
                        name: 'Dubai, Sharjah, Ajman',
                        price: 250
                    },
                    {
                        id: 2,
                        name: 'Other States',
                        price: 350
                    },
                ],
                price: {
                    product: 0,
                    extra: 0,
                    vat: 0,
                    installation: 0,
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
                sizeMinError: null,
                sizeMaxError: null,
            }
        },
        watch: {
            wallpaper: {
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
            this.wallpaper.state = this.wallpaper.installation == 'yes' ? this.states[0] : null

            if(this.variants.length != 0) {
                this.variant = this.variants[0]
                this.wallpaper.material = this.variants[0]
            }
            this.$store.dispatch("getProduct", this.pid)
            this.price.product = this.variant.price
            this.sumPrice()
        },
        methods: {
            sumPrice() {

                let width = parseInt(this.wallpaper.customsize.width) / 100;
                let height = parseInt(this.wallpaper.customsize.height) / 100;
                let pricingType = this.pricingtype

                switch(pricingType) {
                    case 'fixed price':
                        let price =  this.variant.price;
                        let quantity = price * this.wallpaper.quantity
                        let vat = (5 / 100) * quantity;
                        const installation1 = this.price.installation = this.wallpaper.state.price

                        this.price.total = quantity + vat + installation1
                        this.price.vat = vat
                        break;

                    case 'custom size':
                        if((!this.sizeMinError && !this.sizeMinError) && (width && height)) {

                            let price = (width * height) * this.variant.price;

                            let quantity = price * this.wallpaper.quantity
                            let vat = (5 / 100) * quantity;
                            const installation2 = this.price.installation = this.wallpaper.state.price

                            this.price.total = quantity + vat + installation2
                            this.price.vat = vat

                        }else{
                            this.price.total = 0
                            this.price.vat = 0
                        }
                        break;

                    case 'packages':

                        this.price.product = this.variant.price
                        let quantityi = this.variant.price * this.wallpaper.quantity
                        let vata = (5 / 100) * quantityi;
                        const installation3 = this.price.installation = this.wallpaper.state.price

                        this.price.total = quantityi + vata + installation3
                        this.price.vat = vata

                        break;
                }


            },
            onGiftMaterialChange (val) {
                this.variant = val
                this.checkCustomMinMax()
            },
            checkCustomMinMax () {
                this.checkRuleOf120()
                if (
                    parseInt(this.wallpaper.customsize.width) >= parseInt(this.wallpaper.material.material.min) ||
                    parseInt(this.wallpaper.customsize.height) >= parseInt(this.wallpaper.material.material.min)
                    ) {
                    this.sizeMinError = null
                }else{
                    this.sizeMinError = `Sorry Minimum Order For ${this.wallpaper.material.material.title} is ${this.wallpaper.material.material.min} CM`
                }
            },
            checkMinMax () {
                if (this.wallpaper.quantity < 1 || this.wallpaper.quantity > this.variant.stock) {
                    this.minMaxError = true
                }else{
                    this.minMaxError = false
                }
            },
            checkRuleOf120 () {
                let width = parseInt(this.wallpaper.customsize.width);
                let height = parseInt(this.wallpaper.customsize.height);

                if((!this.sizeMinError && !this.sizeMinError) && this.ruleof120 && (width && height)) {
                    let ruleOf120 = this.$refs.ruleOf120

                    ruleOf120.classList.remove("rule-of-120-animated");
                    ruleOf120.classList.add("rule-of-120-animated");

                    setTimeout(function () {
                        ruleOf120.classList.remove("rule-of-120-animated");
                     }.bind(this), 5000)
                }


            },
            submitForm: function () {
                let title = this.product.title + " " + this.variant.title;
                let color = "Color: " + this.wallpaper.color.color.title+ ", HEX " + this.wallpaper.color.color.hex;

                axios.post(`/profile/orders`, {
                    title: title,
                    product_id: this.product.id,
                    gift_color: color,
                    gift_quantity: this.wallpaper.quantity,
                    price_product: this.price.product,
                    price_vat: this.price.vat,
                    price_total: this.price.total,
                    is_design: this.wallpaper.buyType,
                    turnaround: this.variant.delivery_time,
                    status: "cart",
                    product_type: "wallpaper",
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
