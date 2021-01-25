<template>
    <div>
        <thumb-image classess="w-full" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
    </div>
</template>

<script>
    import thumbImage from '../../ThumbImage'
    export default {
        props: ['shirt'],
        components: {
            thumbImage
        },
        computed: {
            firstMedia (){
                return this.shirt.media.filter(e => {
                    if(e.collection_name === 'images') {
                        return e
                    }
                })
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
