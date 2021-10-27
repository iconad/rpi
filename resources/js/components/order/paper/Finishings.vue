<template>
    <div>
        <div class="text-xl font-semibold text-gray-900">Select {{type}} Options
            <small class="text-theme-red-light font-medium text-base">Additional charges and days apply</small>
        </div>
        <div class=" my-5 grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-5">
            <div
            class="border rounded p-3 hover:bg-primary-500 text-gray-800 hover:text-white everything-white-on-hover cursor-pointer"
            v-for="(slide, i) in finishing"
            :key="i"
            @click="add(slide)">
                <template v-if="slide.opiton != null">
                    <finish-image :slide="slide.option" :price="slide.new_price" :days="slide.new_days"></finish-image>
                </template>
                <template v-else>
                    <div class="font-medium text-center capitalize">No finishing available!</div>
                </template>
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
         components: {FinishImage, Multiselect},
        data() {
            return {
                slide: null,
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
                    price: this.slide.new_price,
                    days: this.slide.new_days,
                    options:
                    {
                        type: this.slide.option.title
                    }
                }
                this.$store.dispatch("dipatchSelectedPaperFinishing", data)
            }
        },
    }

</script>

<style lang="scss" scoped>

</style>
