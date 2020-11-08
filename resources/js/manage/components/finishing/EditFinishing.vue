<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Edit Paper</div>
            <!-- <hr class="my-2"> -->
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="submitForm">
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Title</span>
                        <ValidationProvider name="editingTable.data.title" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" class="form-input text-lg" v-model="editingTable.data.title">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Detail</span>
                        <ValidationProvider name="editingTable.data.body" rules="required">
                            <div slot-scope="{ errors }">
                                <textarea type="text" class="form-input text-lg" rows="5" v-model="editingTable.data.body"></textarea>
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Video URL</span>
                        <input type="url" class="form-input text-lg" v-model="editingTable.data.video_link">
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Extra Working Days</span>
                        <ValidationProvider name="editingTable.data.delivery_time" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="number" min="0" class="form-input text-lg" v-model="editingTable.data.delivery_time">
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
                        >Update</button>
                    </div>
                </div>

            </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>
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
        },
        data() {
            return {
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

                axios.put(`/manage/finishings/${this.editingTable.data.id}`, {
                    title: this.editingTable.data.title,
                    body: this.editingTable.data.body,
                    video_link: this.editingTable.data.video_link,
                    delivery_time: this.editingTable.data.delivery_time,
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Finishing',
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
