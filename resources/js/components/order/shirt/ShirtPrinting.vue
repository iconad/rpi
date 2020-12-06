<template>
    <div>
        <div class="lg:flex items-center">
            <div>
                <div class="text-2xl font-semibold text-gray-900 capitalize">{{type}}
                    <span class="inline-block mx-1 font-light">|</span>
                    <small class="text-gray-800 font-medium">Select Print Area</small>
                </div>
            </div>
            <div class="ml-auto lg:mt-0 mt-5 flex items-center lg:flex-none space-x-3">
                <button class="px-4 py-2 hover:bg-primary-500 text-gray-100 rounded border-2 border-primary-500 bg-transparent transition ease-linear duration-200 text-primary-500 hover:text-white font-semibold focus:outline-none" @click="cancel">Cancel</button>

                <button class="px-4 py-2 bg-primary-500 text-gray-100 rounded border-2 border-primary-500 hover:bg-transparent transition ease-linear duration-200 hover:text-primary-500 font-semibold focus:outline-none" @click="added">Apply</button>
            </div>
        </div>

        <p v-if="error" class="text-theme-red-light mt-1 px-1 text-sm font-medium">You must select one opiton</p>

        <div class="my-5" v-for="(print, i) in printing" :key="i">
            <div class="text-xl font-semibold text-gray-800 capitalize">{{print.name}}</div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-5 mt-2">
                <label v-for="(option, a) in print.options" :key="a">
                    <input v-model="selection.sleaves" :value="option" class="hidden" v-if="print.multiple" type="checkbox" :name="a">
                    <input v-model="selection.options[print.name]" :value="option" class="hidden" v-else type="radio" :name="i">
                    <span class="block text-center p-3 border rounded cursor-pointer hover:bg-gray-200 transition ease-linear duration-200 shirt">
                        <img :src="option.image" alt="image">
                        <span class="block font-medium text-base mt-4">{{option.name}}</span>
                        <span class="block w-16 mx-auto my-2 h-px bg-gray-400"></span>
                        <span class="block font-medium text-lg text-sec">{{option.size}}</span>
                    </span>
                </label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['type'],
        data() {
            return {
                selection: {
                    name: this.type,
                    options: {},
                    sleaves: []
                },
                error: false,
                printing:[
                    {
                        name: "frontside",
                        multiple: false,
                        options: [
                            {
                                image: "https://backend-api.printarabia.ae/storage/tshirt/print-area-options/2f6e718d3d7f94154693d355ac9cf2a55db117be93e5f.webp",
                                name: "1/4th",
                                size: "15x10cms"
                            },
                            {
                                image: "https://backend-api.printarabia.ae/storage/tshirt/print-area-options/66b2f29065582176c580da2f4a5edee95db117d4aac74.webp",
                                name: "half",
                                size: "30x20cms"
                            },
                            {
                                image: "https://backend-api.printarabia.ae/storage/tshirt/print-area-options/399cae017ca442533fdf6175e7c324cc5db117e0415be.webp",
                                name: "full",
                                size: "30x40cms"
                            },
                        ],
                    },
                    {
                        name: "backside",
                        multiple: false,
                        options: [
                            {
                                image: "https://backend-api.printarabia.ae/storage/tshirt/print-area-options/01f976e46757f034d93144ae3116ad365db117be478e2.webp",
                                name: "1/4th",
                                size: "15x10cms"
                            },
                            {
                                image: "https://backend-api.printarabia.ae/storage/tshirt/print-area-options/f0a21f641cf78f5e68a2583837aa59fa5db117d4a5765.webp",
                                name: "half",
                                size: "30x20cms"
                            },
                            {
                                image: "https://backend-api.printarabia.ae/storage/tshirt/print-area-options/7dd0b32613be939c72640051f845c83f5db117e0414a2.webp",
                                name: "full",
                                size: "30x40cms"
                            },
                        ],
                    },
                    {
                        name: "Sleeves",
                        multiple: true,
                        options:[
                            {
                                image: "https://backend-api.printarabia.ae/storage/tshirt/print-area-options/6fda8c1b53d93772aa716104becf893d5db117ee49f46.webp",
                                name: "1/4th",
                                size: "15x10cms"
                            },
                            {
                                image: "https://backend-api.printarabia.ae/storage/tshirt/print-area-options/b649565c10e9134e77bc67764a0bf28c5db117f9d4b52.webp",
                                name: "half",
                                size: "30x20cms"
                            }
                        ]
                    }
                ],
            }
        },
        computed: {
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
