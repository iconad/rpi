<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Edit Paper</div>
            <!-- <hr class="my-2"> -->
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="submitForm">
                <div>
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Title / Name</span>
                        <ValidationProvider name="editingTable.data.title" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" class="form-input text-lg" v-model="editingTable.data.title">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div>
                    <label class="w-full block relative">
                        <span class="text-sm font-medium mb-1">Type</span>
                        <ValidationProvider name="editingTable.data.side" rules="required">
                            <div class="relative">
                                <select class="form-input text-lg capitalize" v-model="editingTable.data.side">
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
                        >Update</button>
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
                sides: ["One Side Colour", "Two Side Colours", "front side", "back side", 'both sides'],
            }
        },
        computed: {
            editingTable: {
                get: function () {
                    return this.$store.state.editingTable
                },
                set: function (value) {
                    console.log(value)
                }
            },
        },
        methods: {
            submitForm () {

                axios.put(`/manage/papers/${this.editingTable.data.id}`, {
                    title: this.editingTable.data.title,
                    side: this.editingTable.data.side,
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Paper',
                        text: 'Updated!',
                    });
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
