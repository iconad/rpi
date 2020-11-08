<template>
    <div>
        <div v-if="gallery.length != 0" class="grid grid-cols-5 gap-3 my-5">
            <div v-for="(gal, i) in gallery" :key="gal.id" class="relative">

                <span @click="confirmDelete(gal.id, i)" class="flex items-center justify-center cursor-pointer bg-red-600 hover:bg-red-700 absolute right-0 top-0 inline-block text-white p-2">
                    <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
                </span>

                <img :src="`${publicUrl}${gal.id}/${gal.file}`" class="w-full h-48 object-cover" />
            </div>
        </div>
        <div>
            <file-upload
                class="my-5 px-5 py-16 w-full rounded cursor-pointer hover:bg-transparent border hover:text-primary"
                :headers="{
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-Token': token,
                    'id': pid,
                }"
                :post-action="`/manage/products/${pid}/gallery`"
                extensions="gif,jpg,jpeg,png,webp"
                accept="image/png,image/gif,image/jpeg,image/webp"
                :multiple="true"
                :size="1024 * 1024 * 10"
                v-model="files"
                :drop="true"
                @input="added"
                @input-filter="inputFilter"
                @input-file="inputFile"
                ref="upload">
                <div class="flex items-center justify-center">
                    <span>
                        <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16z"/></svg>
                    </span>
                    <span class="inline-block ml-2 text-xl">Select or Drag & Drop Here</span>
                </div>
            </file-upload>
        </div>
        <div>
            <div v-for="(file,i ) in files" :key="i">
                <span class="p-3 text-info-500 mb-1 text-base rounded block">{{file.name}} </span>
                <div class="progress" v-if="file.active || file.progress !== '0.00'">
                <div class="shadow w-full bg-grey-light rounded">
                    <div :class="{'bg-green-500 text-xs leading-none py-1 font-semibold text-center text-white rounded': true, 'bg-red-500': file.error, 'progress-bar-animated': file.active}" role="progressbar" :style="{width: file.progress + '%'}">{{file.progress}}%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import ProductGallery from "./ProductGallery"

    import VueUploadComponent from "vue-upload-component"
    export default {
        props: ['pid'],
        components: {
            ProductGallery,
            FileUpload: VueUploadComponent,
        },
        data() {
            return {
                check: false,
                fileFrom: 'computer',
                cloud: null,
                files: [],
                isFiles: false,
                fileError: false,
                fileErrorMessage: "You must select a file"
            }
        },
        computed: {
            token () {
                return window.csrf_token
            },
            gallery () {
                return this.$store.state.productGallery
            },
            publicUrl () {
                return this.$store.state.publicUrl
            }
        },
        mounted() {
            this.$store.dispatch('getProductGallery', this.pid)
        },
        methods: {
            confirmDelete (id, index) {
                this.$swal({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0C4472',
                    cancelButtonColor: '#f05252',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.deleteRecord(id, index)
                    }
                });
            },
            deleteRecord (id, index) {
                axios.delete(`/manage/products/${this.pid}/gallery-image/${id}`)
                .then(response => {
                    this.gallery.splice(index, 1);
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Status',
                        text: 'Successfully deleted!',
                    });
                })
            },
            added () {
                this.isFiles = false
                this.$refs.upload.active = true
            },
            inputFile: function (newFile, oldFile) {
                if (newFile && oldFile && !newFile.active && oldFile.active) {
                    // Get response data
                    // console.log('response', newFile.response)
                    // console.log('here one')
                    if (newFile.xhr) {
                    //  Get the response status code
                    // console.log('status', newFile.xhr.status)
                    // console.log('here two')
                    this.isFiles = true
                    this.$store.dispatch('getProductGallery', this.pid)
                    }
                }
            },
            inputFilter: function (newFile, oldFile, prevent) {
                if (newFile && !oldFile) {
                    // Filter non-image file
                    if (!/\.(jpeg|jpe|jpg|gif|png|webp)$/i.test(newFile.name)) {
                    return prevent()
                    }
                }

                // Create a blob field
                newFile.blob = ''
                let URL = window.URL || window.webkitURL
                if (URL && URL.createObjectURL) {
                    newFile.blob = URL.createObjectURL(newFile.file)
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
