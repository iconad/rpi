<template>
    <div>
        <span v-if="!color" @click="addModal" class="font-semibold inline-block action-button-warning">Add Color</span>
        <div v-else @click="addModal" class="hover:bg-gray-100 cursor-pointer font-medium w-64 rounded-full overflow-hidden flex items-center justify-between border" :style="`border-color: ${selectedColorHex}`">
            <span class="inline-block pl-2 text-sm">Change color</span>
            <span class="inline-block p-5 w-32" :style="`background: ${selectedColorHex}`"></span>
        </div>


        <modal :name="`add-color`" height="auto" width="400" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-lg mb-3 capitalize font-semibold">Add color to <span class="border-b inline-block pb-px"> {{title}}</span> </div>
                <form @submit.prevent="submitForm">
                    <div class="w-full block relative form-element mt-5">
                        <div class="w-full grid grid-cols-1 gap-y-4">
                            <label v-for="(color, i) in colors" :key="i" :class="`relative rounded-lg shadow cursor-pointer flex items-center justify-between font-medium text-gray-700 hover:bg-${color.hover}`">
                                <span class="inline-block pl-2">{{color.title}}</span>
                                <span
                                    class="transition"
                                    :class="selectedColor.id === color.id ? 'opacity-100' : 'opacity-0' ">
                                    <svg class="fill-current w-6 h-6 text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>

                                <span :style="`background: ${color.hex}`" class="p-5 w-10"></span>
                                <input class="hidden" type="radio" name="colors" v-model="selectedColor" :value="color" >
                            </label>
                        </div>
                    </div>
                    <div class="form-element flex items-center justify-between">
                        <button
                            v-if="selectedColor"
                            type="submit"
                            class="theme-button text-base font-medium"
                            >
                            <span v-if="color">Update </span>
                            <span v-else>Add </span>
                        </button>
                        <span v-if="color" @click="removeColor" class="action-button-danger"> Remove Color </span>

                    </div>
                </form>
            </div>
        </modal>
    </div>
</template>

<script>
    import gql from 'graphql-tag'
    import colors from "../../../../../../gql/queries/colors.gql";

    export default {
        props: ['pid', "vid", "title", 'color'],
        data() {
            return {
                selectedColor: '',
                selectedColorHex: null,
                detach: false
            }
        },
        watch: {
            selectedColor: function (value) {
                if (value) {
                    this.selectedColorHex = value.hex
                }else{
                    this.selectedColorHex = this.color
                }
            }
        },
        mounted () {
            console.log(this.color)
            if (this.selectedColor) {
                this.selectedColorHex = this.selectedColor.hex
            }else{
                this.selectedColorHex = this.color
            }

        },
        computed: {
            message () {
                return this.color ? "Updated" : "Added"
            },
            successMessage () {
                if (this.detach) {
                    return "Removed!"
                }else{
                    return "Added!"
                }
            },
        },
        methods: {
            removeColor () {

                this.detach = true
                this.submitForm()

            },
            submitForm () {

                axios.post(`/manage/products/${this.pid}/variants/${this.vid}/add-color-to-variant`, {
                    color: this.selectedColor.id,
                    detach: this.detach,
                })
                .then(response => {
                    this.$emit('updated')
                    this.selectedColorHex = this.selectedColor.hex
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: "Color",
                        text: this.successMessage,
                    });
                })
                this.$modal.hide(`add-color`)

            },
            addModal () {
                this.$modal.show(`add-color`)
            }
        },
        apollo: {
            colors() {
                return {
                    query: colors,
                    update(data) {
                        return data.colors;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>
