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
            class="border rounded p-3 hover:bg-primary-500 text-gray-800 hover:text-white everything-white-on-hover cursor-pointer"
            v-for="(slide, i) in finishing.options"
            :key="i"
            @click="add(slide)">
                <finish-image :slide="slide"></finish-image>
            </div>
            <!-- box -->

        </div>
    </div>
</template>

<script>

    import FinishImage from './FinishImage'

    import Multiselect from 'vue-multiselect'

    export default {
        props: ['type', 'finishing'],
        components: {
            FinishImage,
            Multiselect
        },
        data() {
            return {
                page: 'front only',
                option: 'shiny gold foil',
                slide: null,
                pages: ['front only', 'back only'],
                options: ['shiny gold foil', 'shiny silver foil'],
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
                    price: this.slide.price,
                    days: this.slide.days,
                    options:
                    {
                        page: this.page,
                        option: this.option,
                        type: this.slide.title,
                    }
                }
                this.$store.dispatch("dipatchSelectedPaperFinishing", data)
            }
        },
    }

</script>

<style lang="scss" scoped>

</style>
