<template>
    <div>
        <div class="w-full" v-if="!this.isProduct">
            <div class="loader"></div>
        </div>
        <div v-else  class="flex flex-wrap md:flex-nowrap items-center">
            <div class="w-48 text-lg font-medium text-gray-800">
                Prices shown for:
            </div>
            <div class="w-full">
                <multiselect :allow-empty="false" class="customulti w-full border border-gray-500" v-model="selectedPackage" :options="packages">

                    <template slot="singleLabel" slot-scope="props">
                        <span class="option__desc">
                            <span class="option__title">{{ props.option.paper.title }}</span>
                            <span class="option__title">({{ props.option.paper.side }})</span>
                        </span>
                    </template>

                    <template slot="option" slot-scope="props">
                        <div class="option__desc">
                            <span class="option__title">{{ props.option.paper.title }}</span>
                            <span class="option__title">({{ props.option.paper.side }})</span>
                        </div>
                    </template>
                </multiselect>

            </div>
        </div>
        <div class="paper-price-table mt-10">
            <product-paper-price-table :header="header" :package="selectedPackage" ></product-paper-price-table>
        </div>
    </div>
</template>

<script>

    import gql from 'graphql-tag'
    import product from "../../../../gql/frontend/queries/product.gql";

    import ProductPaperPriceTable  from './PaperPriceTable'
    import Multiselect from 'vue-multiselect'
    export default {
        props: ['pid'],
        components: {
            Multiselect,
            'product-paper-price-table': ProductPaperPriceTable
         },
        data () {
            return {
                selectedPackage: null,
                header:[],
            }
        },
        mounted() {

        },
        watch: {
            selectedPackage (newValue, oldValue) {
                this.$store.commit('selectedPackage', newValue)
                this.header = []
                newValue.prices.map(e => {
                     e.sizes.map(b => {

                        // Transforming array of objects into array of strings
                         let arrayOfStrings = this.header.map(obj => JSON.stringify(obj));

                        // Declaring new element as an example
                         let header = {
                            id: b.size.id,
                            region: b.size.region,
                            type: b.size.type,
                            unit: b.size.unit,
                            portrait: b.size.portrait,
                            landscape: b.size.landscape,
                        }

                        // Stringifying new element
                        let newElemString = JSON.stringify(header);

                        // At this point, check if the string is duplicated and add it to array
                        !arrayOfStrings.includes(newElemString) && this.header.push(header);

                    })
                })
            }
        },
        mounted() {
            this.$store.dispatch("getProduct", this.pid)
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

            packages () {
                if(this.product) {
                    if (this.product.packages.length > 0) {
                        this.selectedPackage = this.product.packages[0]
                    }
                    return this.product.packages
                }
            }
        },
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss" scoped>

</style>
