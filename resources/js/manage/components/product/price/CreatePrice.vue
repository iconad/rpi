<template>
    <div>

        <div class="p-6 relative w-full">
            <div v-if="error != null" class="absolute right-0 top-100 w-full p-5 error">
                <div class="border p-3 font-medium rounded-lg text-red-500 bg-red-100 border-red-500">
                    {{error}}
                </div>
            </div>
            <div class="text-xl mb-3 capitalize font-semibold">Add Price / Size</div>
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

                <div>
                    <label class="w-full block mb-3">
                        <span class="text-sm font-medium mb-1">Quantity</span>
                        <ValidationProvider name="form.quantity" rules="required|number">
                            <div slot-scope="{ errors }">
                                <input type="number" class="form-input text-lg" v-model="form.quantity">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>

                <template v-if="!$apollo.queries.package.loading">
                    <sizes-by-category :selectedsizes="[]" :menu="package.product.category.menu" @update="onSelectSize"></sizes-by-category>
                </template>

                <div class="-mt-2">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Price</span>
                        <ValidationProvider name="form.price" rules="required|number">
                            <div slot-scope="{ errors }">
                                <input type="number" class="form-input text-lg" v-model="form.price">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>

                <div class="mt-8" v-if="form.size != null">
                    <div class="w-32">
                        <button
                        type="submit"
                        :disabled="invalid"
                        :class="invalid ? 'bg-gray-200 text-gray-700 border-gray-200 hover:border-gray-200 hover:bg-gray-200 cursor-not-allowed' : '' "
                        class="theme-button text-base font-medium"
                        >Add</button>
                    </div>
                </div>

            </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>

    import SizesByCategory from './Sizes'

    import gql from 'graphql-tag'
    import packageQuery from "../../../../../../gql/queries/package.gql";
    import prices from "../../../../../../gql/queries/packageprice.gql";

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, number } from 'vee-validate/dist/rules';

    extend('required', {
        ...required,
        message: 'This field is required'
    });

    extend('number', {
        ...required,
        message: 'The price should be a number'
    });


    export default {
        props: ['pkgid', 'pid'],
        components: {
            SizesByCategory,
            ValidationProvider,
            ValidationObserver,
        },
        data() {
            return {
                error: null,
                form: {
                    quantity: null,
                    price: null,
                    size: null,
                },
            }
        },
        methods: {
            onSelectSize (data) {
                this.form.size = data
                console.log(this.form.size)
            },
            submitForm () {
                axios.post(`/manage/products/${this.pid}/packages/${this.pkgid}/prices`, {
                    quantity: this.form.quantity,
                    price: this.form.price,
                    size: this.form.size,
                })
                .then(response => {
                    if (!response.data.status) {
                        this.error = response.data.message
                    }else{
                        this.error = null
                        this.$swal({
                            toast: true,
                            position: 'center',
                            showConfirmButton: false,
                            timer: 3000,
                            title: 'Price',
                            text: 'Added!',
                        });
                        this.$emit('updated')
                    }
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
                    id: this.pkgid
                    },
                    update(data) {
                        return data.package;
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
