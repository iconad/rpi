<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Add Option</div>
            <!-- <hr class="my-2"> -->
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="submitForm">
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Title</span>
                        <ValidationProvider name="form.title" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" class="form-input text-lg" v-model="form.title">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Price</span>
                        <input type="number" class="form-input text-lg" v-model="form.price">
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Extra Working Days</span>
                        <input type="number" min="0" class="form-input text-lg" v-model="form.days">
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Size</span>
                        <ValidationProvider name="form.size" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" class="form-input text-lg" placeholder="15x10cms" v-model="form.size">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block relative">
                        <span class="text-sm font-medium mb-1">Type</span>
                        <ValidationProvider name="form.type" rules="required">
                            <div class="relative">
                                <select class="form-input text-lg capitalize" v-model="form.type">
                                    <option v-for="(type, i) in types" :key="i">
                                        {{ type }}
                                    </option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                </div>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                 <div class="form-element">
                    <label class="w-full block text-left">
                        <span class="text-sm font-medium mb-2 block">Selection Type </span>
                        <input type="checkbox" class="form-input w-5 h-5" v-model="form.selection_type">
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Thumbnail</span>
                        <input type="file" @change="addImage" name="image" class="form-input text-lg">
                    </label>
                </div>
                <div v-if="loading">
                    <div class="loader"></div>
                </div>
                <div v-else class="mt-8">
                    <div class="w-32">
                        <button
                        type="submit"
                        :disabled="invalid"
                        :class="invalid ? 'bg-gray-200 text-gray-700 border-gray-200 hover:border-gray-200 hover:bg-gray-200 cursor-not-allowed' : '' "
                        class="theme-button text-base font-medium"
                        >Add</button>
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
        props: ['printid'],
        components: {
            ValidationProvider,
            ValidationObserver,
            'p-radio': PrettyRadio
        },
        data() {
            return {
                form: {
                    title: null,
                    price: 0,
                    days: 0,
                    size: null,
                    type: 'front side',
                    selection_type: false,
                    image: null
                },
                loading: false,
                types: ['front side', 'back side', 'sleeves']
            }
        },
        methods: {
            addImage(e) {
                var fileReader = new FileReader()
                fileReader.readAsDataURL(e.target.files[0]);
                fileReader.onload = (e) => {
                    this.form.image = e.target.result;
                }
                this.form.image = e.target.files[0];
            },
            submitForm () {
                this.loading = true
                axios.post(`/manage/printing/${this.printid}/options`, {
                    title: this.form.title,
                    price: this.form.price,
                    days: this.form.days,
                    type: this.form.type,
                    selection_type: this.form.selection_type,
                    size: this.form.size,
                    image: this.form.image,
                })
                .then(response => {
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Option',
                        text: 'Added!',
                    });
                    this.$emit('updated')
                    this.loading = false
                })
            },
        },

    }
</script>

<style lang="scss">
.pretty .state label:before, .pretty .state label:after {
    top: 0px!important;
}
</style>
