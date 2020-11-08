<template>
    <div>
        <button @click="addModal" class="text-sm font-semibold block theme-link">Add New Menu</button>


        <modal name="add-menu" height="auto" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-xl mb-3 capitalize font-semibold">Add Menu</div>
                <!-- <hr class="my-2"> -->
                 <ValidationObserver v-slot="{ invalid,passes }">
                <form @submit.prevent="submitForm" class="form-element flex items-center">
                    <label class="w-full block relative">
                        <ValidationProvider name="paper.value.size" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="name" class="form-input text-base font-normal" placeholder="Type Menu Name...">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-100 left-0 w-full">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                    <div class="ml-4 w-32">
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
                name: null
            }
        },
        methods: {
            submitForm () {

                axios.post(`/manage/menu`, {
                    title: this.name
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Menu',
                        text: 'Added!',
                    });
                })

                this.$modal.hide('add-menu')
                this.name = null

            },
            addModal () {
                this.$modal.show('add-menu')
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
