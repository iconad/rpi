<template>
    <div>

        <swiper class="swiper" :options="swiperOptions">

            <swiper-slide>
                <div class="w-full inner">
                    <a href="http://">
                        <img src="https://assets.printarabia.ae/product-preset-banners/production/YrXnavdxJLG10qB/banner-73d9de647abf31f027e9f4de7f861ff7.webp"
                            alt="banner">
                    </a>
                </div>
            </swiper-slide>

            <swiper-slide>
                <div class="w-full bg-green-400 inner">
                    <a href="http://">
                        <img src="https://cdn.printarabia.ae/assets/product-preset-banners/production/NQ13q2L90V9aGnK/banner-printarabia-a1c92b15ba30eb0390f8d623a06ece39.webp"
                            alt="banner">
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

<style lang="scss" scoped></style>
