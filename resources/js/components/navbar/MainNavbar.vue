<template>
    <div>
        <div class="flex items-center relative text-sm lg:text-base font-medium z-10">
            <div class="logo hidden lg:block">
                <a href="/">
                    <img class="absolute h-16 left-0 top-0" src="../../../../public/assets/images/logo.png" alt="logo" />
                </a>
            </div>
            <!-- logo -->
            <div v-if="$apollo.queries.menus.loading" class="w-full flex items-center justify-center">
                Loading Menu ....
            </div>
            <div v-else class="navbar lg:ml-48 w-full">
                <div class="flex items-center justify-around lg:hidden">
                    <div class="w-auto p-2 cursor-pointer text-gray-600" @click="isNavbar = !isNavbar">
                        <span class="text-3xl" v-if="!isNavbar">☰</span>
                        <span class="text-3xl" v-if="isNavbar">╳</span>
                    </div>
                    <div class="w-full pt-3 text-center">
                        <a href="/">
                            <img class="mx-auto h-12 left-0 top-0" src="../../../../public/assets/images/logo.png" alt="logo" />
                        </a>
                    </div>
                    <div class="w-auto p-2">
                        <span class="text-gray-600">
                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M5 5a5 5 0 0110 0v2A5 5 0 015 7V5zM0 17a20 20 0 0110-3c4 0 7 1 10 3v3H0v-3z"/></svg>
                        </span>
                    </div>
                </div>
                <div class="category-wrapper w-full lg:flex items-center border lg:border-0 mt-3 lg:mt-0" v-if="isNavbar || window.width > 1024">
                    <div class="category p-3 lg:p-5 hover:text-sec"  v-for="(menu, i) in menus" :key="i">
                        <span class="whitespace-nowrap">{{menu.title}}</span>
                            <div class="sub-category-wrapper lg:absolute left-0 top-100 lg:rounded bg-white w-full">
                                <div class="relative inline-block border h-full border-t-0 border-l-0 border-b-0 w-full md:w-1/2 lg:w-auto">
                                <div class="sub-category w-full" v-for="(category, ci) in menu.categories" :key="ci" >
                                    <span class="p-3 block hover:bg-gray-200 hover:text-black transition ease-in-out duration-100 text-gray-800 hover:text-black transition ease-in-out duration-100 text-gray-800">{{category.title}}</span>
                                    <div class="pl-4 lg:pl-0 products-wrapper lg:absolute left-100 top-0 products-warpper-height w-auto h-full lg:border lg:border-t-0 lg:border-l-0 lg:border-b-0">
                                        <div ref="navHeight">
                                            <div class="product" v-for="(product, pi) in category.products" :key="pi" >
                                                <a class="p-3 whitespace-nowrap block hover:bg-gray-200 hover:text-black transition ease-in-out duration-100 text-gray-800" :href="`/products/${product.slug}`">{{product.title}}</a>
                                                <div class="product-info">
                                                    <div class="text-center sm:absolute left-100 hidden lg:block lg:w-650px xl:w-850px top-0">
                                                        <h2 class="mt-5 text-2xl font-semibold text-gray-900">{{product.title_two}}</h2>
                                                        <div v-if="product.packages.length != 0" class="text-2xl font-semibold text-sec-500">
                                                            <span v-if="product.packages[0].prices[0].size">
                                                              {{product.packages[0].prices[0].size.region}}  ●
                                                            </span>
                                                            {{product.packages[0].quantity}} Copies >
                                                            {{product.packages[0].prices[0].price}} AED
                                                            <span class="text-gray-800 font-light">(Incl. VAT)</span>
                                                        </div>
                                                        <div class="points-grid grid grid-cols-3 mx-6 mt-5 border border-gray-900 border-b-0 border-l-0 border-r-0">
                                                            <div class="point p-5" v-for="(point, poi) in product.points.slice(0, 3)" :key="poi">
                                                                <div v-if="point.media.length != 0">
                                                                    <thumb-image classess="mx-auto" :image="point.media[0].file_name" :id="point.media[0].id"></thumb-image>
                                                                </div>
                                                                <img v-else src="/assets/images/good-point.png" alt="icon" class="mx-auto">
                                                                <div class="text-base font-semibold mt-2">{{point.title}}</div>
                                                                <div class="text-sm text-gray-700">{{point.body}}</div>
                                                            </div>
                                                        </div>
                                                        <!-- points grid -->
                                                        <div class="images-grid mt-2">
                                                            <navbar-gallery :media="product.media"></navbar-gallery>
                                                        </div>
                                                        <!-- images grid -->

                                                        <div class="order flex items-center justify-between mt-4 mx-12">
                                                            <a :href="`/products/${product.slug}`" class="theme-link">View Product</a>
                                                            <a :href="`/products/${product.slug}/order`" class="red-button py-2 rounded">Order</a>
                                                        </div>
                                                        <!-- images grid -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- sub-category -->
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import NavbarGallery from './MainNavbarGallery'
    import ThumbImage from '../ThumbImage'

    import gql from 'graphql-tag'
    import menus from "../../../../gql/frontend/queries/menus.gql";

    import VueMatchHeights from 'vue-match-heights';
    Vue.use(VueMatchHeights);

    export default {
        components: {
            ThumbImage,
            NavbarGallery
        },
        data() {
            return {
                navbarHeight: false,
                menus: [],
                isNavbar: false,
                window: {
                    width: 0,
                    height: 0
                }
            }
        },
        computed: {
            publicUrl () {
                return this.$store.state.publicUrl
            }
        },

        created() {
            window.addEventListener('resize', this.handleResize);
            this.handleResize();
        },
        destroyed() {
            window.removeEventListener('resize', this.handleResize);
        },
        methods: {
            handleResize() {
                this.window.width = window.innerWidth;
                this.window.height = window.innerHeight;
            }
            // getHeight() {
            //     var x = document.getElementsByClassName("example");
            //     console.log(x);
            // },
            // matchHeight () {
                // this.navbarHeight = this.$refs.navHeight.clientHeight;

                // console.log(this.$refs.navHeight.offsetHeight)
            // }
        },
        apollo: {
            menus() {
                return {
                    query: menus,
                    update(data) {
                        return data.menus;
                    },
                };
            },
        }
};
</script>

<style lang="scss" scoped></style>
