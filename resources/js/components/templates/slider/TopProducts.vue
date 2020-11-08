    <template>
    <div>
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-6">
            {{title}}
        </h2>

        <swiper class="swiper" :options="swiperOptions">
            <swiper-slide v-for="(category,i) in categories" :key="i">
                <div class="inner">
                    <products-slider :products="category.products"></products-slider>
                </div>
            </swiper-slide>
            <!-- <div class="swiper-button-prev" slot="button-prev"></div>
            <div class="swiper-button-next" slot="button-next"></div> -->
        </swiper>
    </div>
</template>

<script>

    import gql from 'graphql-tag'
    import query from "../../../../../gql/frontend/queries/TopProducts.gql";

    export default {
        name: "top-print-products",
        title: "Top Print Products",
        props: ['title', 'menu', 'rows'],
        data() {
            return {
                swiperOptions: {
                    slidesPerView: 3,
                        slidesPerColumn: this.rows,
                        spaceBetween: 25,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        },
                        autoplay: {
                            delay: 6000,
                            disableOnInteraction: true
                        },
                        breakpoints: {
                            1024: {
                                slidesPerView: 2,
                                slidesPerColumn: 2,
                            },
                            768: {
                                slidesPerView: 1,
                                slidesPerColumn: 2,
                                spaceBetween: 7,
                            }
                        }
                }
            };
        },
        apollo: {
            categories() {
                return {
                    query,
                    variables: {
                        menu: this.menu
                    },
                    update(data) {
                        return data.TopProducts;
                    },
                };
            },
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
