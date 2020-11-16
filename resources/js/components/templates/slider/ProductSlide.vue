<template>
    <div>
        <div class="p-3 text-xl font-semibold text-primary">{{product.title}}</div>
        <a :href="`/products/${product.slug}`">
            <thumb-image classess="w-full" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
        </a>
        <div class="p-3">
            <div class="mb-2 font-semibold text-sec">
                <span v-if="product.packages[0].prices[0].size">
                    {{product.packages[0].prices[0].size.region}}  ●
                </span>
                {{product.packages[0].quantity}} Copies >
                {{product.packages[0].prices[0].price}} AED
            </div>
            <div v-if="product.packages && product.packages[0].paper" class="mb-2 capitalize"><span class="font-semibold text-black">Papers</span> {{product.packages[0].paper.title}} </div>
            <div class="mb-2 capitalize"><span class="font-semibold text-black">Delivery</span>  Same Day </div>
            <div v-if="product.packages && product.packages[0].paper" class="mb-2 capitalize"><span class="font-semibold text-black">Printing</span>  {{product.packages[0].paper.side}} </div>
        </div>
        <div class="flex items-center justify-around p-3 pt-0 border-2 border-t-0 border-l-0 border-r-0 border-sec">
            <a href="http://" class="mr-auto">Get Started</a>
            <a href="http://" class="ml-auto">View All</a>
        </div>
    </div>
</template>

<script>
    import ThumbImage from './../../ThumbImage'

    export default {
        props:['product'],
        components: {
            ThumbImage
        },
        computed: {
            firstMedia (){
                return this.product.media.filter(e => {
                    if(e.collection_name === 'images') {
                        return e
                    }
                })
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
