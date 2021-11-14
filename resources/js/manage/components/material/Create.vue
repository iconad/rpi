<template>
    <div>
        <button @click="addModal" class="text-sm font-semibold block theme-link">Add New Material</button>


        <modal name="add-material" height="auto" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-xl mb-3 capitalize font-semibold">Add Material </div>
                <!-- <hr class="my-2"> -->
                 <ValidationObserver v-slot="{ invalid,passes }">
                <form @submit.prevent="submitForm">
                    <div class="w-full block relative form-element">
                        <label class="inline-block mb-1 text-base text-gray-600">Title</label>
                        <ValidationProvider name="name" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="title" class="form-input text-base font-normal">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-100 left-0 w-full">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </div>

                    <div class="w-full block relative form-element">
                        <label class="inline-block mb-1 text-base text-gray-600">Min - Max Order (cm)</label>
                        <div class="flex space-x-4">
                            <div class="w-full">
                                <input type="text" v-model="min" placeholder="Minimum Order (cm)" class="form-input text-base font-normal">
                            </div>
                            <div class="w-full">
                                <input type="text" v-model="max" placeholder="Maximum Order (cm)" class="form-input text-base font-normal">
                            </div>
                        </div>
                    </div>

                    <div class="w-full block relative form-element">
                        <label class="inline-block mb-1 text-base text-gray-600">Excerpt</label>
                        <textarea rows="3" v-model="excerpt" class="form-input text-base font-normal"></textarea>
                    </div>

                    <div class="w-full block relative form-element">
                        <label class="inline-block mb-1 text-base text-gray-600">Detail</label>
                        <textarea rows="6" v-model="body" class="form-input text-base font-normal"></textarea>
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
            ValidationObserver,
        },
        data() {
            return {
                title: null,
                min: null,
                max: null,
                excerpt: null,
                body: null,
            }
        },
        methods: {
            submitForm () {

                axios.post(`/manage/materials`, {
                    title: this.title,
                    min: this.min,
                    max: this.max,
                    experpt: this.experpt,
                    body: this.body
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        type: 'success',
                        title: 'Material',
                        text: 'Added!',
                    });
                })

                this.$modal.hide('add-material')
                this.name = null

            },
            addModal () {
                this.$modal.show('add-material')
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
