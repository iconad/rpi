<template>
    <div class="container mx-auto pt-16">
        <div class="pb-12">
            <h1 class="text-3xl font-bold text-gray-800 mx-auto text-center xl:text-left pb-4 items-center ">Our Clients</h1>
        </div>

        <div class="clients-carousel">
            <template>
                <swiper class="swiper" :options="swiperOption">
                    <swiper-slide v-for="(client, index) in clients" :key="index">
                        <div class="w-full text-center">
                            <img :src="client.logo" class="h-32 h-32 mx-auto object-cover rounded-full" alt="user image">
                        </div>
                    </swiper-slide>
                    <div class="swiper-pagination clients-swiper-pagination" slot="pagination"></div>
                </swiper>
            </template>
        </div>

    </div>
</template>

<script>

  export default {
    data() {
      return {
        clients: [
            {
                id: 1,
                name: "client name",
                logo: "https://rpiuae.com/assets/images/clients/client48.jpg"
            },
            {
                id: 2,
                name: "client name",
                logo: "https://rpiuae.com/assets/images/clients/client13.jpg"
            },
            {
                id: 3,
                name: "client name",
                logo: "https://rpiuae.com/assets/images/clients/client46.jpg"
            },
            {
                id: 4,
                name: "client name",
                logo: "https://www.adnc.ae/images/adnc-logo1.jpg"
            },
            {
                id: 5,
                name: "client name",
                logo: "https://images.ctfassets.net/keh7myspeaj0/2rHSxDjOROmUXaLVfTgU1y/a95092e5c890c779b97f646a5d5cbed4/logo_en.svg"
            },
            {
                id: 6,
                name: "client name",
                logo: "https://i.ibb.co/hZ8xnmm/gap.jpg"
            },
            {
                id: 7,
                name: "client name",
                logo: "https://i.pinimg.com/564x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
            },
            {
                id: 8,
                name: "client name",
                logo: "https://i.pinimg.com/564x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
            },
            {
                id: 9,
                name: "client name",
                logo: "https://i.pinimg.com/564x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
            },
            {
                id: 10,
                name: "client name",
                logo: "https://i.pinimg.com/564x/8b/16/7a/8b167af653c2399dd93b952a48740620.jpg"
            },
        ],
        swiperOption: {
          slidesPerView: 5,
          spaceBetween: 15,
          breakpoints: {
            1024: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            }
          },
          pagination: {
            el: '.swiper-pagination',
            clickable: true
          }
        }
      }
    }
  }
</script>

<style lang="scss">
    .swiper-container {
        padding-bottom: 60px;
    }
    .clients-swiper-pagination {
        .swiper-pagination-bullet {
            width: 10px!important;
            height: 10px!important;
        }
        .swiper-pagination-bullet-active {
            background: #0C4472!important;
        }
    }
</style>
