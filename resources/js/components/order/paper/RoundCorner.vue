<template>
    <div>
        <div class="text-xl font-semibold text-gray-900">Select Finishing Options
            <small class="text-theme-red-light font-medium text-base">Additional charges and days apply</small>
        </div>
        <div class=" my-5 grid grid-cols-1">
            <div>
                <div class="font-medium mb-1 capitalize text-gray-700">Round corner sizes</div>
                <multiselect v-model="size" :options="sizes"></multiselect>
            </div>
        </div>
        <div class=" my-5">
            <div
            class="border rounded p-3  text-gray-800">

                <div class="my-8 w-18rem h-18rem mx-auto relative">
                    <div class="absolute bottom-100 right-0 w-full text-center">
                        <span class="text-lg font-semibold text-primary-500">0mm</span>
                    </div>
                    <div class="absolute text-xs font-semibold bottom-0 p-8 right-0 w-full text-center">
                        <span class="text-theme-red">+</span>
                        <span>{{price}} AED</span>
                        <span class="text-theme-red font-normal">(+ {{day}} Biz Days)</span>
                    </div>
                    <div class="absolute left-0 top-0 h-full w-full flex items-center justify-end ml-12">
                        <span class="text-lg font-semibold text-primary-500">0mm</span>
                    </div>
                    <div class="absolute bottom-100 right-100">
                        <pretty-checkbox p-bigger color="primary" v-model="corners.tl"></pretty-checkbox>
                    </div>
                    <div class="absolute bottom-100 left-100">
                        <pretty-checkbox p-bigger color="primary" v-model="corners.tr"></pretty-checkbox>
                    </div>
                    <div class="absolute top-100 right-100">
                        <pretty-checkbox p-bigger color="primary" v-model="corners.bl"></pretty-checkbox>
                    </div>
                    <div class="absolute top-100 left-100">
                        <pretty-checkbox p-bigger color="primary" v-model="corners.br"></pretty-checkbox>
                    </div>
                    <div
                    class="inside-box w-64 h-64 ml-4 mt-4 mx-auto border-4 border-primary-500 absolute"
                    :class="[
                        corners.tl ? 'rounded-tl-xl' : '',
                        corners.tr ? 'rounded-tr-xl' : '',
                        corners.br ? 'rounded-br-xl' : '',
                        corners.bl ? 'rounded-bl-xl' : '',
                    ]"
                    ></div>
                </div>

            </div>
            <!-- box -->

        </div>
        <div class="text-center">
            <button @click="add" class="px-4 py-2 bg-primary-500 text-white rounded">Confirm</button>
        </div>
    </div>
</template>

<script>

    import Multiselect from 'vue-multiselect'
    import PrettyCheckbox from 'pretty-checkbox-vue/check';

    export default {
        props: ['type'],
        components: {Multiselect,PrettyCheckbox},
        data() {
            return {
                corners: {
                    tl: false,
                    tr: false,
                    bl: false,
                    br: false,
                },
                size: '3R',
                sizes: ['3R', '4R', '5R', '6R', '7R'],
                price: 120,
                day: 2,

            }
        },
        methods: {
            add (val) {
                this.$emit('added')
                this.slide = val
                const data = {
                    name: this.type,
                    price: this.price,
                    days: this.day,
                    options:
                    {
                        type: this.slide.title,
                        size: this.size,
                        corners: this.corners,
                    }
                }
                this.$store.dispatch("dipatchSelectedPaperFinishing", data)
            }
        },
    }

</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style lang="scss" scoped>
.pretty {
    margin-right: 0px;
}
</style>
