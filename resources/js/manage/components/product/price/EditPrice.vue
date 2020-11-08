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
                        <span class="text-sm font-medium mb-1">Quantity</span>
                        <div type="text" disabled class="form-input text-lg font-medium select-none bg-gray-100"> {{package.quantity}} </div>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block relative">
                        <span class="text-sm font-medium mb-1">Type</span>
                        <ValidationProvider name="editingTable.size" rules="required">
                            <div class="relative">
                                <select class="form-input text-lg capitalize" v-model="editingTable.data.size.id">
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
                        <ValidationProvider name="editingTable.price" rules="required|number">
                            <div slot-scope="{ errors }">
                                <input type="number" class="form-input text-lg" v-model="editingTable.data.price">
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

    import gql from 'graphql-tag'
    import sizes from "../../../../../../gql/queries/sizes.gql";
    import packageQuery from "../../../../../../gql/queries/package.gql";

    extend('required', {
        ...required,
        message: 'This field is required'
    });


    export default {
        props: ['pid', 'pkgid'],
        components: {
            ValidationProvider,
            ValidationObserver,
        },
        computed: {
            editingTable: {
                get: function () {
                    return this.$store.state.editingTable
                },
                set: function (value) {
                    console.log(value)
                }
            },
        },
        methods: {
            submitForm () {

                axios.put(`/manage/products/${this.pid}/packages/${this.pkgid}/prices/${this.editingTable.data.id}`, {
                    price: this.editingTable.data.price,
                    size: this.editingTable.data.size.id,
                })
                .then(response => {
                    this.$emit('updated')
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
