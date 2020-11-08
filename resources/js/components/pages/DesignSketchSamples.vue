<template>
    <div>
        <button class="text-primary text-lg theme-link font-medium" @click="seeExamples">{{linktext}}</button>
            <modal  width="900" height="auto" name="see-examples" class="relative">
                <div class="p-3">
                    <div class="text-xl font-semibold text-gray-900 mb-5">{{title}}</div>
                    <splide :options="options" has-slider-wrapper class="pages-overlay-splider">
                        <splide-slide v-for="(slide, i) in slides" :key="i">
                            <div>
                                <img :src="slide.src" alt="slide.title" class="w-full">
                            </div>
                            <div class="text-lg font-medium text-gray-900">{{slide.title}}</div>
                        </splide-slide>
                    </splide>
                </div>
            </modal>
    </div>
</template>

<script>
    import { Splide, SplideSlide } from '@splidejs/vue-splide';
    export default {
        props: ['linktext',],
        components: {
            Splide,
            SplideSlide,
        },
        data() {
            return {
                title: "Design Sketch Samples",
                options: {
                    rewind : false,
                    perPage : 1,
                    gap : '0rem',
                    arrows: true,
                    pagination: true
			  },
			  slides:[
                  {
                      id: 1,
                      title: "Wedding Card design showing the Design Sketch submission, and its final outcome.",
                      src: "https://www.printarabia.ae/img/static/design/pro-design-service/design-carousel/carousel-img-1.png",
                  },
                  {
                      id: 2,
                      title: "Business Card design showing the Design Sketch submission, and its final outcome.",
                      src: "https://www.printarabia.ae/img/static/design/pro-design-service/design-carousel/carousel-img-2.png",
                  },
                  {
                      id: 3,
                      title: "A4 Flyer design showing the Design Sketch submission, and its final outcome.",
                      src: "https://www.printarabia.ae/img/static/design/pro-design-service/design-carousel/carousel-img-3.png",
                  },
                  {
                      id: 3,
                      title: "A1 Poster design showing the Design Sketch submission, and its final outcome.",
                      src: "https://www.printarabia.ae/img/static/design/pro-design-service/design-carousel/carousel-img-4.png",
                  },
              ],
            }
        },
        methods: {
            seeExamples () {
                this.$modal.show('see-examples');
            }
        }
    }
</script>

<style lang="scss">
.splide__pagination {
    left: 95%;
    bottom: 2.4em;
}
.splide__pagination__page {
    background: #0C4472;
    &.is-active {
        background: #ef476f;
    }
}
</style>
