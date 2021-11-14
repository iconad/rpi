<template>
    <div>
        <button @click="showModal" class="action-button-warning">Edit</button>

        <modal :name="`modal-${data.id}`" height="auto" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-xl mb-3 capitalize font-semibold">Edit Material </div>
                <!-- <hr class="my-2"> -->
                <ValidationObserver v-slot="{ invalid,passes }">
                    <form @submit.prevent="submitForm">

                        <div class="w-full block relative form-element">
                            <label class="inline-block mb-1 text-base text-gray-600">Title</label>
                            <ValidationProvider name="name" rules="required">
                                <div slot-scope="{ errors }">
                                    <input type="text" v-model="newMaterial.title" class="form-input text-base font-normal">
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-100 left-0 w-full">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </div>

                        <div class="w-full block relative form-element">
                            <label class="inline-block mb-1 text-base text-gray-600">Min - Max Order (cm)</label>
                            <div class="flex space-x-4">
                                <div class="w-full">
                                    <input type="text" v-model="newMaterial.min" placeholder="Minimum Order (cm)" class="form-input text-base font-normal">
                                </div>
                                <div class="w-full">
                                    <input type="text" v-model="newMaterial.max" placeholder="Maximum Order (cm)" class="form-input text-base font-normal">
                                </div>
                            </div>
                        </div>

                        <div class="w-full block relative form-element">
                            <label class="inline-block mb-1 text-base text-gray-600">Excerpt</label>
                            <textarea rows="3" v-model="newMaterial.excerpt" class="form-input text-base font-normal"></textarea>
                        </div>

                        <div class="w-full block relative form-element">
                            <label class="inline-block mb-1 text-base text-gray-600">Detail</label>
                            <textarea rows="6" v-model="newMaterial.body" class="form-input text-base font-normal"></textarea>
                        </div>

                        <div class="form-element">
                            <button
                            type="submit"
                            :disabled="invalid"
                            :class="invalid ? 'bg-gray-200 text-gray-700 border-gray-200 hover:border-gray-200 hover:bg-gray-200 cursor-not-allowed' : '' "
                            class="theme-button text-base font-medium"
                            >Update</button>
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
        props: ['data'],
        components: {
            ValidationProvider,
            ValidationObserver,
        },
        data() {
            return {
                excerpt: this.data.excerpt,
                body: this.data.body,
                error: false,
                newMaterial: {
                    title: this.data.title,
                    excerpt: this.data.excerpt,
                    body: this.data.body,
                    min: this.data.min,
                    max: this.data.max,
                }
            }
        },
        computed: {
            selectedMaterial: {
                get() {
                    return this.data;
                },
                set(newValue) {
                    this.newMaterial = newValue;
                }
            },
        },
        methods: {
            submitForm () {

                axios.put(`/manage/materials/${this.data.id}`, {
                    title: this.newMaterial.title,
                    min: this.newMaterial.min,
                    max: this.newMaterial.max,
                    excerpt: this.newMaterial.excerpt,
                    body: this.newMaterial.body,
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Excerpt',
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
