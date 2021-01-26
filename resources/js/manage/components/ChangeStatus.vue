<template>
    <div>
        <span @click="confirmChange"
        :class="currentStatus ? 'action-button-success' : 'action-button-info'">
        {{textStatus}}
        </span>
    </div>
</template>

<script>
    export default {
        props: ['model','id', 'status', 'model2', 'id2'],
        data() {
            return {
                loading: false,
                watchStatus: this.status,
                currentStatus: this.status
            }
        },
        watch: {
            watchStatus: function () {
                this.watchStatus === 0 ? this.currentStatus = false : this.currentStatus = true
            }
        },
        computed: {

            nextStatus () {
                if(!this.currentStatus) {
                    return "Publish"
                }else{
                    return "Unpublish"
                }
            },
            textStatus() {
                if(this.currentStatus) {
                    return "Published"
                }else{
                    return "Draft"
                }
            },
            api () {
                if(this.model2) {
                    return `/manage/${this.model}/${this.id}/${this.model2}/${this.id2}/change-status`;
                }else{
                    return `/manage/${this.model}/${this.id}/change-status`
                }
            }
        },
        methods: {
            confirmChange () {
                this.$swal({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0C4472',
                    cancelButtonColor: '#f05252',
                    confirmButtonText: `Yes, ${this.nextStatus} it!`
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.changeStatus()
                    }
                });
            },
            changeStatus () {
                axios.put(`${this.api}`)
                .then(response => {
                    this.watchStatus === 0 ? this.watchStatus = 1 : this.watchStatus = 0
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
