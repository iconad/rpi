<template>
    <div>
        <button @click="showModal" class="action-button-warning">Edit</button>
        <button @click="removeLabel" class="mr-3 action-button-danger">Remove</button>

        <modal name="edit-label" height="auto" width="400" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-lg mb-3 capitalize font-semibold">Change <span class="border-b inline-block pb-px">{{title}}</span> label </div>
                <form @submit.prevent="submitForm">
                    <div class="w-full block relative form-element mt-5">
                        <div class="w-full bg-gray-100 grid grid-cols-1 gap-1">
                            <label v-for="(lbl, i) in labels" :key="i" :class="`relative ${lbl.color} h-10 rounded-lg shadow cursor-pointer flex items-center justify-between p-3 font-medium text-gray-100 hover:${lbl.hover}`">
                                <span>{{lbl.title}}</span>
                                <span
                                    :class="selectedLabel == lbl.id ? 'block' : 'hidden' ">
                                    <svg class="fill-current w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <input class="hidden" type="radio" name="colors" v-model="selectedLabel" :value="lbl.id" >
                            </label>
                        </div>
                    </div>
                    <div class="form-element">
                        <button
                        type="submit"
                        class="theme-button text-base font-medium"
                        >Add</button>
                    </div>
                </form>
            </div>
        </modal>
    </div>
</template>

<script>
    import gql from 'graphql-tag'
    import labels from "../../../../../../gql/queries/labels.gql";

    export default {
        props: ['id', "title", "label", "model", "refresh"],
        data() {
            return {
                selectedLabel: this.label.id,
                message: "Updated!"
            }
        },
        methods: {
            removeLabel () {
                this.$swal({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0C4472',
                    cancelButtonColor: '#f05252',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        const remove = 'remove'
                        this.submitForm(remove)
                    }
                });
            },
            submitForm (val) {
                if(val === 'remove'){
                    this.selectedLabel = 0
                    this.message = "Removed!"
                }
                axios.put(`/manage/${this.model}/${this.id}/assign-label`, {
                    label: this.selectedLabel,
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Label',
                        text: this.message,
                    });
                })
                this.$modal.hide('edit-label')
                if(this.refresh) {
                    window.location.reload();
                }
            },
            showModal () {
                this.$modal.show('edit-label')
            }
        },
        apollo: {
            labels() {
                return {
                    query: labels,
                    update(data) {
                        return data.labels;
                    },
                };
            },
        }
    }
</script>


<style lang="scss" scoped>

</style>
