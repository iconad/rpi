<template>
    <div>
        <button @click="showModal" class="action-button-warning">Edit</button>


        <modal :name="`modal-${menu.id}`" height="auto" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-xl mb-3 capitalize font-semibold">Edit Menu</div>
                <!-- <hr class="my-2"> -->
                <form @submit.prevent="submitForm" class="form-element">
                    <label class="w-full block relative">
                        <input type="text" v-model="title" class="form-input text-base font-normal" placeholder="Update menu">
                        <p v-if="error" class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-100 left-0 w-full"> This field is required </p>
                    </label>
                    <label class="w-full block relative mt-3 flex items-center">
                        <input type="checkbox" v-model="isLinkUpdate" class="w-5 h-5">
                        <span class="text-base font-medium pt-1 inline-block ml-3">External Link </span>
                    </label>
                    <label class="w-full block relative mt-3" v-if="isLinkUpdate">
                        <ValidationProvider name="paper.value.size" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="linkUpdated" class="form-input text-base font-normal" placeholder="URL">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-100 left-0 w-full">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                    <div class="mt-4 w-32">
                        <button
                        type="submit"
                        class="theme-button text-base font-medium"
                        >Update</button>
                    </div>
                </form>
            </div>
            <span class="hidden"> {{isLink}} </span>
            <!-- {{isLink}} -->
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
        props: ['menu'],
        components: {
            ValidationProvider,
            ValidationObserver
        },
        data() {
            return {
                name: "",
                linkUpdated: "http://127.0.0.1:8000/",
                isLinkUpdate: false,
                error: false
            }
        },
        watch: {
            name: function () {
                if(this.name != null) {
                    this.name.length === 0 ? this.error = true : this.error = false
                }
            },
            isLinkUpdate: function (value) {
                if (!value) {
                    this.linkUpdated = null
                }
            },

        },
        computed: {
            title: {
                get() {
                    this.name = this.menu.title;
                    return this.menu.title;
                },
                set(newValue) {
                    this.name = newValue;
                }
            },
            link: {
                get() {
                    return this.menu.link;
                },
                set(newValue) {
                    if (!newValue) {
                        this.linkUpdated = "http://127.0.0.1:8000/"
                    }
                    this.linkUpdated = newValue;
                }
            },
            isLink() {
                if (this.menu.link) {
                    this.linkUpdated = this.menu.link;
                    return this.isLinkUpdate = true;
                }else{
                    return this.isLinkUpdate = false;
                }
            }
        },
        methods: {
            submitForm () {

                axios.put(`/manage/menu/${this.menu.id}`, {
                    title: this.name,
                    link: this.linkUpdated,
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Menu',
                        text: 'Successfully updated!',
                    });
                })

                this.$modal.hide(`modal-${this.menu.id}`)
                this.name = null
                this.linkUpdated = "http://127.0.0.1:8000/"

            },
            showModal () {
                this.$modal.show(`modal-${this.menu.id}`)
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
