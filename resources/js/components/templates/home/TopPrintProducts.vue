<template>
    <div>
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-12">
            Top Print Products
        </h2>

        <swiper class="swiper" :options="swiperOptions">
              <!-- v-for="(swiper, i) in 10" :key="i" -->
                <swiper-slide class="mb-8 border">
                    <div class="inner">
                        <a href="http://" class="block">
                            <div class="p-3 text-xl font-semibold text-primary">Hand Sanitizer Sticker</div>
                            <img
                                class="w-full"
                                src="https://assets.printarabia.ae/product-preset-categories/j8N07V1WwDoaZAO/preset-c05c99840296cc5914f576f7f41530d5.webp"
                                alt="image"
                            />
                            <div class="p-3">
                                <div class="mb-2 font-semibold text-sec">A3 (297x420mm) • 1 Copies > 75 AED</div>
                                <div class="mb-2"><span class="font-semibold text-black">Papers</span> 50gsm PVC White Gloss Sticker </div>
                                <div class="mb-2"><span class="font-semibold text-black">Delivery</span>  Same Day </div>
                                <div class="mb-2"><span class="font-semibold text-black">Printing</span>  Printing One side colour </div>
                            </div>
                            <div class="flex items-center justify-around p-3 pt-0">
                                <a href="http://" class="mr-auto">Get Started</a>
                                <a href="http://" class="ml-auto">View All</a>
                            </div>
                        </a>
                    </div>
                </swiper-slide>

            <!-- <div class="swiper-button-prev" slot="button-prev"></div>
            <div class="swiper-button-next" slot="button-next"></div> -->
        </swiper>
    </div>
</template>

<script>

export default {
    name: "top-print-products",
    title: "Top Print Products",
    data() {
        return {
            swiperOptions: {
                slidesPerView: 3,
                    slidesPerColumn: 2,
                    spaceBetween: 25,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                    autoplay: {
                        delay: 6000,
                        disableOnInteraction: false
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 2,
                            slidesPerColumn: 1,
                        },
                        640: {
                            slidesPerView: 2,
                            slidesPerColumn: 2,
                            spaceBetween: 7,
                        }
                    }
            }
        };
    }
};
</script>

<style lang="scss" scoped>
.swiper {
    height: auto;
    margin-left: auto;
    margin-right: auto;

    .swiper-slide {
        height: auto;
    }
}
</style>
