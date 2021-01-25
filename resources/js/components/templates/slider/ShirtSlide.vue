<template>
    <div>
        <div v-if="product">
        <div class="p-3 text-lg font-semibold text-primary-500">
            <span class="text-gray-500 text-xs">{{product.category.title}} /</span>
            {{product.subcategory.title}}
        </div>
        <div class="bg-gray-100 rounded-t-lg overflow-hidden">
        <a :href="`/products/shirts/${product.category.slug}`">
            <thumb-image v-if="firstMedia.length != 0" classess="w-full h-64 object-contain" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
        </a>
        </div>
        <div class="p-3">
            <div class="text-xl uppercase text-primary">{{product.unique_code}}</div>
            <div class="mb-1">
                <div class="text-xs text-primary capitalize">
                    - {{product.subcategory.title}}
                    {{product.cloth_type}}
                    100% {{product.material}}
                </div>
                <div class="text-xs text-primary capitalize">
                    - With or Without Printing
                </div>
            </div>
            <div class="mb-1 text-xl font-bold text-sec-500">
                <span> {{lowestPrice}} </span> AED
            </div>
            <div class="flex items-center space-x-2 text-xs">
                <div class="px-1 bg-gray-500 text-white">
                    <span> {{product.variants.length}} sizes </span>
                </div>
                <div class="px-1 bg-green-500 capitalize text-white">
                    <span> {{product.gender}} </span>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-around p-3 pt-0 border-2 border-t-0 border-l-0 border-r-0 border-sec">
            <a :href="`/products/shirts/${product.category.slug}`" class="mr-auto">Get Started</a>
            <a :href="`/products/shirts/${product.category.slug}`" class="ml-auto">View All</a>
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
