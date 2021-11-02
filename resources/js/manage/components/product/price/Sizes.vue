<template>
    <div>
        <div v-if="selectedSize && $apollo.queries.sizes.loading" class="mx-12">
            <div class="loader-dots"></div>
        </div>
        <div v-else class="form-element">
            <label class="w-full block relative" v-if="sizes.length != 0">
                <span class="text-sm font-medium mb-1">Size
                    <span v-if="asizes && asizes.length === 0" class="text-red-500 text-sm">All sizes assigned to this package</span>
                </span>
                <ValidationProvider name="form.size" rules="required">
                    <div class="relative">
                        <select class="form-input text-lg" v-model="csize" @change="onSelectSize">
                            <option v-if="method == 'update'" class="capitalize" :value="selectedSize.size.id">
                                {{ selectedSize.size.region }}
                                <span class="capitalize"> / {{selectedSize.size.type}}</span>
                                <span> / {{selectedSize.size.portrait}}</span>
                                <span> / {{selectedSize.size.landscape}}</span>
                                <span>{{selectedSize.size.unit}}</span>
                            </option>
                            <option class="capitalize" v-for="size in asizes" :key="size.id" :value="size.id">
                                {{ size.region }}
                                <span class="capitalize"> / {{size.type}}</span>
                                <span> / {{size.portrait}}</span>
                                <span> / {{size.landscape}}</span>
                                <span>{{size.unit}}</span>
                            </option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        </div>
                    </div>
                </ValidationProvider>
            </label>
            <span v-else class="text-sm text-red-500 font-medium mb-1">No size found! please add size before adding price.</span>
        </div>

    </div>
</template>

<script>
    import gql from 'graphql-tag'
    import sizes from "../../../../../../gql/queries/sizesbycategory.gql";

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required } from 'vee-validate/dist/rules';

    extend('required', {
        ...required,
        message: 'This field is required'
    });

    export default {
        props: ['menu', 'currentsize', 'selectedsizes', 'selectedSize', 'method'],
        components: {
            ValidationProvider,
            ValidationObserver,
        },
        data() {
            return {
                size: null,
            }
        },
        computed: {
            asizes () {
                if(!this.$apollo.queries.sizes.loading) {
                    if(this.selectedsizes != undefined) {
                        let asizes = this.sizes.filter(o => !this.selectedsizes.find(o2 => o.id === o2.id))
                        return asizes;
                    }
                }
            },
            csize: {
                get: function () {
                    if(this.method == 'update') {
                        return this.selectedSize.size.id
                    }else{
                        return this.size
                    }
                },
                set: function (value) {
                    return this.size = value
                },
            }
        },
        methods: {
            onSelectSize () {
                this.$emit('update', this.size)
            }
        },
        // watch: {
        //     size (newValue, oldValue) {
        //         this.onSelectSize()
        //     }
        // },
        apollo: {
            sizes() {
                return {
                    query: sizes,
                    variables: {
                        catg_id: this.menu.id
                    },
                    update(data) {
                        return data.sizesbycategory;
                    },
                };
            },
        }
    }
</script>
