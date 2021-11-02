<template>
    <div>

        {{selectedsize}}

    <input list="paperList1" class="form-input capitalize" name="paper" placeholder="Select Size" @change="onSelectSize">

    <datalist id="paperList1">
        <option v-for="item in data" :key="item.id" :value="`${item.region} / ${item.type} / ${item.portrait} / ${item.landscape} / ${item.unit}`" />
    </datalist>

    </div>
</template>

<script>
    export default {
        props: ['data', 'selectedsize', 'method'],
        methods: {
            onSelectSize () {
                console.log('here')
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
