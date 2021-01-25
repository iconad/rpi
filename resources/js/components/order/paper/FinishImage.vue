<template>
    <div>
        <div>
            <thumb-image v-if="slide.media.length != 0" classess="rounded-lg" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
        </div>
        <div class="text-lg font-semibold text-center mt-3 mb-2 capitalize">{{slide.title}}</div>
        <div class="text-sm font-semibold text-center">
            <span class="text-theme-red">+</span>
            <span>{{slide.price}} AED</span>
            <span class="text-theme-red font-normal">(+ {{slide.days}} Biz Days)</span>
        </div>
    </div>
</template>

<script>
    import ThumbImage from '../../../components/ThumbImage'

    export default {
        props: ['slide'],
        components:{
            ThumbImage
        },
        computed: {
            firstMedia (){
                return this.slide.media.filter(e => {
                    if(e.collection_name === 'images') {
                        return e
                    }
                })
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
