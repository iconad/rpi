<template>
    <div>
        <span class="py-1 text-info-500 mb-1 text-base rounded block">{{file.title}} </span>
    </div>
</template>

<script>
    export default {
        props:['file'],
        computed: {
            media() {
                return this.file.media[0].file_name
            },
            id () {
                return this.file.media[0].id
            },
            publicUrl() {
                return this.$store.state.publicUrl;
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
