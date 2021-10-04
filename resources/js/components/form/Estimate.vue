<template>
    <div>
        <div v-if="isSend" class="h-64 flex items-center justify-center">
            <div class="text-xl text-center">
                <span class="block text-green-600 mb-2 font-semibold">Your estimate inquiry has been successfully sent</span>
                
                <span class="mt-3 flex items-center justify-center space-x-3 text-base">
                    <a href="/" class="cursor-pointer theme-button py-1 rounded bg-transparent text-gray-700 text-sm border-gray-300"> Home </a>
                    <button @click="isSend = false" class="cursor-pointer theme-button py-1 rounded bg-transparent text-gray-700 text-sm border-gray-300"> Send Another Estimate </button>
                </span>
            </div>
        </div>
        <div v-else>
            <ValidationObserver v-slot="{ invalid, passes }">
            <form @submit.prevent="submitForm">
                <div class="bg-gray-200 p-6">
                    <div class="flex items-center w-full">
                        <div class="text-base w-32">Company*:</div>
                        <div class="text-base w-full">
                            <ValidationProvider name="estimate.company" rules="required">
                                <div slot-scope="{ errors }">
                                    <input type="text" class="form-input" v-model="estimate.company">
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </div>
                    </div>
                    <!-- single row -->
                    <div class="flex items-center w-full space-x-4 mt-4">
                        <div class="w-full">
                            <div class="flex items-center w-full space-x-4">
                                <div class="text-base w-32">First Name*:</div>
                                <div class="text-base w-full">
                                <ValidationProvider name="estimate.first" rules="required">
                                    <div slot-scope="{ errors }">
                                        <input type="text" class="form-input" v-model="estimate.first">
                                        <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex items-center w-full space-x-4">
                                <div class="text-base w-32">Last Name*:</div>
                                <div class="text-base w-full">
                                <ValidationProvider name="estimate.last" rules="required">
                                    <div slot-scope="{ errors }">
                                        <input type="text" class="form-input" v-model="estimate.last">
                                        <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- double row -->
                    <div class="flex items-center w-full space-x-4 mt-4">
                        <div class="w-full">
                            <div class="flex items-center w-full space-x-4">
                                <div class="text-base w-32">Email*:</div>
                                <div class="text-base w-full">
                                <ValidationProvider name="estimate.email" rules="required|email">
                                    <div slot-scope="{ errors }">
                                        <input type="email" class="form-input" v-model="estimate.email">
                                        <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex items-center w-full space-x-4">
                                <div class="text-base w-32">Telephone*:</div>
                                <div class="text-base w-full">
                                <ValidationProvider name="estimate.phone" rules="required|mobile">
                                    <div slot-scope="{ errors }">
                                        <input type="number" min="0" class="form-input" v-model="estimate.phone">
                                        <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- double row -->
                    <div class="flex items-center w-full mt-4">
                        <div class="text-base w-32">Product*:</div>
                        <div class="text-base w-full">
                                <ValidationProvider name="estimate.product" rules="required">
                                    <div slot-scope="{ errors }">
                                        <input type="text" class="form-input" v-model="estimate.product">
                                        <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                        </div>
                    </div>
                    <!-- single row -->
                    <div class="flex items-center w-full space-x-4 mt-4">
                        <div class="w-full">
                            <div class="flex items-center w-full space-x-4">
                                <div class="text-base w-32">Quantity*:</div>
                                <div class="text-base w-full">
                                <ValidationProvider name="estimate.quantity" rules="required">
                                    <div slot-scope="{ errors }">
                                        <input type="text" class="form-input" v-model="estimate.quantity">
                                        <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex items-center w-full space-x-4">
                                <div class="text-base w-32">Size*:</div>
                                <div class="text-base w-full">
                                <ValidationProvider name="estimate.size" rules="required">
                                    <div slot-scope="{ errors }">
                                        <input type="text" class="form-input" v-model="estimate.size">
                                        <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- double row -->
                    <div class="flex items-center w-full mt-4">
                        <div class="text-base w-32">Detail*:</div>
                        <div class="text-base w-full">
                        <ValidationProvider name="estimate.detail" rules="required">
                            <div slot-scope="{ errors }">
                                <textarea class="form-input" cols="30" rows="10" v-model="estimate.detail"></textarea>
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                        </div>
                    </div>
                    <!-- single row -->
                    <div class="flex justify-end w-full mt-4">
                        <div v-if="isLoading" class="loader"></div>
                        <input
                        v-else
                        :disabled="invalid"
                        :class="invalid ? 'bg-gray-300 text-gray-700 border-gray-300 hover:border-gray-200 hover:bg-gray-200 cursor-not-allowed':''"
                        type="submit" value="Submit" class="theme-button cursor-pointer rounded">
                    </div>
                    <!-- single row -->
                </div>
            </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, email } from 'vee-validate/dist/rules';

    extend('required', {
        ...required,
        message: 'This field is required'
    });

    extend("mobile", {
        validate(value) {
            return /^(?:\+971|00971|0)?(?:50|51|52|55|58|56|2|3|4|6|7|9)\d{7}$/.test(value);
        },
        message: `Must be a valid UAE number`
    });

    extend('email', {
    ...email,
    message: 'This field must be a valid email'
    });

    export default {
        components: {
            ValidationProvider,
            ValidationObserver,
        },
        data() {
            return {
                isLoading: false,
                estimate: {
                    company: null,
                    first: null,
                    last: null,
                    email: null,
                    phone: null,
                    product: null,
                    quantity: null,
                    size: null,
                    detail: null
                },
                isSend: false
            }
        },
        methods: {
            submitForm () {
                this.isLoading = true
                axios.post(`/estimate`, {
                    company: this.estimate.company,
                    first: this.estimate.first,
                    last: this.estimate.last,
                    email: this.estimate.email,
                    phone: this.estimate.phone,
                    product: this.estimate.product,
                    quantity: this.estimate.quantity,
                    size: this.estimate.size,
                    detail: this.estimate.detail
                })
                .then(response => {
                    this.$swal({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 3000,
                        icon: "success",
                        title: 'Estimate',
                        text: 'has been sent!',
                    });
                    this.isLoading = false
                    if(response.status == 200) {
                        this.isSend = true
                        this.estimate = {}
                    }
                })
            },
        },
    }
</script>

<style lang="scss" scoped>

</style>
