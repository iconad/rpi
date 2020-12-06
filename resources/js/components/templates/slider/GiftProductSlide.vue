<template>
    <div>
        <div v-if="product" >
            <div class="p-3 text-xl font-semibold text-primary">{{product.subcategory.title}}</div>
        <a :href="`/products/personalized-gifts/${product.subcategory.slug}`">
            <thumb-image v-if="firstMedia.length != 0" classess="w-full h-64 object-cover" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
        </a>
        <div class="p-3">
            <div class="mb-2 font-semibold text-sec-500">
                Price starting from <span> {{lowestPrice}} </span> AED
            </div>
            <div class="mb-2 capitalize">
                <span class="font-semibold text-black">Delivery</span>
                <span class="inline-block ml-3">
                    {{product.delivery_time}} business
                    <span v-if="product.delivery_time > 1">days</span>
                    <span v-else>day</span>
                </span>
            </div>
            <div v-if="product.variants.length > 0" class="mb-2 capitalize flex items-cener">
                <span class="font-semibold text-black">Colors</span>
                <div class="flex items-center justify-start ml-4">
                    <template v-for="(color, i) in colors">
                        <span :key="i" class="inline-block w-5 h-5 rounded mr-1" :title="color.title" :style="`background: ${color.hex}`"></span>
                    </template>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-around p-3 pt-0 border-2 border-t-0 border-l-0 border-r-0 border-sec">
            <a href="http://" class="mr-auto">Get Started</a>
            <a href="http://" class="ml-auto">View All</a>
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
            firstMedia (){
                return this.product.media.filter(e => {
                    if(e.collection_name === 'images') {
                        return e
                    }
                })
            },
            colors () {
                let colors = []
                this.product.variants.map(v => {
                    if (v.color) {
                        colors.push({
                            id: v.color.id,
                            title: v.color.title,
                            hex: v.color.hex,
                        })
                    }
                })
                return colors
            },
            lowestPrice () {
                let prices = this.product.variants.map(v => v.price)
                return _.min(prices)
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
