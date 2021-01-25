<template>
    <div>
        <a class="action-button-info cursor-pointer" download :href="`${publicUrl}/${id}/${media}`">Download</a>
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
