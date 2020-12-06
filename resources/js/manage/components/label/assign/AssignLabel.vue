<template>
    <div>
        <button @click="addModal" class="text-xs font-semibold block action-button-warning">Assign Label</button>


        <modal :name="`add-label-${id}`" height="auto" width="400" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-lg mb-3 capitalize font-semibold">Adding label to <span class="border-b inline-block pb-px">{{title}}</span> </div>
                <form @submit.prevent="submitForm">
                    <div class="w-full block relative form-element mt-5">
                        <div class="w-full bg-gray-100 grid grid-cols-1 gap-1">
                            <label v-for="(label, i) in labels" :key="i" :class="`relative ${label.color} h-10 rounded-lg shadow cursor-pointer flex items-center justify-between p-3 font-medium text-gray-100 hover:${label.hover}`">
                                <span>{{label.title}}</span>
                                <span
                                    :class="selectedLabel === label.id ? 'block' : 'hidden' ">
                                    <svg class="fill-current w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <input class="hidden" type="radio" name="colors" v-model="selectedLabel" :value="label.id" >
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
        props: ['id', "title", "model"],
        data() {
            return {
                selectedLabel: '',
            }
        },
        methods: {
            submitForm () {

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
                        text: 'Added!',
                    });
                })
                this.$modal.hide(`add-label-${this.id}`)
            },
            addModal () {
                this.$modal.show(`add-label-${this.id}`)
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
