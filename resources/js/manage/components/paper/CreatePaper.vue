<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Add Paper</div>
            <!-- <hr class="my-2"> -->
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="submitForm">
                <div>
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Title / Name</span>
                        <ValidationProvider name="form.title" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" class="form-input text-lg" v-model="form.title">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div>
                    <label class="w-full block relative">
                        <span class="text-sm font-medium mb-1">Type</span>
                        <ValidationProvider name="form.type" rules="required">
                            <div class="relative">
                                <select class="form-input text-lg capitalize" v-model="form.side">
                                    <option class="capitalize" v-for="side in sides" :key="side">
                                        {{ side }}
                                    </option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                </div>
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
                    side: "front side",
                },
                sides: ["front side", "back side", 'both sides'],
            }
        },
        methods: {
            submitForm () {

                axios.post(`/manage/papers`, {
                    title: this.form.title,
                    side: this.form.side,
                })
                .then(response => {
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Paper',
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
