<template>
    <div v-if="selectedShirtPrinting">
        <ul>
            <li class="relative text-sm border p-3 w-full mb-1" v-for="(print, i) in selectedShirtPrinting" :key="i">
                <span>
                    <span class="font-medium">{{print.name}}</span>
                    <span class="text-gray-600">→</span>
                    <span v-for="(opt, a) in print.options" :key="a">
                        <span class="font-medium"> {{a}} </span>
                    <span v-if="a === 'frontside'"> / </span>
                    </span>
                    <span v-if="print.sleaves.length > 0">
                        <span v-if="Object.values(print.options).length > 1">/</span>
                        <span class="font-medium"> Sleeves </span>
                    </span>
                </span>
                <span class="text-gray-700 hover:text-black pl-1 absolute flex items-center inset-y-0 left-100 cursor-pointer" @click="deletePrintprint(print.name,i)">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                </span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        computed: {
            selectedShirtPrinting() {
                return this.$store.state.selectedShirtPrinting
            },
            isRoundCorner () {
                return this.type.toLowerCase() === 'round corner'
            }
        },
        methods: {
            deletePrintprint (name,index) {
                this.$store.commit("removSelectedShirtPrinting", index)
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
