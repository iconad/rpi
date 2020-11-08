<template>
    <div>
        <button @click="showModal" class="action-button-warning">Edit</button>


        <modal :name="`modal-${menu.id}`" height="auto" class="bg-black bg-opacity-25">
            <div class="p-6 relative">
                <div class="text-xl mb-3 capitalize font-semibold">Edit Menu</div>
                <!-- <hr class="my-2"> -->
                <form @submit.prevent="submitForm" class="form-element flex items-center">
                    <label class="w-full block relative">
                        <input type="text" v-model="title" class="form-input text-base font-normal" placeholder="Update menu">
                        <p v-if="error" class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-100 left-0 w-full"> This field is required </p>
                    </label>
                    <div class="ml-4 w-32">
                        <button
                        type="submit"
                        class="theme-button text-base font-medium"
                        >Update</button>
                    </div>
                </form>
            </div>
        </modal>
    </div>
</template>

<script>

    export default {
        props: ['menu'],
        data() {
            return {
                name: "",
                error: false
            }
        },
        watch: {
            name: function () {
                if(this.name != null) {
                    this.name.length === 0 ? this.error = true : this.error = false
                }
            }
        },
        computed: {
            title: {
                get() {
                    return this.menu.title;
                },
                set(newValue) {
                    this.name = newValue;
                    // console.log(newValue)
                }
            }
        },
        methods: {
            submitForm () {

                axios.put(`/manage/menu/${this.menu.id}`, {
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
                        text: 'Successfully updated!',
                    });
                })

                this.$modal.hide(`modal-${this.menu.id}`)
                this.name = null

            },
            showModal () {
                this.$modal.show(`modal-${this.menu.id}`)
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
