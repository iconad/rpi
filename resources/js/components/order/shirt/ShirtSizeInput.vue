<template>
    <div>
        <span class="text-sm text-gray-700 block font-medium">{{variant.short_title}}</span>
        <span class="text-sm text-gray-600 block">({{variant.stock}})</span>
        <input v-on:keyup="checkShirtSizes(variant)" type="number" v-model="size" class="border w-16 mt-2 p-1 outline-none focus:outline-none text-center text-lg" :max="variant.stock" min="0" placeholder="-">
    </div>
</template>

<script>
    export default {
        props: ['variant', 'index'],
        data() {
            return {
                size: 0
            }
        },
        methods: {
            checkShirtSizes (variant) {

                let totalAmount = parseInt(variant.price) * parseInt(this.size);

                if (!this.size){
                    this.size = 0
                }

                let newVariant = {
                    id: variant.id,
                    title: variant.title,
                    sort_title: variant.short_title,
                    stock: variant.stock,
                    price: variant.price,
                    quantity: this.size,
                    total: totalAmount,
                }

                this.$emit('update-size', { size:`size${this.index}`, index:this.index, variant: newVariant })
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
