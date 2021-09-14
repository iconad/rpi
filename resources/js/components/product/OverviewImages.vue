<template>
    <div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mx-12" v-viewer="viewerOptions">
            <div v-for="(image, i) in images.slice(0, 3)" :key="i"  v-on:click="openImageModal" class="hover:shadow-xl transition ease-linear duration-300 cursor-pointer relative">
               
                <thumb-image classess="w-full h-full object-cover" :image="image.file_name" :id="image.id"></thumb-image>
            </div>
        </div>
    </div>
</template>

<script>
    import ThumbImage from './../OverviewThumbImage'

    export default {
        props: ['images'],
        components: {
            ThumbImage
        },
        data() {
            return {
                viewerOptions: {
                    movable: false,
                    rotatable: false,
                    scalable: false,
                    navbar: false,
                    toolbar: false,
                    title: false,
                    url: 'data-href',
                    title(image, imageData) {
                    // if want to show blank title, must use alt=" "
                    return image.alt
                    },
                },
            }
        },
        methods: {
            openImageModal () {
                this.$modal.show('my-first-modal');
                // console.log('yes')
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
