<template>
    <div class="h-22rem overflow-hidden">
        <swiper class="swiper" :options="swiperOptions">

            <swiper-slide v-for="(slide, i) in slider" :key="i">
                <div class="w-full inner">
                    <home-cover-slide :slide="slide"></home-cover-slide>
                </div>
            </swiper-slide>

        </swiper>
    </div>
</template>

<script>

    import gql from 'graphql-tag'
    import sliders from "../../../../gql/queries/slidersbytype.gql";

    import homeCoverSlide from './homeCoverSlide'

    export default {
        components: {
            homeCoverSlide
        },
        data() {
            return {
                sliderType: "home-page",
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
        apollo: {
            slider() {
                return {
                    query: sliders,
                    variables: {
                        type: this.sliderType
                    },
                    update(data) {
                        return data.slidersbytype;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
