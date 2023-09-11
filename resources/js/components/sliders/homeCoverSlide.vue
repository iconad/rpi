<template>
    <div>
        <a :href="slide.link" v-if="slide.product == null">
            <thumb-image classess="w-full h-22rem object-cover" :image="slide.media[0].file_name" :id="slide.media[0].id"></thumb-image>
        </a>
        <a :href="`/products/${slide.product.slug}`" v-else>
            <thumb-image classess="w-full h-22rem object-cover" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
        </a>
    </div>
</template>

<script>

    import ThumbImage from './../ThumbImage'

    export default {
        props: ['slide'],
        components: {
            ThumbImage
        },
        computed: {
            firstMedia (){
                return this.slide.product.media.filter(e => {
                    if(e.collection_name === 'covers') {
                        return e
                    }
                })
            },
        },
    }
</script>

<style lang="scss" scoped>

</style>
