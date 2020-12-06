<template>
    <div>
        <button @click="showModal" class="action-button-warning">Edit</button>


        <modal :name="`modal-${label.id}`" height="auto" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-xl mb-3 capitalize font-semibold">Add Label </div>
                <!-- <hr class="my-2"> -->
                <form @submit.prevent="submitForm">
                    <div class="w-full block relative form-element">
                        <input type="text" v-model="name" class="form-input text-base font-normal" placeholder="Type Label ">
                        <p v-if="error" class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-100 left-0 w-full">This is field is required</p>
                    </div>
                    <div class="w-full block relative form-element mt-8">
                        <div class="w-64 bg-gray-100 grid grid-cols-4 gap-1">
                            <label v-for="(clr, i) in colors" :key="i" :class="`relative ${clr.color} h-12 cursor-pointer hover:${clr.hover}`">
                                <span
                                    :class="selectedColor === clr.color ? 'block' : 'hidden' "
                                    class="absolute w-full h-full left-0 top-0 flex items-center justify-center">
                                    <svg class="fill-current w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                </span>
                                <input class="hidden" type="radio" name="colors" v-model="color" :value="clr.color" >
                            </label>
                        </div>
                    </div>
                    <div class="form-element">
                        <button
                        type="submit"
                        class="theme-button text-base font-medium"
                        >Update</button>
                    </div>
                </form>
            </div>
        </modal>
    </div>
</template>

<script>

    export default {
        props: ['label'],
        data() {
            return {
                name: this.label.title,
                error: false,
                selectedColor: this.label.color,
                colors: [
                    {
                        color: 'bg-red-600',
                        hover: 'bg-red-700'
                    },
                    {
                        color: 'bg-yellow-300',
                        hover: 'bg-yellow-400'
                    },
                    {
                        color: 'bg-red-400',
                        hover: 'bg-red-500'
                    },
                    {
                        color: 'bg-orange-400',
                        hover: 'bg-orange-500'
                    },
                    {
                        color: 'bg-green-400',
                        hover: 'bg-green-500'
                    },
                    {
                        color: 'bg-teal-400',
                        hover: 'bg-teal-500'
                    },
                    {
                        color: 'bg-purple-400',
                        hover: 'bg-purple-500'
                    },
                    {
                        color: 'bg-pink-400',
                        hover: 'bg-pink-500'
                    }
                ]
            }
        },
        watch: {
            name: function () {
                if(this.name != null) {
                    this.name.length === 0 ? this.error = true : this.error = false
                }
            },
        },
        computed: {
            title: {
                get() {
                    return this.label.title;
                },
                set(newValue) {

                }
            },
            color: {
                get() {
                    return this.label.color;
                },
                set(newValue) {
                    this.selectedColor = newValue;
                }
            },
        },
        methods: {
            submitForm () {

                axios.put(`/manage/labels/${this.label.id}`, {
                    title: this.name,
                    color: this.selectedColor,
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Label',
                        text: 'Successfully updated!',
                    });
                })

                this.$modal.hide(`modal-${this.label.id}`)

            },
            showModal () {
                this.$modal.show(`modal-${this.label.id}`)
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
