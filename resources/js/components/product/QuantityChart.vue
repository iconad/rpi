<template>
    <div>
        {{product}}
        <div class="text-base  focus:underline  lg:text-lg font-medium ml-4 lg:ml-16 mb-3">Print-From: {{minq}}~{{maxq}} copies</div>
        <ul class="product-quantity-chart text-sm flex items-center w-full border-t border-cyan-500">
            <li v-for="(q,i ) in quantity" :key="i" class="w-full h-16 text-center">
                <quantity-chart-red-line :q="q" :minq="minq" :maxq="maxq"></quantity-chart-red-line>
            </li>
        </ul>
    </div>
</template>

<script>
    import QuantityChartRedLine from './QuantityChartRedLine'
    export default {
        components: {
            QuantityChartRedLine
        },
        data() {
            return {
                quantity: [1,10,50,100,250,500,1000,2000,5000,10000],
                minq: null,
                maxq: null,
            }
        },
        computed: {
            isProduct () {
                return this.$store.state.isProduct
            },
            product () {
                if(this.isProduct) {
                    let quantity = this.$store.state.product.quantity.split(",")
                    this.minq = quantity[0]
                    this.maxq = quantity[1]
                }
            }
        },
        methods: {
            checkRedLine () {
                console.log("yeser")
            }
        },
    }
</script>

<style lang="scss" scoped>



</style>
