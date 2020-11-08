<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Add Finishing</div>
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
                        <span class="text-sm font-medium mb-1">Detail</span>
                        <ValidationProvider name="form.body" rules="required">
                            <div slot-scope="{ errors }">
                                <textarea type="text" class="form-input text-lg" rows="5" v-model="form.body"></textarea>
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Video URL</span>
                            <input type="url" class="form-input text-lg" v-model="form.video_link">
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Extra Working Days</span>
                        <ValidationProvider name="form.delivery_time" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="number" min="0" class="form-input text-lg" v-model="form.delivery_time">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="mt-8">
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
        components: {
            ValidationProvider,
            ValidationObserver,
            'p-radio': PrettyRadio
        },
        data() {
            return {
                form: {
                    title: null,
                    body: null,
                    video_link: null,
                    delivery_time: null,
                },
            }
        },
        methods: {
            submitForm () {

                axios.post(`/manage/finishings`, {
                    title: this.form.title,
                    body: this.form.body,
                    video_link: this.form.video_link,
                    delivery_time: this.form.delivery_time,
                })
                .then(response => {
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Finishing',
                        text: 'Added!',
                    });
                    this.$emit('updated')
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
