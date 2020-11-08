<template>
    <div class="w-full">
        <transition name="slide-fade" class="w-full">
        <div v-if="isSidebar" class="bg-white border-l fixed right-0 top-0 h-screen w-full z-20 lg:z-1 lg:w-40rem xxl:w-50rem flex items-center">

            <span class="fixed right-0 top-0 p-5 cursor-pointer hover:text-red-400 text-gray-500" @click="clearEverything">
                <svg class="fill-current w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 9L3 2 2 3l7 7-7 7 1 1 7-7 7 7 1-1-7-7 7-7-1-1-7 7z"/></svg>
            </span>

            <create-size @updated="updateTable" class="w-full" v-if="type === 'create-size'"></create-size>
            <edit-size @updated="updateTable" class="w-full" v-if="type === 'edit-size'"></edit-size>
            <create-paper @updated="updateTable" class="w-full" v-if="type === 'create-paper'"></create-paper>
            <edit-paper @updated="updateTable" class="w-full" v-if="type === 'edit-paper'"></edit-paper>
            <create-finishing @updated="updateTable" class="w-full" v-if="type === 'create-finishing'"></create-finishing>
            <edit-finishing @updated="updateTable" class="w-full" v-if="type === 'edit-finishing'"></edit-finishing>
            <create-price @updated="updateTable" :pkgid="pkgid" :pid="pid" class="w-full" v-if="type === 'create-price'"></create-price>
            <edit-price @updated="updateTable" :pkgid="pkgid" :pid="pid" class="w-full" v-if="type === 'edit-price'"></edit-price>
        </div>
        </transition>
         <transition name="fade">
        <div v-if="isSidebar" class="body-overlay fixed inset-0 bg-black bg-opacity-50 z-10" @click="clearEverything"></div>
         </transition>
        <Keypress key-event="keydown" :key-code="27" @success="clearEverything" />

    </div>
</template>

<script>

    import CreateSize from './size/CreateSize'
    import EditSize from './size/EditSize'
    import CreatePaper from './paper/CreatePaper'
    import EditPaper from './paper/EditPaper'
    import CreateFinishing from './finishing/CreateFinishing'
    import EditFinishing from './finishing/EditFinishing'
    import CreatePrice from './product/price/CreatePrice'
    import EditPrice from './product/price/EditPrice'

    import Keypress from 'vue-keypress'

    export default {
        props: ['pkgid', 'pid'],
        components: {
            CreateSize,
            EditSize,
            CreatePaper,
            EditPaper,
            CreateFinishing,
            EditFinishing,
            CreatePrice,
            EditPrice,
            Keypress
        },
        data() {
            return {
            }
        },
        computed: {
            isSidebar () {
                return this.$store.state.isSidebar
            },
            type () {
                return this.$store.state.sidebarType
            },
        },
        methods: {
            updateTable () {
                this.$emit('updated')
            },
            clearEverything () {
              this.$store.commit('isSidebar', false)
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
