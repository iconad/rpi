<template>
    <div>
        <swiper class="swiper" :options="swiperOptions">
            <swiper-slide v-for="(product, i) in products" :key="i">
                <template v-if="menu == 13">
                    <gift-product-slide :product="product"></gift-product-slide>
                </template>
                <template v-else-if="menu == 14">
                    <shirt-product-slide :product="product"></shirt-product-slide>
                </template>
                <template v-else>
                    <product-slide v-if="product.packages.length != 0" :product="product"></product-slide>
                </template>
            </swiper-slide>
            <div class="product-swiper-pagination" slot="pagination"></div>
        </swiper>

    </div>
</template>

<script>

    import ThumbImage from './../../ThumbImage'
    import ProductSlide from './ProductSlide'
    import GiftProductSlide from './GiftProductSlide'
    import ShirtProductSlide from './ShirtSlide'

    export default {
        props: ['products', "menu"],
        components: {
            ThumbImage,
            ProductSlide,
            ShirtProductSlide,
            GiftProductSlide
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
    }
</script>

<style lang="scss" scoped>
.product-swiper-pagination {
    text-align: left;
}

</style>
