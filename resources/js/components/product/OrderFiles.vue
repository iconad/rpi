<template>
    <div>
        <table class="w-full table-fixed">
            <tr>
                <th class="border border-gray-300 p-2 text-sm">File ID</th>
                <th class="border border-gray-300 p-2 text-sm">Name / Cloud</th>
                <th class="border border-gray-300 p-2 text-sm">Status</th>
                <th class="border border-gray-300 p-2 text-sm">Action</th>
            </tr>
            <tr v-for="(file,i ) in files" :key="i">
                <td class="border border-gray-300 p-2 text-sm">
                    <span class="font-medium inline-block mr-2 text-gray-600 uppercase">FID-{{file.id}}</span>
                </td>
                <td class="border border-gray-300 p-2 text-sm">
                    <order-file v-if="!file.cloud" :file="file"></order-file>
                    <a v-else :href="file.cloud" target="_blank" class="text-base hover:underline text-blue-600">Cloud link</a>
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
                <td class="border border-gray-300 p-2 text-sm">
                    <delete-record @updated="updateFiles" :id="order.id" model="orders" :id2="file.id" model2="files" class="ml-3"></delete-record>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>

    import orderFile from './OrderFile'
    import deleteRecord from './../DeleteRecord'

    export default {
        props: ['files', 'order'],
        components: {
            orderFile,
            deleteRecord
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
