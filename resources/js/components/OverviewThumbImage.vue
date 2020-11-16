<template>
    <div>
        <!-- <img :src="`${publicUrl}${id}/conversions/${mediumImage}`" class="w-full" alt="image"> -->
        <img
            :class="classess"
            :data-href="`${publicUrl}${id}/${image}`"
            :alt="image"
            :src="`${publicUrl}${id}/conversions/${mediumImage}`"
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
            mediumImage() {
                return this.image.replace(/(\.[\w\d_-]+)$/i, "-medium.jpg");
            },
            publicUrl() {
                return this.$store.state.publicUrl;
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
