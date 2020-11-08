<template>
    <div>
        <button @click="addModal" class="text-sm font-semibold block theme-link">Add New Label</button>


        <modal name="add-label" height="auto" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-xl mb-3 capitalize font-semibold">Add Label </div>
                <!-- <hr class="my-2"> -->
                 <ValidationObserver v-slot="{ invalid,passes }">
                <form @submit.prevent="submitForm">
                    <div class="w-full block relative form-element">
                        <ValidationProvider name="name" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="name" class="form-input text-base font-normal" placeholder="Type Label ">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-100 left-0 w-full">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>
                    <div class="w-full block relative form-element mt-8">
                        <div class="w-64 bg-gray-100 grid grid-cols-4 gap-1">
                            <label v-for="(clr, i) in colors" :key="i" :class="`relative bg-${clr.color} h-12 cursor-pointer hover:bg-${clr.hover}`">
                                <span
                                    :class="color === clr.color ? 'block' : 'hidden' "
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
                        :disabled="invalid"
                        :class="invalid ? 'bg-gray-200 text-gray-700 border-gray-200 hover:border-gray-200 hover:bg-gray-200 cursor-not-allowed' : '' "
                        class="theme-button text-base font-medium"
                        >Add</button>
                    </div>
                </form>
                 </ValidationObserver>
            </div>
        </modal>
    </div>
</template>

<script>

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required } from 'vee-validate/dist/rules';

    extend('required', {
        ...required,
        message: 'This field is required'
    });


    export default {
        components: {
            ValidationProvider,
            ValidationObserver
        },
        data() {
            return {
                color: 'red-600',
                name: null,
                colors: [
                    {
                        color: 'red-600',
                        hover: 'red-700'
                    },
                    {
                        color: 'yellow-300',
                        hover: 'yellow-400'
                    },
                    {
                        color: 'blue-400',
                        hover: 'blue-500'
                    },
                    {
                        color: 'orange-400',
                        hover: 'orange-500'
                    },
                    {
                        color: 'green-400',
                        hover: 'green-500'
                    },
                    {
                        color: 'teal-400',
                        hover: 'teal-500'
                    },
                    {
                        color: 'purple-400',
                        hover: 'purple-500'
                    },
                    {
                        color: 'pink-400',
                        hover: 'pink-500'
                    }
                ]
            }
        },
        methods: {
            submitForm () {

                axios.post(`/manage/labels`, {
                    title: this.name,
                    color: this.color
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        type: 'success',
                        title: 'Label',
                        text: 'Added!',
                    });
                })

                this.$modal.hide('add-label')
                this.name = null

            },
            addModal () {
                this.$modal.show('add-label')
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
