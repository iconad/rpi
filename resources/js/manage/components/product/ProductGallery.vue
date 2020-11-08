<template>
    <div>
        {{selectedShirt}}
    </div>
</template>

<script>
    export default {
        props: ['pid'],
        computed: {
            selectedShirt () {
                return this.$store.state.selectedShirt
            },
        }
}
</script>
