<template>
    <div>
        <pre>
            <!-- {{selectedPaperFinishing}} -->
        </pre>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10 mt-10">
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="passes(submitForm)">
                <div class="filter">
                    <div v-if="ordertype == 'paper' "  class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 18h12V6h-4V2H4v16zm-2 1V0h12l4 4v16H2v-1z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Paper</span>
                        </div>
                        <div class="w-full" v-if="isProduct">
                            <ValidationProvider name="paper.value.paper" rules="required">
                                <div slot-scope="{ errors }">
                                    <multiselect class="customulti" @input="onPaperChange" v-model="paper.value.paper" :options="product.packages">

                                        <template slot="singleLabel" slot-scope="props">
                                            <span class="option__desc">
                                                <span class="option__title" v-if="props.option.paper">{{props.option.paper.title}}</span>
                                            </span>
                                        </template>

                                        <template slot="option" slot-scope="props">
                                            <div class="option__desc">
                                                <span class="option__title" v-if="props.option.paper">{{props.option.paper.title}}</span>
                                            </div>
                                        </template>

                                    </multiselect>
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </div>
                    </div>
                    <!-- input wrapper -->

                    <div v-if="ordertype == 'paper'" class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.06 31.06"><path d="M20.87 19.87a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#00a1e9"/><path d="M11.43 29.31a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#e4007f"/><path d="M11.19 10.19a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#ffe200"/><path d="M1.75 19.64a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#9fa0a0"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Colour</span>
                        </div>
                        <div class="w-full" v-if="isProduct">
                            <ValidationProvider name="paper.value.color" rules="required">
                                <div slot-scope="{ errors }">
                                    <multiselect class="customulti" @input="onPaperColourChange" v-model="paper.value.color" :options="product.packages">
                                        <template slot="singleLabel" slot-scope="props">
                                            <span class="option__desc">
                                                <span class="option__title" v-if="props.option.paper">{{props.option.paper.side}}</span>
                                            </span>
                                        </template>

                                        <template slot="option" slot-scope="props">
                                            <div class="option__desc">
                                                <span class="option__title" v-if="props.option.paper">{{props.option.paper.side}}</span>
                                            </div>
                                        </template>
                                    </multiselect>
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>

                        </div>
                    </div>
                    <!-- input wrapper -->


                    <div v-if="ordertype == 'paper' " class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M3 16l-3-3v7h7l-3-3 5-4-2-2-4 5zM17 4l3 3V0h-7l3 3-5 4 2 2 4-5zm-1 13l-3 3h7v-7l-3 3-4-5-2 2 5 4zM4 3l3-3H0v7l3-3 4 5 2-2-5-4z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Size</span>
                        </div>
                        <div class="w-full" v-if="isProduct">
                            <ValidationProvider name="paper.value.size" rules="required">
                                <div slot-scope="{ errors }">
                                    <multiselect class="customulti" v-model="paper.value.size" :options="productSizes">

                                        <template slot="singleLabel" slot-scope="props">
                                            <span class="option__desc">
                                                <span class="option__title">{{props.option.region}}</span>
                                                (<span class="option__title">{{ props.option.portrait }}</span>
                                                <span class="option__title">x</span>
                                                <span class="option__title">{{ props.option.landscape }}</span>)
                                            </span>
                                        </template>

                                        <template slot="option" slot-scope="props">
                                            <div class="option__desc">
                                                <span class="option__title">{{props.option.region}}</span>
                                                <span class="option__title">
                                                    ({{ props.option.portrait }}
                                                     x
                                                     {{ props.option.landscape }})</span>
                                            </div>
                                        </template>
                                    </multiselect>
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                            <div class="grid grid-cols-2 gap-3 mt-3" v-if="paper.value.size && paper.value.size.region === 'custom size'">
                                <div>
                                    <ValidationProvider name="paper.value.customsize.width" rules="required">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-model="paper.value.customsize.width" class="border w-full p-2 focus:outline-none" placeholder="Width (mm)">
                                            <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                                <div>
                                    <ValidationProvider name="paper.value.customsize.height" rules="required">
                                        <div slot-scope="{ errors }">
                                            <input type="text" v-model="paper.value.customsize.height" class="border w-full p-2 focus:outline-none" placeholder="Height (mm)">
                                            <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- input wrapper -->

                    <div v-if="ordertype ==='shirt'" class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 31.06 31.06"><path d="M20.87 19.87a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#00a1e9"/><path d="M11.43 29.31a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#e4007f"/><path d="M11.19 10.19a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#ffe200"/><path d="M1.75 19.64a6 6 0 008.44 0 6 6 0 000-8.44 6 6 0 00-8.44 0 6 6 0 000 8.44z" fill="#9fa0a0"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Colour</span>
                        </div>
                        <div class="w-full">
                            <ValidationProvider name="shirt.value.color" rules="required">
                                <div slot-scope="{ errors }">
                                    <input type="text" :value="selectedShirt.color" class="border p-2 rounded w-full focus:outline-none" @click="showSelectShirtModal">
                                    <!-- <multiselect class="customulti" v-model="shirt.value.color" :options="shirt.data.color"></multiselect> -->
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </div>
                    </div>
                    <!-- input wrapper -->

                    <div v-if="ordertype == 'shirt' " class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M3 16l-3-3v7h7l-3-3 5-4-2-2-4 5zM17 4l3 3V0h-7l3 3-5 4 2 2 4-5zm-1 13l-3 3h7v-7l-3 3-4-5-2 2 5 4zM4 3l3-3H0v7l3-3 4 5 2-2-5-4z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Size/Copies</span>
                        </div>
                        <div class="w-full grid grid-cols-5 text-center">
                            <div>
                                <span class="text-sm text-gray-700 block font-medium">S</span>
                                <span class="text-sm text-gray-600 block">({{shirt.data.copies.small}})</span>
                                <input v-on:keyup="checkShirtSizes" type="number" v-model="shirt.value.copies.small" class="border w-16 mt-2 p-1 outline-none focus:outline-none text-center text-lg" max="40" min="0" placeholder="-">
                            </div>
                            <!-- input -->
                            <div>
                                <span class="text-sm text-gray-700 block font-medium">M</span>
                                <span class="text-sm text-gray-600 block">({{shirt.data.copies.medium}})</span>
                                <input v-on:keyup="checkShirtSizes" type="number" v-model="shirt.value.copies.medium" class="border w-16 mt-2 p-1 outline-none focus:outline-none text-center text-lg" max="50" min="0" placeholder="-">
                            </div>
                            <!-- input -->
                            <div>
                                <span class="text-sm text-gray-700 block font-medium">L</span>
                                <span class="text-sm text-gray-600 block">({{shirt.data.copies.large}})</span>
                                <input v-on:keyup="checkShirtSizes" type="number" v-model="shirt.value.copies.large" class="border w-16 mt-2 p-1 outline-none focus:outline-none text-center text-lg" max="150" min="0" placeholder="-">
                            </div>
                            <!-- input -->
                            <div>
                                <span class="text-sm text-gray-700 block font-medium">XL</span>
                                <span class="text-sm text-gray-600 block">({{shirt.data.copies.extraLarge}})</span>
                                <input v-on:keyup="checkShirtSizes" type="number" v-model="shirt.value.copies.extraLarge" class="border w-16 mt-2 p-1 outline-none focus:outline-none text-center text-lg" max="149" min="0" placeholder="-">
                            </div>
                            <!-- input -->
                            <div>
                                <span class="text-sm text-gray-700 block font-medium">XXL</span>
                                <span class="text-sm text-gray-600 block">({{shirt.data.copies.doubleExtraLarge}})</span>
                                <input v-on:keyup="checkShirtSizes" type="number" v-model="shirt.value.copies.doubleExtraLarge" class="border w-16 mt-2 p-1 outline-none focus:outline-none text-center text-lg" max="100" min="0" placeholder="-">
                            </div>
                            <!-- input -->
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
                    <div v-if="ordertype == 'paper' "  class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2 2l2-2h12a2 2 0 012 2v16a2 2 0 01-2 2H4a2 2 0 01-2-2V2zm3 1v2h10V3H5zm0 4v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9zm4 0v6h2v-6h-2zm-8 4v2h2v-2H5zm4 0v2h2v-2H9z"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Quantity</span>
                        </div>
                        <div class="w-full" v-if="isProduct">
                            <ValidationProvider name="paper.value.quantity" rules="required">
                                <div slot-scope="{ errors }">
                                    <multiselect :disabled="paper.value.size == null" class="customulti" v-model="paper.value.quantity" :options="productQuantity"></multiselect>
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>

                        </div>
                    </div>
                    <!-- input wrapper -->
                    <div v-if="ordertype == 'paper'" class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.8 26.3"><path class="cls-1" d="M383 26a9 9 0 01-7-4c-5-6 5-18 6-21l2-1 1 1a54 54 0 015 8c3 6 3 11 1 13a9 9 0 01-8 4zm0-22c-3 5-8 13-5 17a7 7 0 0011 0c3-4-2-13-6-17z" transform="translate(-366)"/><path class="cls-1" d="M375 0c-1 1-12 16-7 22a9 9 0 0015 0c5-6-7-21-8-22z" transform="translate(-366)"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Finishing</span>
                        </div>
                        <div class="w-full">
                            <multiselect
                            :disabled="!isPaperOrder"
                            :multiple="false"
                            :close-on-select="true"
                            :clear-on-select="false"
                            @select="showPaperFinishingModal"
                            class="customulti select-none"
                            v-model="paper.value.finishing"
                            :options="notSelectedPaperFinishing">
                            </multiselect>
                        </div>
                    </div>
                    <!-- input wrapper -->
                    <!-- input wrapper -->
                    <div v-if="ordertype == 'paper'" class="lg:flex items-center mb-5 -mt-3 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                        </div>
                        <div class="w-full">
                            <order-paper-selected-finishing @updated="sumPriceDays"></order-paper-selected-finishing>
                        </div>
                    </div>
                    <!-- input wrapper -->
                    <div v-if="ordertype == 'shirt' && shirt.value.buyType === 'printed'" class="lg:flex items-center mb-5 input-wrapper">
                        <div class="w-full lg:w-64 mb-2 flex items-center">
                            <span class="text-gray-600">
                                <svg class="fill-current w-6 h-6" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.8 26.3"><path class="cls-1" d="M383 26a9 9 0 01-7-4c-5-6 5-18 6-21l2-1 1 1a54 54 0 015 8c3 6 3 11 1 13a9 9 0 01-8 4zm0-22c-3 5-8 13-5 17a7 7 0 0011 0c3-4-2-13-6-17z" transform="translate(-366)"/><path class="cls-1" d="M375 0c-1 1-12 16-7 22a9 9 0 0015 0c5-6-7-21-8-22z" transform="translate(-366)"/></svg>
                            </span>
                            <span class="text-lg font-medium text-gray-900 inline-block ml-4">Printing</span>
                        </div>
                        <div class="w-full">
                            <multiselect @select="showShirtPrintingModal" class="customulti" v-model="shirt.value.printing" :options="notSelectedShirtPrinting"></multiselect>
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
                                    <tr>
                                        <th class="border border-gray-200 px-3 text-sm py-2">Product Price</th>
                                        <td class="border border-gray-200 px-3 text-sm py-2">{{price.product}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-200 px-3 text-sm py-2">Extra</th>
                                        <td class="border border-gray-200 px-3 text-sm py-2">{{price.extra}}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-200 px-3 text-sm py-2">Incl. VAT (5%)</th>
                                        <td class="border border-gray-200 px-3 text-sm py-2">{{price.vat}}</td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-200 px-3 text-sm py-2">Total</th>
                                        <td class="border border-gray-200 px-3 font-semibold text-base text-red-500 py-2">{{price.total}}</td>
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
                            type="submit"
                            :disabled="invalid"
                            :class="invalid ? 'bg-theme-gray-dark text-gray-800 cursor-not-allowed' : 'bg-primary-500 text-white' "
                            class="border p-5 w-3/4 mx-auto rounded font-medium text-2xl flex items-center justify-center">
                                <span
                                :class="invalid ? 'text-gray-700' : 'text-gray-100' "
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

            <div class="hidden">
                {{customSizes}}
            </div>
            <div>
                <order-images-slider :images="images"></order-images-slider>
            </div>
        </div>

        <modal adaptive @before-close="clearPaperFinishing" width="900" height="auto" name="paper-finishing-modal" class="relative">
            <div @click="$modal.hide('paper-finishing-modal')" class="close absolute right-0 top-0 p-1 cursor-pointer text-red-500 flex items-center justify-center z-10">
                <svg class="fill-current w-6 h-6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
            </div>
            <div class="p-6">
                <order-paper-finishings :finishings="finishings" @added="hideModal" :type="paper.value.finishing"></order-paper-finishings>
            </div>
        </modal>

        <modal width="900" adaptive height="auto" scrollable name="select-shirt-modal" class="relative">
            <div @click="$modal.hide('select-shirt-modal')" class="close absolute right-0 top-0 p-1 cursor-pointer text-red-500 flex items-center justify-center z-10">
                <svg class="fill-current w-6 h-6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
            </div>
            <div class="p-6">
                <order-select-shirt-modal @added="hideModal" :type="paper.value.finishing"></order-select-shirt-modal>
            </div>
        </modal>

        <modal adaptive width="600" height="auto" scrollable name="shirt-printing" class="relative">
            <div @click="$modal.hide('shirt-printing')" class="close absolute right-0 top-0 p-1 cursor-pointer text-red-500 flex items-center justify-center z-10">
                <svg class="fill-current w-6 h-6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
            </div>
            <div class="p-6">
                <order-shirt-printing :type="shirt.value.printing" @added="hideModal"></order-shirt-printing>
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
    import OrderPaperSelectedFinishing from './paper/PaperSelectedFinishing'
    import OrderShirtSelectedPrinting from './shirt/ShirtSelectedPrinting'
    import OrderSelectShirtModal from './shirt/SelectShirt'
    import OrderShirtPrinting from './shirt/ShirtPrinting'
    import OrderImagesSlider from './ImagesSlider'

    import gql from 'graphql-tag'
    import sizesbycategory from "../../../../gql/frontend/queries/sizesbycategory.gql";
    import finishingbyproduct from "../../../../gql/frontend/queries/finishingsbyproduct.gql";
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
            'user',
            'images',
            'ordertype',
            'menu',
            'currentpaper',
            'packages',
            'slug',
            'package',
            'pid',
            'ptitle',
            ],
        components: {
            Multiselect,
            PrettyRadio,
            ValidationProvider,
            ValidationObserver,
            OrderPaperSelectedFinishing,
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
                        copies: {
                            small: null ,
                            medium: null ,
                            large: null ,
                            extraLarge: null ,
                            doubleExtraLarge: null ,
                        },
                        buyType: 'printed',
                    },
                    data: {
                        color: ["red", "green", "yellow", "blue", "black"],
                        copies: {
                            small: 40,
                            medium : 50,
                            large : 150,
                            extraLarge : 149,
                            doubleExtraLarge : 100,
                        },
                        printing: ["flock", "metalic foal", "color printing"],

                    },
                },
                paper: {
                    value: {
                        size: null,
                        customsize: {
                            width: null,
                            height: null,
                        },
                        paper: this.currentpaper,
                        color: this.currentpaper,
                        quantity: null,
                        finishing: null,
                    },
                    data: {
                        sizes: ["custom size","UAE (90x50) Standard", "EU (85x55) Standard", "Japan (91x55) Standard"],
                        paper: ["400 gsm matt laminated"],
                        color: ["Two sides colours","one side color"],
                        quantity: ["250", "500", "750", "1000", "2000"],
                        finishing: ["Hot foil", "Emboss", "Punch hole", "Round corner"],
                    },
                },

                isPaperOrder: false,
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
                isShirtSizesError: false,
                radio: null,
                value: null,
                options: ['one', 'two', 'three'],
            }
        },
        watch: {
            price: {
                handler(val){
                    let vat = (5 / 100) * (val.product + val.extra);
                    this.price.total = (val.product + val.extra) + vat
                    this.price.vat = vat
                }, deep: true
            },
            paper: {
                deep: true,
                handler(order) {
                    if( order.value.color != null &&
                        order.value.paper != null &&
                        order.value.quantity != null &&
                        ((order.value.size != null && order.value.size.id != 0) ||
                        (order.value.customsize.width != null &&
                        order.value.customsize.width != 0 &&
                        order.value.customsize.width != "")
                        &&
                        (order.value.customsize.height != null &&
                        order.value.customsize.height != 0 &&
                        order.value.customsize.height != "")))
                    {
                        this.isPaperOrder = true
                        this.filterPaperOrder()
                    }else{
                        this.isPaperOrder = false
                    }
                }
            }

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
            productPapers () {
                if(this.isProduct) {
                    return this.product.packages
                }
            },
            productSizes () {
                let data = []
                if(this.package.prices.length != 0) {
                    this.package.prices.map(p => {
                        data.push(p.sizes.map(s => s.size))
                    });
                    return  _.uniqBy([].concat.apply([], data), 'id');
                }
            },
            customSizes () {
                let data = {
                    content_types: `[${this.menu.id}]`,
                    id: 0,
                    landscape: 0,
                    portrait: 0,
                    region: "custom size",
                    status: 0,
                    type: "none",
                    unit: "none",
                }

                if(this.productSizes) {
                    let rec = this.productSizes.unshift(data)
                }
            },
            productQuantity() {
                if(this.isProduct) {
                    let arrays = this.package.prices.map(p => p.quantity);

                    return _.uniqBy([].concat.apply([], arrays));
                }
            },
            selectedShirt () {
                return this.$store.state.selectedShirt
            },
            computedFinishings () {
                if(!this.$apollo.queries.finishings.loading){
                    return this.finishings.map(f => f.title)
                }
            },
            selectedPaperFinishing() {
                return this.$store.state.selectedPaperFinishing
            },
            notSelectedPaperFinishing () {
                const selected = this.$store.state.selectedPaperFinishing.map(e=>e.name)
                return _.difference(this.computedFinishings,selected);
            },
            notSelectedShirtPrinting () {
                const selected = this.$store.state.selectedShirtPrinting.map(e=>e.name)
                return _.difference(this.shirt.data.printing,selected);
            },
            isShirtSizes () {
                if (this.shirt.value.copies.small ||
                    this.shirt.value.copies.medium ||
                    this.shirt.value.copies.large ||
                    this.shirt.value.copies.extraLarge ||
                    this.shirt.value.copies.doubleExtraLarge) {
                    return true
                }
                else {
                    return false
                }
            }
        },
        mounted() {
            // this.$modal.show('shirt-printing');
            this.$store.dispatch("getProduct", this.pid)
        },
        methods: {
            onPaperChange (value) {
                // console.log(value.id)
                window.location.href = `/product-order/paper/${this.product.slug}?package=${value.id}&category=${this.menu.id}&type=${this.ordertype}`
            },
            onPaperColourChange (value) {
                window.location.href = `/product-order/paper/${this.product.slug}?package=${value.id}&category=${this.menu.id}&type=${this.ordertype}`
            },
            async filterPaperOrder() {
                await axios.post("/api/order/paper/price", {
                    size: this.paper.value.size,
                    paper: this.paper.value.paper,
                    color: this.paper.value.color,
                    quantity: this.paper.value.quantity,
                    customsize: this.paper.value.customsize
                })
                .then(response => {
                    this.price.product = response.data.result.price

                    this.total = 0
                    this.days.total = this.product.delivery_time + parseInt(this.days.finishing)
                });
            },
            addPrice (oldPrice, newPrice) {
                let price = this.price.product - oldPrice
                this.price.product += newPrice
            },
            clearPaperFinishing () {
                this.paper.value.finishing = null
            },
            showPaperFinishingModal () {
                this.$nextTick(() => {
                    this.$modal.show('paper-finishing-modal');
                })
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
                this.$modal.hide('paper-finishing-modal');
                this.$modal.hide('select-shirt-modal');
                this.$modal.hide('shirt-printing');
                this.paper.value.finishing = null
                this.shirt.value.color = null
                this.shirt.value.printing = null

                this.sumPriceDays()

            },
            sumPriceDays () {
                this.$nextTick(() => {
                    this.price.extra = this.$store.state.selectedPaperFinishingExtraPrice

                    this.days.total = 0
                    this.days.finishing = this.$store.state.selectedPaperFinishingExtraDays
                    this.days.total = this.days.finishing + this.product.delivery_time

                });
            },
            checkShirtSizes () {
                if(!this.isShirtSizes){
                    this.isShirtSizesError = true
                }else{
                    this.isShirtSizesError = false
                }
            },
            submitForm: function () {

                let paper = this.paper.value.paper.paper.title;
                let paper_color = this.paper.value.paper.paper.side;
                let paper_size =
                    "Landscape: " +
                    this.paper.value.size.landscape +
                    this.paper.value.size.unit +
                    " Portrait: " + this.paper.value.size.portrait +
                    this.paper.value.size.unit +
                    " Region: " + this.paper.value.size.region +
                    " Type: " + this.paper.value.size.type

                let finishings = JSON.stringify(this.selectedPaperFinishing)

                axios.post(`/profile/orders`, {
                    title: this.ptitle,
                    product_id: this.pid,
                    paper: paper,
                    paper_color: paper_color,
                    paper_size: paper_size,
                    paper_quantity: this.paper.value.quantity,
                    paper_finishings: finishings,
                    turnaround: this.days.total,
                    price_product: this.price.product,
                    price_extra: this.price.extra,
                    price_vat: this.price.vat,
                    price_total: this.price.total,
                    status: "cart",
                    product_type: "paper",
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
                            title: 'Product',
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
            sizes() {
                return {
                    query: sizesbycategory,
                    variables: {
                        catg_id: this.menu.id
                    },
                    update(data) {
                        return data.sizesbycategory
                    },
                };
            },
            finishings() {
                return {
                    query: finishingbyproduct,
                    variables: {
                        product_id: this.pid
                    },
                    update(data) {
                        return data.finishingsbyproduct
                    },
                };
            },
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style lang="scss" scoped>

</style>
