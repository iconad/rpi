<template>
    <div>
        <button @click="showModal" class="action-button-warning">Edit</button>


        <modal :name="`modal-${data.id}`" height="auto" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-xl mb-3 capitalize font-semibold">Add Color </div>
                <!-- <hr class="my-2"> -->
                <ValidationObserver v-slot="{ invalid,passes }">
                    <form @submit.prevent="submitForm">
                        <div class="w-full block relative form-element">
                            <label class="inline-block mb-1 text-base text-gray-600">Title</label>
                            <ValidationProvider name="name" rules="required">
                                <div slot-scope="{ errors }">
                                    <input type="text" v-model="name" class="form-input text-base font-normal">
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-100 left-0 w-full">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </div>
                        <div class="w-full block relative form-element mt-8">
                            <div class="w-64 bg-gray-100 grid grid-cols-4 gap-1">
                                <photoshop-picker v-model="selectedColor    " />
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

    import { Photoshop } from 'vue-color'

    extend('required', {
        ...required,
        message: 'This field is required'
    });

    export default {
        props: ['data'],
        components: {
            ValidationProvider,
            ValidationObserver,
            'photoshop-picker': Photoshop
        },
        data() {
            return {
                name: this.data.title,
                error: false,
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
            selectedColor: {
                get() {
                    return this.data.hex;
                },
                set(newValue) {

                }
            },
            color: {
                get() {
                    return this.data.hex;
                },
                set(newValue) {
                    this.selectedColor = newValue;
                }
            },
        },
        methods: {
            submitForm () {

                axios.put(`/manage/colors/${this.data.id}`, {
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
                        title: 'Color',
                        text: 'Successfully updated!',
                    });
                })

                this.$modal.hide(`modal-${this.data.id}`)

            },
            showModal () {
                this.$modal.show(`modal-${this.data.id}`)
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
