<template>
    <div>
        <div v-if="product">
            <div class="p-3 text-xl font-semibold text-primary-500">{{product.title}}</div>
        <a :href="`/products/${product.slug}`">
            <thumb-image v-if="firstMedia.length != 0" classess="w-full" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
        </a>
        <div class="p-3">
            <div class="mb-2 font-semibold text-sec">
                <span v-if="product.packages[0].prices[0] ">
                    {{product.packages[0].prices[0].size.region}}  ●
                </span>
                {{product.packages[0].quantity}} Copies > {{prices[0][0].price}} AED
            </div>
            <div v-if="product.packages && product.packages[0].paper" class="mb-2 capitalize"><span class="font-semibold text-black">Papers</span> {{product.packages[0].paper.title}} </div>
            <div class="mb-2 capitalize"><span class="font-semibold text-black">Delivery</span>  Same Day </div>
            <div v-if="product.packages && product.packages[0].paper" class="mb-2 capitalize"><span class="font-semibold text-black">Printing</span>  {{product.packages[0].paper.side}} </div>
        </div>
        <div class="flex items-center justify-around p-3 pt-0 border-2 border-t-0 border-l-0 border-r-0 border-sec">
            <a :href="`/products/${product.slug}`" class="mr-auto">Get Started</a>
            <a :href="`/category/${product.category.slug}/products`" class="ml-auto">View All</a>
        </div>
        </div>
        <div v-else class="flex items-center justify-center h-64 w-full">
            <div class="text-xl text-red-500">
                Product loading...
            </div>
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
            prices() {
                return this.product.packages.filter( p => p.prices.length != 0 ).map(i => i.prices)[0].map(s=>s.sizes)
            },
            lowPrice () {
                // if(this.prices) {
                //     return this.price.map(p => p.sizes)
                // }
            },
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
