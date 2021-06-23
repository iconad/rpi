<template>
    <div>
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-3 md:gap-6">
            <div
                v-for="(shirt, i) in products"
                :key="i"
                @click="select(shirt.id)"
                class="border p-2 text-center rounded hover:border-gray-500 transition ease-linear duration-200 cursor-pointer">
                <div>
                    <single-shirt :shirt="shirt"></single-shirt>
                </div>
                <div class="text-sm font-medium text-gray-800"> {{shirt.color}} </div>
            </div>
            <!-- box -->
        </div>
    </div>
</template>

<script>
    import singleShirt from './Shirt'
    export default {
        props: ['products'],
        components: {
            singleShirt
        },
        methods: {
            select (pid) {
                this.$emit('added', pid)
                // this.$store.commit("mutateSelectedShirtColor", pid)
                this.$store.dispatch("getProduct", pid)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
