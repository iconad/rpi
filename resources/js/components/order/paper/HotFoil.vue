<template>
    <div>
        <div class="text-xl font-semibold text-gray-900">Select Finishing Options
            <small class="text-theme-red-light font-medium text-base">Additional charges and days apply</small>
        </div>
        <div class=" my-5 grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-10">
            <div>
                <div class="font-medium mb-1 capitalize text-gray-700">Type of pages</div>
                <multiselect v-model="page" :options="pages"></multiselect>
            </div>
            <!-- box -->
            <div>
                <div class="font-medium mb-1 capitalize text-gray-700">Select Option</div>
                <multiselect v-model="option" :options="options"></multiselect>
            </div>
            <!-- box -->
        </div>
        <div class=" my-5 grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-5">
            <div
            class="border rounded p-3 hover:bg-primary text-gray-800 hover:text-white everything-white-on-hover cursor-pointer"
            v-for="(slide, i) in slides"
            :key="i"
            @click="add(slide.name)">
                <div>
                    <img class="rounded-lg" :src="slide.image" alt="image">
                </div>
                <div class="text-lg font-semibold text-center mt-3 mb-2 capitalize">{{slide.name}}</div>
                <div class="text-sm font-semibold text-center">
                    <span class="text-theme-red">+</span>
                    <span>{{slide.price}} AED</span>
                    <span class="text-theme-red font-normal">(+ {{slide.bizdays}} Biz Days)</span>
                </div>
            </div>
            <!-- box -->

        </div>
    </div>
</template>

<script>

    import Multiselect from 'vue-multiselect'

    export default {
        props: ['type'],
        components: {Multiselect},
        data() {
            return {
                page: 'front only',
                option: 'shiny gold foil',
                slide: null,
                pages: ['front only', 'back only'],
                options: ['shiny gold foil', 'shiny silver foil'],
                slides: [
                    {
                        image: "https://backend-api.printarabia.ae/storage/finishing-option-uploads/uploads/3cbd46d6e0492ca8f88c96c7fa8f27cc5dc207c7137cb.webp",
                        name: "Full",
                        price: 100,
                        bizdays: 1
                    },
                    {
                        image: "https://www.printarabia.ae/img/finishing/foiling-three-quarter.jpg",
                        name: "Three Quarter",
                        price: 140,
                        bizdays: 2
                    },
                    {
                        image: "https://www.printarabia.ae/img/finishing/foiling-half.jpg",
                        name: "Half",
                        price: 190,
                        bizdays: 1
                    },
                    {
                        image: "https://www.printarabia.ae/img/finishing/foiling-a-quarter.jpg",
                        name: "A Quarter",
                        price: 200,
                        bizdays: 4
                    },
                ]
            }
        },
        computed: {
            selectedPaperFinishing() {
                const data = this.$store.state.selectedPaperFinishing
            }
        },
        methods: {
            add (val) {
                this.$emit('added')
                this.slide = val
                const data = {
                    name: this.type,
                    options:
                    {
                        page: this.page,
                        option: this.option,
                        type: this.slide
                        }
                }
                this.$store.dispatch("dipatchSelectedPaperFinishing", data)
            }
        },
    }

</script>

<style lang="scss" scoped>

</style>
