<template>
    <div>
        <!-- {{filterOptions}} -->
        <div class="lg:flex items-center mt-2 mb-6">
            <div>
                <div class="text-2xl font-semibold text-gray-900 capitalize">{{print.title}}
                    <span class="inline-block mx-1 font-light">|</span>
                    <small class="text-gray-800 font-medium">Select Print Area</small>
                </div>
            </div>
            <div class="ml-auto lg:mt-0 mt-5 flex items-center lg:flex-none space-x-3">
                <button class="px-4 py-1 text-sm hover:bg-primary-500 text-gray-100 rounded border-2 border-primary-500 bg-transparent transition ease-linear duration-200 text-primary-500 hover:text-white font-semibold focus:outline-none" @click="cancel">Cancel</button>

                <button class="px-4 py-1 bg-primary-500 text-sm text-gray-100 rounded border-2 border-primary-500 hover:bg-transparent transition ease-linear duration-200 hover:text-primary-500 font-semibold focus:outline-none" @click="added">Apply</button>
            </div>
        </div>

        <p v-if="error" class="text-theme-red-light mt-1 px-1 text-sm font-medium">You must select one opiton</p>

        <div v-for="(options, b) in filterOptions" :key="b">
            <div class="text-xl font-semibold text-gray-800 capitalize mt-3 mb-1 block">{{ b }}</div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-5">
                <label v-for="(option, a) in options" :key="a">
                    <input v-model="selection.sleaves" :value="option" class="hidden" v-if="option.selection_type" type="checkbox" :name="a">
                    <input v-model="selection.options[option.type]" :value="option" class="hidden" v-else type="radio" :name="b" @click="uncheckRadio(option)">
                    <span class="block text-center p-3 border rounded cursor-pointer hover:bg-gray-200 transition ease-linear duration-200 shirt">
                        <single-shirt :shirt="option"></single-shirt>
                        <span class="block font-medium text-base mt-4">{{option.title}}</span>
                        <span class="block w-16 mx-auto my-2 h-px bg-gray-400"></span>
                        <span class="block font-medium text-lg text-sec">{{option.size}}</span>
                    </span>
                </label>
            </div>
        </div>
    </div>
</template>

<script>
    import singleShirt from './Shirt'

    export default {
        props: ['print'],
        components: {
            singleShirt
        },
        data() {
            return {
                additional: [],
                additional_grouped: [],
                selection: {
                    print: this.print,
                    options: {},
                    sleaves: []
                },
                error: false,
                optionTypes: []

            }
        },
        computed: {
            filterOptions () {
                return _.groupBy(this.print.options, function(n) {
                    return n.type;
                });
            },
            final: function(){
                return this.additional.concat(this.additional_grouped);
            },
            isFloak () {
                return this.type.toLowerCase() === 'floak'
            },
            isMetalicFoil () {
                return this.type.toLowerCase() === 'emboss'
            },
            isColorPrinting () {
                return this.type.toLowerCase() === 'punch hole'
            },
        },
        methods: {
            uniqueCheck(e){
                this.additional_grouped = [];
                if (e.target.checked) {
                    this.additional_grouped.push(e.target.value);
                }
            },
            uncheckRadio: function(option) {
                // if (val === this.previouslySelected) {
                    // this.selected = false;
                // }
                // this.previouslySelected = this.selected;
            },

            added () {
                if(Object.values(this.selection.options).length < 1 || this.selection.sleaves.length < 1) {
                    this.error = true
                }else{
                    this.$emit('added')
                    this.$store.commit("mutateSelectedShirtPrinting", this.selection)
                }
            },
            cancel () {
                this.$emit('added')
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
