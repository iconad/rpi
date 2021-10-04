<template>
    <div>
        <div v-if="product">
            <div class="p-3 text-xl font-semibold text-primary-500">{{product.title}}</div>
            <a :href="`/products/${product.slug}`">
                <thumb-image v-if="firstMedia.length != 0" classess="w-full" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
            </a>
            <div class="border border-t-0 rounded-b overflow-hidden">
                <div class="font-semibold text-sec text-center grid grid-cols-3 gap-0">
                    <span class="border-b p-2 pt-3" v-if="product.packages[0].prices[0] ">
                        {{product.packages[0].prices[0].size.region}}
                    </span>
                  
         <span class="border border-t-0 p-2 pt-3">   {{product.packages[0].prices[0].quantity}} {{product.packages[0].prices[0].quantity == 1 ? 'Copy' : 'Copies'}}                 
                                  </span>
           
                        <span class="border-b p-2 pt-3">
                            {{prices[0][0].price}} AED
                        </span>
                </div>
                <div class="capitalize">
                    <div v-if="product.packages && product.packages[0].paper" class="flex">
                        <span class="block p-2 w-32 border-b font-semibold text-black">Papers</span>
                        <span class="block p-2 w-full border border-t-0 border-r-0"> {{product.packages[0].paper.title}} </span>
                    </div>
                    
                    <div class="flex">
                        <span class="block p-2 w-32 border-b font-semibold text-black">Delivery</span>
                        <span class="block p-2 w-full border border-t-0 border-r-0"> {{product.delivery_time}} {{ product.delivery_time > 1 ? 'Days' : 'Day'}} </span>
                    </div>
                    <div v-if="product.packages && product.packages[0].paper" class="flex">
                        <span class="block p-2 w-32 border-b font-semibold text-black">Printing</span>
                        <span class="block p-2 w-full border border-t-0 border-r-0"> {{product.packages[0].paper.side}} </span>
                    </div>
                </div>

                <div class="text-sm">
                    <a :href="`/category/${product.category.slug}/products`" class="block w-full text-center hover:bg-primary-400 hover:text-white p-2 transition-all duration-200 font-medium text-gray-600">View Product</a>
                </div>

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
