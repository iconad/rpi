
<template>
  <div>
      <splide
      :options="options"
      ref="primary"
      @splide:moved="moved"
    >
      <splide-slide v-for="slide in slides" :key="slide.src">
        <img :src="slide.src" alt="slide.alt">
      </splide-slide>
    </splide>
    <div class="mt-3">
        <splide
        :options="secondaryOptions"
        ref="secondary"
        >
        <splide-slide v-for="slide in slides" :key="slide.src">
            <img :src="slide.src" alt="slide.alt">
        </splide-slide>
        </splide>
    </div>
  </div>
</template>
<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide';

  export default {
    components: {
        Splide,
        SplideSlide,
    },
    data() {
      return {
        options: {
            rewind: true,
            gap   : '1rem',
            lazyLoad: 'nearby',
        },
        secondaryOptions: {
            type        : 'slide',
            rewind      : true,
            gap         : '1rem',
            pagination  : false,
            fixedWidth  : 197,
            fixedHeight : 120,
            cover       : true,
            focus       : 'center',
            isNavigation: true,
            updateOnMove: true,
        },
        count: 0,
        slides: [
            {
                src: "https://assets.printarabia.ae/product-uploads/images/36c476eb27032b58188413b6f8f65dad5f055fa324be2.png",
                alt: "image"
            },
            {
                src: "https://assets.printarabia.ae/product-uploads/images/876226daf6e142bf7589affdc4ac946b5f055fa3a5d76.png",
                alt: "image"
            },
            {
                src: "https://assets.printarabia.ae/product-uploads/images/d09e2dbb5f7c78b45d4308f94bbf5e625f055fa2e5674.png",
                alt: "image"
            },
        ],
      }
    },
    mounted() {
        this.$refs.primary.sync( this.$refs.secondary.splide );
    },
    methods: {
        moved( splide, newIndex ) {
            // console.log( 'moved', newIndex );
        },
    },
  }
</script>

<style lang="scss" scoped>

</style>
