<template>
    <div>
        <div class="grid grid-cols-2 gap-5 mx-12">
            <div v-for="(media, i) in gallery" :key="i">
                <thumb-image classess="w-full" :image="media.file_name" :id="media.id"></thumb-image>
            </div>
        </div>
    </div>
</template>

<script>

    import ThumbImage from './../ThumbImage'

    export default {
        props: ['media'],
        components: {
            ThumbImage
        },
        computed: {
            gallery () {
                return this.media.filter(e => {
                    if(e.collection_name === 'product-gallery') {
                        return e
                    }
                })
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
