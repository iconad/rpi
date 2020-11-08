<template>
    <div>
        <div class="text-lg font-medium ml-16 mb-3">Offered print-run: 250~3,000 copies</div>
        <ul class="product-quantity-chart text-sm flex items-center w-full border-t border-black">
            <li v-for="(q,i ) in quantity" :key="i" class="w-full h-16 text-center">
                <product-quality-chart-redline :q="q" :minq="minq" :maxq="maxq"></product-quality-chart-redline>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                quantity: [1,10,50,100,250,500,1000,2000,5000,10000],
                minq: 100,
                maxq: 1000,
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
