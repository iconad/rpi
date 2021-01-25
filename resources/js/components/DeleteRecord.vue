<template>
    <div>
        <span @click="confirmDelete" :class="`text-red-500 font-medium hover:underline cursor-pointer ${classess}`">Delete</span>
    </div>
</template>

<script>
    export default {
        props: ['classess','model', 'model2', 'model3', 'id', 'id2', 'id3'],
        data() {
            return {
                loading: false
            }
        },
        computed: {
            api () {
                if(this.model3) {
                    return `/profile/${this.model}/${this.id}/${this.model2}/${this.id2}/${this.model3}/${this.id3}`
                } else if (this.model2) {
                    return `/profile/${this.model}/${this.id}/${this.model2}/${this.id2}`
                }else{
                    return `/profile/${this.model}/${this.id}`
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
                        position: 'top-end',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 3000,
                        icon: "success",
                        title: 'Record',
                        text: 'successfully deleted',
                    });
                })
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
