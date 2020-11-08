<template>
    <div>
        <div class="flex flex-wrap md:flex-no-wrap items-center">
            <div class="w-48 text-lg font-medium text-gray-800">
                Prices shown for:
            </div>
            <div class="w-full">
                <multiselect class="customulti w-full border border-gray-500" v-model="value" :options="options"></multiselect>
            </div>
        </div>
        <div class="paper-price-table mt-10">
            <product-paper-price-table></product-paper-price-table>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    export default {
        components: { Multiselect },
        data () {
            return {
                value: "list",
                options: ['list', 'of', 'options']
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss" scoped>

</style>
