<template>
    <div>
        <table class="w-full table-fixed">
            <tr>
                <th class="border border-gray-300 p-2 text-sm">ID</th>
                <th class="border border-gray-300 p-2 text-sm">Type</th>
                <th class="border border-gray-300 p-2 text-sm">Status</th>
                <th class="border border-gray-300 p-2 text-sm">Action</th>
            </tr>
            <tr v-for="(file,i ) in files" :key="i">
                <td class="border border-gray-300 p-2 text-sm">
                    <span class="font-medium inline-block mr-2 text-gray-600 uppercase flex justify-around">{{i + 1}}</span>
                </td>
                <td class="border border-gray-300 p-2 text-sm">
                   <span class="text-base capitalize flex justify-center"> {{file.type}} </span>
                </td>
                <td class="border border-gray-300 p-2 text-sm">
                    <div class="mx-3" v-if="file.active || file.progress !== '0.00'">
                        <div :class="{'flex items-center justify-center text-xl rounded-full': true, 'text-green-500': true, 'text-red-500': file.error, 'text-orange-500': file.active}" role="progressbar" :style="{width: file.progress + '%'}">
                            <span v-if="file.error" class="text-red-500">✘</span>
                            <div v-else-if="file.active" class="w-6 h-6 text-black">
                                <cloak-loader></cloak-loader>
                            </div>
                            <span v-else class="text-green-500">✔</span>
                        </div>
                    </div>
                </td>
                <td class="border border-gray-300 text-sm">
                   <div class="space-x-3 flex items-center justify-center">
                        <delete-record @updated="updateFiles" :id="file.id" model="template-files"></delete-record>
                        <download-file :file="file"></download-file>
                   </div>
                </td>
            </tr>
            <tr>
                <td colspan="4" v-if="files.length == 0" class="border border-gray-300 text-sm p-3">
                   <span class="text-base capitalize flex justify-center"> 0 Record Found! </span>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>

    import downloadFile from './DownloadFile'
    import templateFile from './File'
    import deleteRecord from './../DeleteRecord'
    import cloakLoader from './../../cloakLoader'

    export default {
        props: ['files', 'template'],
        components: {
            downloadFile,
            templateFile,
            deleteRecord,
            cloakLoader
        },
        methods: {
            updateFiles () {
                this.$emit('update-files')
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
