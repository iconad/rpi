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
                            <img :src="client.logo" class="h-42 h-42 mx-auto object-cover rounded-full" alt="user image">

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
                logo: "https://printo.ae/assets/images/our-clients/3.png"
            },
            {
                id: 2,
                name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/4.png"
            },
            {
                id: 3,
                name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/Armani.png"
            },
            {
                id: 4,
                name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/awj.png"
            },
            {
                id: 5,
                name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/Boehringer.png"
            },
            {
                id: 6,
                name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/daralMarfa.png"
            },
            
           

               { id:16,
                logo: "https://printo.ae/assets/images/our-clients/nationalpaint.png"
            },
            {
                id: 8,
                name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/dubaiHealthcare.png"
            },
            {
                id: 9,
                name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/GAP.png"
            },
            {
                id: 10,
                name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/gfc.png"
            },
               { id:11,
                 name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/grandstores.png"
      },
            {    id:12,
                 name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/harveyNicolos.png"
      },
               { id:13,
                 name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/kingspan.png"
      },
               { id:14,
                 name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/lifco.png"
      },
               { id:15,
                 name: "client name",
                logo: "https://printo.ae/assets/images/our-clients/mamas.png"
      },
            
              { id:16,
                logo: "https://printo.ae/assets/images/our-clients/sharjahChamber.png"
      },
                { id:16,
                logo: "https://printo.ae/assets/images/our-clients/taqeef.png"
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
