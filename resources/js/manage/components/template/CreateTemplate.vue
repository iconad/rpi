<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Create Template </div>
            <!-- <hr class="my-2"> -->
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="submitForm" >
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Title</span>
                        <ValidationProvider name="form.title" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" class="form-input" v-model="form.title">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Size</span>
                        <ValidationProvider name="form.size" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" class="form-input" v-model="form.size">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Detail (optional)</span>
                        <textarea type="text" class="form-input" placeholder="Short description" v-model="form.excerpt"></textarea>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Thumbnail</span>
                        <input type="file" @change="addImage" name="thumbnail" class="form-input text-lg">
                    </label>
                </div>

                <div v-if="loading">
                    <div class="loader"></div>
                </div>
                <div v-else class="mt-8">
                    <div class="w-32">
                        <button
                        v-if="isImage"
                        type="submit"
                        :disabled="invalid"
                        :class="invalid ? 'bg-gray-200 text-gray-700 border-gray-200 hover:border-gray-200 hover:bg-gray-200 cursor-not-allowed' : '' "
                        class="theme-button text-base font-medium"
                        >Create</button>
                        <span
                        v-else
                        class="theme-button select-none bg-gray-200 text-gray-700 border-gray-200 hover:border-gray-200 hover:bg-gray-200 cursor-not-allowed"
                        >Create</span>
                    </div>
                </div>

            </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>

    import PrettyRadio from 'pretty-checkbox-vue/radio';

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, oneOf } from 'vee-validate/dist/rules';

    extend('required', {
        ...required,
        message: 'This field is required'
    });


    export default {
        props: ['cid'],
        components: {
            ValidationProvider,
            ValidationObserver,
            'p-radio': PrettyRadio
        },
        data() {
            return {
                form: {
                    title: null,
                    excerpt: null,
                    size: null,
                    image: null,
                },
                loading: false,
                isImage: false,
            }
        },
        methods: {
            addImage(e) {
                this.isImage = true
                var fileReader = new FileReader()
                fileReader.readAsDataURL(e.target.files[0]);
                fileReader.onload = (e) => {
                    this.form.image = e.target.result;
                }
                this.form.image = e.target.files[0];
            },
            submitForm () {
                this.loading = true
                axios.post(`/manage/template-categories/${this.cid}/templates`, {
                    title: this.form.title,
                    size: this.form.size,
                    excerpt: this.form.excerpt,
                    thumbnail: this.form.image,
                })
                .then(response => {
                    this.$swal({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        timer: 3000,
                        icon: "success",
                        title: 'Template',
                        text: 'has been added!',
                    });
                    this.$emit('updated')
                    this.loading = false
                })
            },
        },

    }
</script>
