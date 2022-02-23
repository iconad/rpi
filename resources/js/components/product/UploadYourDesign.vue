<template>
    <div>
        <div class="bg-theme-gray p-10 mt-5">
            <div class="capitalize text-gray-900 text-lg font-semibold">select file form </div>

            <div class="flex mt-3 mb-10">
                <label class="flex items-center flex-col justify-center text-center w-64 h-32 cursor-pointer hover:bg-theme-gray-light bg-theme-gray-dark border border-gray-400 hover:bg-primary hover:text-red-400 transition ease-linear duration-200 text-xl mr-3" :class="fileFrom === 'computer' ? 'bg-primary text-red-500' : ''">
                    <input type="radio" class="hidden" v-model="fileFrom" name="fileFrom" value="computer">
                    <span class="block my-2">
                        <svg class="fill-current w-10 h-10 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 17H2a2 2 0 01-2-2V2l2-2h16a2 2 0 012 2v13a2 2 0 01-2 2h-5l4 2v1H3v-1l4-2zM2 2v11h16V2H2z"/></svg>
                    </span>
                    <span class="block">Computer</span>
                </label>
                <label class="flex items-center flex-col justify-center text-center w-64 h-32 cursor-pointer hover:bg-theme-gray-light bg-theme-gray-dark border border-gray-400 hover:bg-primary hover:text-red-400 transition ease-linear duration-200 text-xl mr-3" :class="fileFrom === 'cloud' ? 'bg-primary text-red-500' : ''">
                    <input type="radio" class="hidden" v-model="fileFrom" name="fileFrom" value="cloud">
                    <span class="block my-2">
                        <svg class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M17 9a4 4 0 01-1 8H5A5 5 0 014 7a3 3 0 015-3 5 5 0 018 4v1z"/></svg>
                    </span>
                    <span class="block">Cloud</span>
                </label>
            </div>

            <div class="flex items-center w-full justify-center py-16" v-if="fileFrom === 'computer'">
                <file-upload
                    :headers="headers"
                    class="px-5 py-2 rounded cursor-pointer hover:bg-transparent border border-gray-400 hover:text-primary"
                    :post-action="`/profile/orders/${order.id}/store-file`"
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
                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16z"/></svg>
                        </span>
                        <span class="inline-block ml-2 text-xl">Select or Drag & Drop Here</span>
                    </div>
                </file-upload>

            </div>

            <div class="w-full" v-else>
                <label :disabled="files" class="text-gray-900 text-lg font-medium mb-2 block"> Paste cloud file URL <small class="text-gray-700 text-sm">Make you have have given permission for the download</small> </label>
                <textarea v-model="cloud" @input="checkCloud" class="resize-none w-full h-24 bg-gray-100 border border-gray-400 p-3 text-lg focus:outline-none"></textarea>

                <div class="flex items-center justify-end mt-5">
                    <button :disabled="!isFiles" :class="!isFiles ? 'bg-gray-500 cursor-not-allowed px-5 py-2 text-white font-medium border border-gray-500' : 'theme-button' " @click="addCloudFile" class=" inline-block ">Add</button>
                </div>
            </div>

            <p class="text-center text-red-500 text-xl mt-1 px-1 text-sm font-medium" v-if="fileError"> {{fileErrorMessage}} </p>

            <div class="mt-5 mb-2 flex items-center font-semibold" v-if="!$apollo.queries.files.loading && files.length != 0">
                Files
            </div>

            <order-files :files="files" :order="order" @update-files="updateFiles"></order-files>

            <div class="comment" :class="fileFrom === 'computer'? 'mt-5' : 'mt-5'">
                <label :disabled="files" class="capitalize text-gray-900 text-lg font-medium mb-2 block" for="comment"> Include any message, if you have any </label>
                <textarea id="comment" v-model="message" class="w-full h-32 bg-gray-100 border border-gray-400 p-3 text-lg focus:outline-none"></textarea>
            </div>

            <div class="flex items-center justify-end mt-5" v-if="!$apollo.queries.files.loading && files.length != 0">
                <button :disabled="files.length === 0" :class="files.length === 0 ? 'bg-gray-500 cursor-not-allowed px-5 py-2 text-white font-medium border border-gray-500' : 'theme-button' " @click="confirm" class=" inline-block ">Place Order </button>
            </div>

        </div>


        <modal height="auto" name="are-you-sure" class="relative">
            <div class="p-10 text-center">
         <!--    <div class="text-3xl text-sec font-semibold mb-3">IMPORTANT NOTICE!</div>
                <p class="text-base text-800 mt-5">Please pay the below amount and send us the proof of payment with your ordre ID on our email <a href="mailto:info@rpi.ae" class="font-semibold hover:underline">info@rpi.ae</a> or Whatsapp us on <span class="font-semibold">+971 55 207 4007</span>, and will start working on you order ASAP.</p>
                <table class="w-full text-left mt-5 text-red-500">
                    <tr>
                        <td class="font-medium border p-2">Order ID</td>
                        <td class="font-medium border p-2">{{order.id}}</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Amount to pay</td>
                        <td class="font-medium border p-2">{{order.price_total}} AED</td>
                    </tr>
                </table>
                <table class="w-full text-left mt-5">
                    <tr>
                        <td colspan="2" class="border p-2 font-semibold">Bank Detail</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Company Name</td>
                        <td class="border p-2">Rainbow Printing Ind .LLC (R.P.I)</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Bank Name</td>
                        <td class="border p-2">The National Bank of Ras Al Khaima (P.S.C)</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Branch</td>
                        <td class="border p-2">Sharjah Industrial Area</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Po Box</td>
                        <td class="border p-2">1531 Dubai, United Arab of Emirates</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">A/C No</td>
                        <td class="border p-2">0362518809001</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">IBAN</td>
                        <td class="border p-2">AE530400000362518809001</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Swift Code</td>
                        <td class="border p-2">NRAKAEAK</td>
                    </tr>
                    <tr>
                        <td class="font-medium border p-2">Routing Code</td>
                        <td class="border p-2">804020101</td>
                    </tr>
                </table>
            </div>
            <div class="p-10 text-center hidden"> -->
                <div class="text-3xl text-sec font-semibold mb-3">IMPORTANT NOTICE!</div>
                <p class="text-lg text-800 mt-5">After we have checked your data carefully, we will display a digital screen proof in your account that you must approve and pay.</p>
                <p class="text-base text-800 text-theme-red mb-5 mt-2 font-medium">
                    <span class="block">We will review your order,</span>
                    <span class="block"> Your order will be on hold.</span>
                </p>
                <div class="flex items-center justify-center">
                    <p-check class="p-svg p-bigger" color="success" v-model="check">
                        <svg slot="extra" class="svg svg-icon" viewBox="0 0 20 20">
                            <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z"
                                style="stroke: white;fill:white"></path>
                        </svg>
                    </p-check>
                    <span class="text-base font-medium text-gray-900">Yes, I understand.</span>
                </div>
                <span v-if="!check" class="bg-gray-500 cursor-not-allowed px-5 py-2 select-none text-white font-medium border border-gray-500 mt-5 inline-block ">Proceed</span>
                <span v-else @click="submitPendingProof" class="theme-button cursor-pointer mt-5 inline-block ">Proceed</span>
            </div>
        </modal>



    </div>
</template>

<script>
    import VueUploadComponent from "vue-upload-component"
    import PrettyCheckbox from 'pretty-checkbox-vue/check';
    import { isWebUri } from 'valid-url';

    import orderFiles from './OrderFiles'

    import gql from 'graphql-tag'
    import filesByOrderQuery from "../../../../gql/frontend/queries/filesbyorder.gql";

    export default {
        props: ['order'],
        components: {
            orderFiles,
            FileUpload: VueUploadComponent,
            'p-check': PrettyCheckbox
        },
        data() {
            return {
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
       mounted() {
        //    this.$modal.show('are-you-sure');
        },
        methods: {
            addCloudFile () {
                axios.post(`/profile/orders/${this.order.id}/add-cloud-file`, {
                    cloud: this.cloud,
                })
                .then(response => {
                    this.$swal({
                        toast: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'File',
                        text: 'Added!',
                    });
                    this.$apollo.queries.files.refetch()
                    this.cloud = null
                })
            },
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
            confirm () {
                if(this.files.length === 0) {
                    this.fileError = true
                }else{
                    this.$nextTick(() => {
                        this.$modal.show('are-you-sure');
                    })
                }
            },
            submitPendingProof () {
                axios.post(`/profile/pending-proofs`, {
                    message: this.message,
                    status: 'pending',
                    order_id: this.order.id,
                })
                .then(response => {
                    this.$swal({
                        toast: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Done',
                        text: 'Your order has beed placed successfully!',
                    });
                     if(response.status == 200) {
                        window.location.href = `/profile/pending-proofs/${response.data.pp_id}`
                    }
                })

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
                    query: filesByOrderQuery,
                    variables: {
                        order_id: this.order.id
                    },
                    update(data) {
                        return data.filesbyorder;
                    },
                };
            },
        }
    }
</script>

<style lang="scss" scoped>
</style>
