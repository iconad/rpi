<template>
    <div>
        <swiper class="swiper" :options="swiperOptions">
            <swiper-slide v-for="(product, i) in products" :key="i">
                <product-slide v-if="product.packages.length != 0" :product="product"></product-slide>
            </swiper-slide>
            <div class="product-swiper-pagination" slot="pagination"></div>
        </swiper>

    </div>
</template>

<script>

    import ThumbImage from './../../ThumbImage'
    import ProductSlide from './ProductSlide'

    export default {
        props: ['products'],
        components: {
            ThumbImage,
            ProductSlide
        },
        data() {
            return {
                swiperOptions: {
                    pagination: {
                        el: '.product-swiper-pagination',
                        clickable: true
                    }
                }
            }
        },
        // computed: {
        //     gallery () {
        //         return this.products.media.filter(e => {
        //             if(e.collection_name === 'images') {
        //                 return e
        //             }
        //         })
        //     }
        // },
    }
</script>

<style lang="scss" scoped>
.product-swiper-pagination {
    text-align: left;
}

</style>
