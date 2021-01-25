<template>
    <div>
        <ul class="list-none">
            <li class="relative p-3 w-full mb-1" v-for="(print, i) in selectedShirtPrinting" :key="i">
                <span>
                    <span class="font-semibold capitalize">{{print.print.title}}</span>
                    <ul v-for="(opt, a) in print.options" :key="a">
                        <li class="font-semibold capitalize">
                            {{a}}
                            <span class="font-normal"> {{opt.size}} ({{opt.title}}) </span>
                        </li>
                    </ul>
                    <ul v-if="print.sleaves.length > 0">
                        <li class="font-semibold capitalize"> Sleeves </li>
                        <ul>
                            <li class="capitalize" v-for="sleeve in print.sleaves" :key="sleeve.id"> {{sleeve.title}} ({{sleeve.size}}) </li>
                        </ul>
                    </ul>
                </span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['printings'],
        computed: {
            selectedShirtPrinting() {
                return this.printings
            },
        },
    }
</script>

<style lang="scss" scoped>

</style>
