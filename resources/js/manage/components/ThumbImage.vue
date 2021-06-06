<template>
    <div>
        <!-- <img :src="`${publicUrl}${id}/conversions/${smallImage}`" class="w-full" alt="image"> -->
        <v-lazy-image
            :class="classess"
            :src="`${publicUrl}${id}/${image}`"
            :src-placeholder="`${publicUrl}${id}/conversions/${smallImage}`"
        />
    </div>
</template>

<script>
    export default {
        props: ['image', 'id', 'classess'],
        computed: {
            // mediumImage() {
            //     return this.image.replace(/(\.[\w\d_-]+)$/i, "-thumb$1");
            // },
            smallImage() {
                return this.image.replace(/(\.[\w\d_-]+)$/i, "-thumb.jpg");
            },
            publicUrl() {
                return this.$store.state.publicUrl;
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
