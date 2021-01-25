<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Template Files </div>
            <!-- <hr class="my-2"> -->
            <div class="mb-2">
                <span class="text-sm font-medium">File Type</span>
                <select v-model="type" class="mb-4 form-input text-base capitalize">
                    <option value="illustrator">illustrator</option>
                    <option value="photoshop">Photoshop</option>
                    <option value="pdf">PDF</option>
                    <option value="word">MS Word</option>
                    <option value="excel">MS Excel</option>
                </select>
            </div>
             <div class="flex items-center w-full justify-center py-16 border border-gray-300" v-if="fileFrom === 'computer'">
                <file-upload
                    :headers="headers"
                    class="px-5 py-2 rounded cursor-pointer hover:bg-transparent border border-gray-400 hover:text-primary"
                    :post-action="`/manage/template-categories/templates/${type}/${template.id}/store-file`"
                    extensions="zip,psd,ai,pdf"
                    :size="1024 * 1024 * 100"
                    :multiple="true"
                    v-model="files"
                    :drop="true"
                    @input="added"
                    @input-file="inputFile"
                    ref="upload">
                    <div class="flex items-center">
                        <span>
                            <svg class="fill-current w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16z"/></svg>
                        </span>
                        <span class="inline-block ml-2 text-sm">Select or Drag & Drop Here</span>
                    </div>
                </file-upload>
            </div>
            <div class="mt-10">
                <div v-if="$apollo.queries.files.loading" class="lex items-enter justify-center mx-12">
                    <div class="loader"></div>
                </div>
                <template-files v-else :files="files" :template="template" @update-files="updateFiles"></template-files>
            </div>
        </div>
    </div>
</template>

<script>

    import VueUploadComponent from "vue-upload-component"

    import gql from 'graphql-tag'
    import filesByTemplateQuery from "../../../../../gql/queries/filesbytemplate.gql";

    import templateFiles from './Files'

    export default {
        props: ['template'],
        components: {
            FileUpload: VueUploadComponent,
            templateFiles
        },
        data() {
            return {
                type: 'illustrator',
                check: false,
                fileFrom: 'computer',
                cloud: null,
                message: null,
                isFiles: false,
                fileError: false,
                currentFile: null,
                isFileLoading: false,
                fileErrorMessage: "You must select a file"
            }
        },
        computed: {
            headers () {
                return {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': window.csrf_token
                }
            }
        },

        methods: {
            updateFiles (file, i) {
                this.$apollo.queries.files.refetch()
            },
            checkCloud () {
                let url = this.cloud
                if (!isWebUri(url)) {
                    this.isFiles = false
                    this.fileErrorMessage = "Invalid URL, please use http before URL and remove any extra spaces"
                }else{
                    this.isFiles = true
                }
            },
            added () {
                this.isFileLoading = true
                this.isFiles = false
                this.$refs.upload.active = true
            },
            inputFile: function (newFile, oldFile) {
                if (newFile && oldFile && !newFile.active && oldFile.active) {
                    // Get response data
                    this.fileError = false
                    this.fileErrorMessage = ""

                    if(!newFile.response.file_id) {
                        this.fileError = true
                        this.fileErrorMessage = newFile.response.message
                    }
                    this.$apollo.queries.files.refetch()
                    // this.isFileLoading = false
                    // this.currentFile = newFile.response.file_id

                    if (newFile.xhr) {
                    //  Get the response status code
                    // console.log('status', newFile.xhr.status)
                    this.isFiles = true
                    }

                    // Upload progress
                    if (newFile.progress !== oldFile.progress) {
                        console.log(newFile.progress)
                    }

                }
            },
        },
        apollo: {
            files() {
                return {
                    query: filesByTemplateQuery,
                    variables: {
                        template_id: this.template.id
                    },
                    update(data) {
                        return data.filesbytemplate;
                    },
                };
            },
        }

    }
</script>
