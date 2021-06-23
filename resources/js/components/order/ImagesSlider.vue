
<template>
  <div>
      <div v-if="images.length != 0">
          <splide
            :options="options"
            ref="primary"
            @splide:moved="moved"
            >
            <splide-slide v-for="image in images" :key="image.id">
                <!-- <img :src="image.id" alt="slide.alt"> -->
                <thumb-image classess="w-full h-full object-cover" :image="image.file_name" :id="image.id"></thumb-image>
            </splide-slide>
            </splide>
            <div class="mt-3">
                <splide
                :options="secondaryOptions"
                ref="secondary"
                >
                <splide-slide v-for="image in images" :key="image.id">
                    <!-- <img :src="image.id" alt="slide.alt"> -->
                    <thumb-image classess="w-full h-full object-contain" :image="image.file_name" :id="image.id"></thumb-image>
                </splide-slide>
                </splide>
            </div>
      </div>
      <div v-else class="h-64 flex items-center justify-center">
          <!-- <span>Image not found</span> -->
        <thumb-image v-if="isProduct" classess="w-3/4 object-contain mx-auto" :image="product.media[0].file_name" :id="product.media[0].id"></thumb-image>

      </div>
  </div>
</template>
<script>

    import { Splide, SplideSlide } from '@splidejs/vue-splide';
    import ThumbImage from './../ThumbImage'

  export default {
    props: ['images'],
    components: {
        Splide,
        SplideSlide,
        ThumbImage
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
      }
    },
    mounted() {
        this.$refs.primary.sync( this.$refs.secondary.splide );
    },
    computed: {
        isProduct () {
            return this.$store.state.isProduct
        },

        product () {
            if(this.isProduct) {
                return this.$store.state.product
            }
        },
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
