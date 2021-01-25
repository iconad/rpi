<template>
    <div v-if="selectedPaperFinishing">
        <ul>
            <li class="relative text-sm border p-3 w-full mb-1" v-for="(fin, i) in selectedPaperFinishing" :key="i">
                <span v-if="fin.name.toLowerCase() === 'round corner'">
                    <span class="font-medium">{{fin.name}}</span> with
                    <span class="text-gray-600">→</span>
                    {{fin.options.size}}
                    <span class="text-gray-600">→</span>
                    <span class="font-medium" v-for="(opt, s) in fin.options" :key="s">
                        <span class="uppercase" v-for="(a,f) in opt" :key="f">
                            <span v-if="a === true"> {{f}}&nbsp;</span>
                         </span>
                    </span>


                    <span class="text-gray-700 hover:text-black pl-1 absolute flex items-center inset-y-0 left-100 cursor-pointer" @click="deleteFin(fin.name,i)">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                    </span>
                </span>
                <span v-else>
                    <span class="font-medium">{{fin.name}}</span> with
                    <span class="font-medium " v-for="(opt, s) in fin.options" :key="s">{{opt}}&nbsp</span>

                    <span class="text-gray-700 hover:text-black pl-1 absolute flex items-center inset-y-0 left-100 cursor-pointer" @click="deleteFin(fin.name,i)">
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                    </span>
                    <span class="text-red-500 text-xs font-medium">(+ {{fin.price}})</span>
                </span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        computed: {
            selectedPaperFinishing() {
                return this.$store.state.selectedPaperFinishing
            },
            isRoundCorner () {
                return this.type.toLowerCase() === 'round corner'
            }
        },
        methods: {
            deleteFin (name,index) {
                this.$store.commit("removeSelectedPaperFin", index)
                this.$emit('updated')
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
