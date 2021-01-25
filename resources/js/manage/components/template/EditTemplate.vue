<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Edit Template</div>
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
                        <span class="text-sm font-medium mb-1">Title</span>
                        <ValidationProvider name="editingTable.data.size" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" class="form-input text-lg" v-model="editingTable.data.size">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="form-element">
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Detail</span>
                        <textarea type="text" class="form-input text-lg" rows="5" v-model="editingTable.data.excerpt"></textarea>
                    </label>
                </div>
                <div class="form-element">
                    <span v-if="editingTable.data.media.length != 0" class="text-sm font-medium mb-2 block">Change Thumbnail</span>
                    <span v-else class="text-sm font-medium mb-2 block">Thumbnail</span>
                    <thumb-image classess="w-24"  v-if="editingTable.data.media.length != 0" :image="firstMedia[0].file_name" :id="firstMedia[0].id"></thumb-image>
                </div>
                <div class="form-element">
                    <label class="w-full block">
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
                        >Update</button>
                    </div>
                </div>

            </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>

    import ThumbImage from '../../../components/ThumbImage'


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
            ThumbImage
        },
        data() {
            return {
                form: {
                    image: null,
                },
                loading: false,
                isImage: false,
                illustrator: null,
                photoshop: null,
            }
        },
        computed: {
            firstMedia (){
                return this.editingTable.data.media.filter(e => {
                    if(e.collection_name === 'images') {
                        return e
                    }
                })
            },
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
                axios.put(`/manage/template-categories/${this.cid}/templates/${this.editingTable.data.id}`, {
                    title: this.editingTable.data.title,
                    size: this.editingTable.data.size,
                    excerpt: this.editingTable.data.excerpt,
                    thumbnail: this.form.image,
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Category',
                        text: 'Updated!',
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
