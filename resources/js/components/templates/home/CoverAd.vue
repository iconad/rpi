<template>
    <div>

        <swiper class="swiper" :options="swiperOptions">
            <swiper-slide>
                <div class="w-full inner">
                    <a href="http://">
                        <img src="https://assets.printarabia.ae/product-preset-banners/production/YrXnavdxJLG10qB/banner-73d9de647abf31f027e9f4de7f861ff7.webp" alt="banner">
                    </a>
                </div>
            </swiper-slide>
            <swiper-slide>
                <div class="w-full bg-green-400 inner">
                    <a href="http://">
                     <img src="https://assets.printarabia.ae/product-preset-banners/production/8rwvkGdj4LazlKo/banner-6807796b876d2d5b3eee617e408fecaf.webp" alt="banner">
                    </a>

                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                swiperOptions: {
                    autoplay: true,
                    effect: 'fade',
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                    autoplay: {
                        delay: 10000,
                        disableOnInteraction: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                }
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
