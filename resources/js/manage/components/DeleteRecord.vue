<template>
    <div>
        <button @click="confirmDelete" class="action-button-danger">Delete</button>
    </div>
</template>

<script>
    export default {
        props: ['model', 'model2', 'model3', 'id', 'id2', 'id3'],
        data() {
            return {
                loading: false
            }
        },
        computed: {
            api () {
                if(this.model3) {
                    return `/manage/${this.model}/${this.id}/${this.model2}/${this.id2}/${this.model3}/${this.id3}`
                } else if (this.model2) {
                    return `/manage/${this.model}/${this.id}/${this.model2}/${this.id2}`
                }else{
                    return `/manage/${this.model}/${this.id}`
                }
            }
        },
        methods: {
            confirmDelete () {
                this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0C4472',
                    cancelButtonColor: '#f05252',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.deleteRecord()
                    }
                });
            },
            deleteRecord () {
                axios.delete(this.api)
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Record',
                        text: 'successfully deleted!',
                    });
                })
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
