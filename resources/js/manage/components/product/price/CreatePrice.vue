<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Add Price / Size</div>
            <!-- <hr class="my-2"> -->
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="submitForm">
                <div v-if="$apollo.queries.package.loading" class="mx-12">
                    <div class="loader-dots"></div>
                </div>
                <div class="form-element" v-else>
                    <label class="w-full block relative">
                        <span class="text-sm font-medium mb-1">Quantity</span>
                        <div type="text" disabled class="form-input text-lg font-medium select-none bg-gray-100"> {{package.quantity}} </div>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block relative">
                        <span class="text-sm font-medium mb-1">Type</span>
                        <ValidationProvider name="form.size" rules="required">
                            <div class="relative">
                                <select class="form-input text-lg capitalize" v-model="form.size">
                                    <option class="capitalize" v-for="size in sizes" :key="size.id" :value="size.id">
                                        {{ size.region }} / {{size.type}}
                                    </option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                </div>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div>
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
                <div class="mt-8">
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

    import gql from 'graphql-tag'
    import sizes from "../../../../../../gql/queries/sizes.gql";
    import packageQuery from "../../../../../../gql/queries/package.gql";

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
            ValidationProvider,
            ValidationObserver,
        },
        data() {
            return {
                form: {
                    price: null,
                    size: null,
                },
            }
        },
        methods: {
            submitForm () {
                axios.post(`/manage/products/${this.pid}/packages/${this.pkgid}/prices`, {
                    price: this.form.price,
                    size: this.form.size,
                })
                .then(response => {
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Price',
                        text: 'Added!',
                    });
                    this.$emit('updated')
                })
            },
        },
        apollo: {
            sizes() {
                return {
                    query: sizes,
                    update(data) {
                        return data.sizes;
                    },
                };
            },
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
        }

    }
</script>

<style lang="scss">
.pretty .state label:before, .pretty .state label:after {
    top: 0px!important;
}
</style>
