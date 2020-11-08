<template>
    <div>
        <span v-if="!menu" class="action-button-warning select-none" @click="showMenus">Assign Menu</span>
        <div v-else class="change-text-on-hover">
            <span class="action-button-info select-none text-1"> {{menu.title}} </span>
            <span class="action-button-info select-none text-2" @click="showMenus"> Update Menu </span>
        </div>

        <div class="body-overlay bg-black bg-opacity-50 fixed inset-0 z-20"></div>
        <div class="flex items-center justify-center fixed inset-0 z-20">
            <div class="w-auto md:w-64 bg-white rounded shadow-2xl h-auto p-5">

                <ul v-if="!menu">
                    <li class="text-xl font-medium mb-2">Assing Menu</li>
                    <li v-for="(me, i) in menus" :key="i">
                        <label class="flex items-center">
                            <input type="radio" class="w-5 h-5" v-model="selectedMenu" :value="me.id">
                            <span class="text-xl inline-block ml-3">{{me.title}}</span>
                        </label>
                    </li>
                </ul>
                <ul v-else>
                    <li class="text-xl font-medium mb-2">Edit Menu</li>
                    <li v-for="(me, i) in menus" :key="i">
                        <label class="flex items-center">
                            <input type="radio" class="w-5 h-5" v-model="selectedMenu" :value="me.id">
                            <span class="text-xl inline-block ml-3">{{me.title}} </span>
                        </label>
                    </li>
                </ul>

            </div>
        </div>


    </div>
</template>

<script>

    import gql from 'graphql-tag'
    import menus from "../../../../../gql/queries/menus.gql";

    export default {
        props: ['menu', 'id'],
        data() {
            return {
                selectedMenu: null
            }
        },
        methods: {
            showMenus () {

            }
        },
        apollo: {
            menus() {
                return {
                    query: menus,
                    update(data) {
                        return data.menus;
                    },
                };
            },
        }

    }
</script>

<style lang="scss" scoped>
.change-text-on-hover {
    .text-1 {
        display: inline-block;
    }
    .text-2 {
        display: none;
    }
    &:hover {
        .text-1 {
            display: none;
        }
        .text-2 {
            display: inline-block;
        }
    }
}
</style>
