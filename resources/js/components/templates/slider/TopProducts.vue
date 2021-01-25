    <template>
    <div>
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-6">
            {{title}}
        </h2>
        <swiper class="swiper" :options="swiperOptions">
            <template v-if="menu == 13 || menu == 14">
                <!-- if Personalized Gifts or T-Shirts -->
                <swiper-slide class="inner" v-for="(pro,i) in subProducts" :key="i">
                    <products-slider :menu="menu" :products="pro"></products-slider>
                </swiper-slide>
            </template>
            <template v-else>
            <swiper-slide v-for="(category,i) in categories" :key="i">
                <div class="inner">
                    <products-slider :menu="menu" :products="category.products"></products-slider>
                </div>
            </swiper-slide>
            </template>
        </swiper>

    </div>
</template>

<script>

    import ProductsSlider from './ProductsSlider'

    import gql from 'graphql-tag'
    import query from "../../../../../gql/frontend/queries/TopProducts.gql";
    import featuredSubQuery from "../../../../../gql/frontend/queries/FeaturedSubCategories.gql";

    export default {
        props: ['title', 'menu', 'columns', 'rows'],
        components: {
            ProductsSlider
        },
        data() {
            return {
                swiperOptions: {
                    simulateTouch:false,
                    slidesPerView: this.columns,
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
        computed: {
            subProducts () {
                if (!this.$apollo.queries.subcategories.loading) {
                    return this.subcategories.map(s => s.products)
                }
            }
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
            subcategories() {
                return {
                    query: featuredSubQuery,
                    variables: {
                        menu: this.menu
                    },
                    update(data) {
                        return data.FeaturedSubCategories;
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
