<template>
    <div>

        <div class="flex items-center relative text-sm lg:text-base font-medium z-10">

            <!-- <div class="logo hidden lg:block">
                <a href="/">
                    <img class="absolute h-16 left-0 top-0" src="../../../../public/assets/images/logoprintoa.png"
                        alt="logo" />
                </a>
            </div> -->
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
                            <img class="mx-auto h-12 left-0 top-0" src="../../../../public/assets/images/logoprintoa.png"
                                alt="logo" />
                        </a>
                    </div>
                    <div class="w-auto p-2">
                        <span class="text-gray-600">
                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M5 5a5 5 0 0110 0v2A5 5 0 015 7V5zM0 17a20 20 0 0110-3c4 0 7 1 10 3v3H0v-3z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="category-wrapper w-full lg:flex items-center border lg:border-0 mt-3 lg:mt-0"
                    v-if="isNavbar || window.width > 1024">
                    <div class="category p-3 lg:p-5 hover:text-sec" v-for="(menu, i) in menus" :key="i">
                        <a v-if="menu.link" :href="menu.link"
                            class="theme-link hover:border-transparent whitespace-nowrap">{{ menu.title }}</a>

                        <a v-else :href="`/categories/${menu.slug}`"
                            class="theme-link hover:border-transparent whitespace-nowrap">{{ menu.title }}</a>

                        <div v-if="menu.title.toLowerCase() == 'info'"
                            class="sub-category-wrapper lg:absolute left-0 top-100 lg:rounded bg-gray-50 w-full">
                            <div
                                class="relative inline-block border h-full border-t-0 border-l-0 border-b-0 w-full md:w-1/2 lg:w-auto">

                                <template>
                                    <div class="sub-category w-full" v-for="(category, ci) in categories" :key="ci">
                                        <span
                                            class="p-3 block hover:bg-gray-200 hover:text-black transition ease-in-out duration-100 text-gray-800 hover:text-black transition ease-in-out duration-100 text-gray-800">
                                            {{ category.title }}
                                            <!-- <span v-if="category.label" :class="`inline-bock px-3 py-px font-medium rounded-lg shadow text-xs text-gray-100 ${category.label.color} text-xs px-2 py-1 `">{{category.label.title}}</span> -->
                                        </span>
                                        <div
                                            class="pl-4 lg:pl-0 products-wrapper lg:absolute left-100 top-0 products-warpper-height w-auto h-full">
                                            <div class="product" v-for="(page, pi) in category.pages" :key="pi">
                                                <a class="p-3 whitespace-nowrap block hover:bg-gray-200 hover:text-black transition ease-in-out duration-100 text-gray-800"
                                                    :href="`/pages/${page.slug}`"> {{ page.title }}
                                                    <!-- <span v-if="product.label" :class="`inline-bock px-3 py-px font-medium rounded-lg shadow text-xs text-gray-100 ${product.label.color} text-xs px-2 py-1 `">{{product.label.title}}</span> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                    </div>
                    <!-- <div class="category p-3 lg:p-5 hover:text-sec">
                        <a class="theme-link hover:border-transparent whitespace-nowrap cursor-pointer">info</a>
                        <div  class="sub-category-wrapper lg:absolute left-0 top-100 lg:rounded bg-white w-full">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam nostrum placeat ipsam corrupti odit nisi, perspiciatis molestiae natus fugiat nemo, maiores quibusdam architecto dolorum aut, ab beatae commodi repellendus autem.
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
    </div>
</template>

<script>

import NavbarGallery from './MainNavbarGallery'
import ThumbImage from '../ThumbImage'

import gql from 'graphql-tag'
import categoriesQuery from "../../../../gql/frontend/queries/pagescategories.gql";
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
        publicUrl() {
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
        categories() {
            return {
                query: categoriesQuery,
                update(data) {
                    return data.pagescategories;
                },
            };
        },
    }
};
</script>

<style lang="scss" scoped></style>
