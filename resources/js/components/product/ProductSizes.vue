<template>
    <div>
        <pre>
        </pre>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10">
            <div class="box border border-primary" v-for="(size, i) in sizes" :key="i">
                    <product-size :size="size"></product-size>
                </div>
            </div>
            {{selectedPcakge}}
        </div>
</template>

<script>

    import productSize from './ProductSize'

    import gql from 'graphql-tag'
    import product from "../../../../gql/frontend/queries/product.gql";

    export default {
        components: {
            productSize
        },
        data () {
            return {
                sizes:[],
            }
        },
        computed: {
            selectedPcakge () {
                if(this.product) {
                    let sizes = this.$store.state.selectedPackage
                    this.sizes = []
                    sizes.prices.map(e => {
                        e.sizes.map(b => {

                            let arrayOfStrings = this.sizes.map(obj => JSON.stringify(obj));

                            let size = {
                                id: b.size.id,
                                region: b.size.region,
                                type: b.size.type,
                                unit: b.size.unit,
                                portrait: b.size.portrait,
                                landscape: b.size.landscape,
                            }

                            let newElemString = JSON.stringify(size);

                            !arrayOfStrings.includes(newElemString) && this.sizes.push(size);


                        })
                    })
                }
            },
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
                        this.$store.commit('selectedPackage', this.product.packages[0])
                    }
                    return this.product.packages
                }
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
