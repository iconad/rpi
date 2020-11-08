<template>
    <div>
        <span @click="changeStatus" v-if="status === 1" class="action-button-success">Published</span>
        <span @click="changeStatus" v-else class="action-button-danger">Draft</span>
    </div>
</template>

<script>
    export default {
        props: ['data', 'status'],
        data() {
            return {
                loading: false
            }
        },
        methods: {
            changeStatus () {
                axios.put(`/manage/menu/change-status/${this.data.id}`, {
                    title: this.name
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Status',
                        text: 'Successfully updated!',
                    });
                })
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
