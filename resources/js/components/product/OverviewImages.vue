<template>
    <div>
        <div class="grid grid-cols-3 gap-5 mx-12" v-viewer="viewerOptions">
            <div v-for="(image, i) in images.slice(0, 3)" :key="i"  v-on:click="openImageModal" class="hover:shadow-xl transition ease-linear duration-300 cursor-pointer relative">
                <span class="bg-black text-white absolute right-0 bottom-0 p-2 z-10">
                    <svg class="fill-current w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492 236H276V20c0-11.046-8.954-20-20-20s-20 8.954-20 20v216H20c-11.046 0-20 8.954-20 20s8.954 20 20 20h216v216c0 11.046 8.954 20 20 20s20-8.954 20-20V276h216c11.046 0 20-8.954 20-20s-8.954-20-20-20z"/></svg>
                </span>
                <thumb-image classess="w-full" :image="image.file_name" :id="image.id"></thumb-image>
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
                // images: [
                //     {
                //         src: 'https://assets.printarabia.ae/product-uploads/images/03c7779088c2513e100a9fe1170ecd515ea7cfa927d4e.jpg',
                //         href: 'https://assets.printarabia.ae/product-uploads/images/03c7779088c2513e100a9fe1170ecd515ea7cfa927d4e.jpg',
                //         alt: 'image'
                //     },
                //     {
                //         src: 'https://assets.printarabia.ae/product-uploads/images/03c7779088c2513e100a9fe1170ecd515ea7cfa927d4e.jpg',
                //         href: 'https://assets.printarabia.ae/product-uploads/images/03c7779088c2513e100a9fe1170ecd515ea7cfa927d4e.jpg',
                //         alt: 'image'
                //     },
                //     {
                //         src: 'https://assets.printarabia.ae/product-uploads/images/03c7779088c2513e100a9fe1170ecd515ea7cfa927d4e.jpg',
                //         href: 'https://assets.printarabia.ae/product-uploads/images/03c7779088c2513e100a9fe1170ecd515ea7cfa927d4e.jpg',
                //         alt: 'image'
                //     },

                // ]
            }
        },
        methods: {
            openImageModal () {
                // this.$modal.show('my-first-modal');
                console.log('yes')
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
