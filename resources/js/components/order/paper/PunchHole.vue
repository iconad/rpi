<template>
    <div>
        <div class="text-xl font-semibold text-gray-900">Select Finishing Options
            <small class="text-theme-red-light font-medium text-base">Additional charges and days apply</small>
        </div>
        <div class=" my-5 grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-5">
            <div
            class="border rounded p-3 hover:bg-primary-500 text-gray-800 hover:text-white everything-white-on-hover cursor-pointer"
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
                slide: null,
                slides: [
                    {
                        image: "https://www.printarabia.ae/img/finishing/default.png",
                        name: "3mm 2",
                        price: 100,
                        bizdays: 1
                    },
                    {
                        image: "https://www.printarabia.ae/img/finishing/default.png",
                        name: "5mm 2",
                        price: 140,
                        bizdays: 2
                    },
                    {
                        image: "https://www.printarabia.ae/img/finishing/default.png",
                        name: "8mm 2",
                        price: 190,
                        bizdays: 1
                    }
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
