<template>
    <div class="container mx-auto">
        <div class="clients-carousel">
            <template>
                <swiper class="swiper flex items-center" :options="swiperOption">
                    <swiper-slide v-for="(client, index) in clients" :key="index">
                        <div class="w-full text-center h-32 flex items-center">
                            <img :src="client.logo" alt="user image">
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
                logo: "http://127.0.0.1:8000/images/home/1.png"
            },
            {
                id: 2,
                name: "client name",
                logo: "http://127.0.0.1:8000/images/home/2.png"
            },
            {
                id: 3,
                name: "client name",
                logo: "http://127.0.0.1:8000/images/home/3.png"
            },
            {
                id: 4,
                name: "client name",
                logo: "http://127.0.0.1:8000/images/home/4.png"
            },
            {
                id: 5,
                name: "client name",
                logo: "http://127.0.0.1:8000/images/home/5.png"
            },
            {
                id: 6,
                name: "client name",
                logo: "http://127.0.0.1:8000/images/home/6.png"
            },
            {
                id: 7,
                name: "client name",
                logo: "http://127.0.0.1:8000/images/home/7.png"
            },
            {
                id: 8,
                name: "client name",
                logo: "http://127.0.0.1:8000/images/home/8.png"
            },
            {
                id: 9,
                name: "client name",
                logo: "http://127.0.0.1:8000/images/home/9.png"
            },

        ],
        swiperOption: {
          slidesPerView: 6,
          spaceBetween: 15,
          loop: true,
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
