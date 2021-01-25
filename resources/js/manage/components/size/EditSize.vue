<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Edit Size</div>
            <!-- <hr class="my-2"> -->
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="submitForm">
                <div>
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Title / Name</span>
                        <ValidationProvider name="editingTable.data.region" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="editingTable.data.region"
                                :class="errors[0] ? 'border-red-400': ''"
                                class="form-input text-base font-normal" placeholder="UAE, Japan, EU">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div>
                    <label class="w-full block relative">
                        <span class="text-sm font-medium mb-1">Type</span>
                        <ValidationProvider name="editingTable.data.type" rules="required">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="editingTable.data.type"
                                :class="errors[0] ? 'border-red-400': ''"
                                class="form-input text-base font-normal" placeholder="UAE, Japan, EU">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="grid grid-cols-2 gap-5 mt-5 ">
                    <div class="h-auto">
                        <label class="w-full block">
                            <span class="text-sm font-medium mb-1">Portrait size</span>
                            <ValidationProvider name="editingTable.data.portait" rules="required">
                                <div slot-scope="{ errors }">
                                    <input type="number" v-model="editingTable.data.portrait"
                                    :class="errors[0] ? 'border-red-400': ''"
                                    class="form-input text-base font-normal" placeholder="90">
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </label>
                    </div>
                    <div class="h-auto">
                        <label class="block w-full">
                            <span class="text-sm font-medium mb-1">Landscape size</span>
                            <ValidationProvider name="editingTable.data.landscape" rules="required">
                                <div slot-scope="{ errors }">
                                    <input type="number" v-model="editingTable.data.landscape"
                                    :class="errors[0] ? 'border-red-400': ''"
                                    class="form-input text-base font-normal" placeholder="50">
                                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                </div>
                            </ValidationProvider>
                        </label>
                    </div>
                </div>
                <div class="mt-5">
                    <label class="w-full block relative">
                        <span class="text-sm font-medium mb-1">Additional Price</span>
                        <input type="text" v-model="editingTable.data.price"
                        class="form-input text-base font-normal" placeholder="AED">
                    </label>
                </div>
                <div class="mt-5">
                     <ValidationProvider name="editingTable.data.content_types" rules="required">
                        <div slot-scope="{ errors }">
                                <span class="text-sm font-medium mb-2 block">Product Type</span>
                                    <label v-for="(type,i) in menus" :key="i">
                                        <p-check
                                            color="danger"
                                            name="ctype"
                                            class="p-default text-sm"
                                            v-model="selectedMenus"
                                            :value="type.id"
                                            >
                                            <span class="text-base capitalize font-medium">{{type.title}}</span>
                                        </p-check>
                                    </label>
                            <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                        </div>
                    </ValidationProvider>
                </div>
                <div class="mt-5">
                    <span class="text-sm font-medium mb-2 block">Unit</span>
                    <label v-for="unit in units" :key="unit">
                        <p-radio color="danger" class="p-default text-sm p-round" name="unit" v-model="editingTable.data.unit" :value="unit">
                            <span class="text-base font-medium">{{unit}}</span>
                        </p-radio>
                    </label>
                </div>
                <div class="mt-8">
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

    import EditContentTypesCheck from './EditContentTypesCheck'

    import PrettyRadio from 'pretty-checkbox-vue/radio';
    import PrettyCheck from 'pretty-checkbox-vue/check';

    import gql from 'graphql-tag'
    import menus from "../../../../../gql/queries/menus.gql";

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, oneOf } from 'vee-validate/dist/rules';

    extend('required', {
        ...required,
        message: 'This field is required'
    });


    export default {
        components: {
            ValidationProvider,
            ValidationObserver,
            'p-radio': PrettyRadio,
            'p-check': PrettyCheck,
            EditContentTypesCheck

        },
        data() {
            return {
                selectedContentTypes: [],
                types: ["standard", "gold"],
                regions: ["UAE", "EU", "Japan", "KSA"],
                units: ["mm", "cm", 'px'],
                selectedMenus: [],
                menus: [
                    {
                        id: "10",
                        title: "Print Product",
                    },
                    {
                        id: "11",
                        title: "Packaging",
                    },
                    {
                        id: "12",
                        title: "Banners & Displays",
                    },
                    {
                        id: "13",
                        title: "Personalized Gifts",
                    },
                ]
            }
        },
        watch: {
            contentTypes(newVale, value) {
                console.log(newVale)
            }
        },
        computed: {
            contentTypes() {
                    this.selectedMenus = this.editingTable.data.menus.map(e => e.id)
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
            addToContentType (val) {
                if(!this.contentTypes.includes(val)) {
                    this.contentTypes.push(val)
                }
                console.log(this.contentTypes)
            },
            removeFromContentType (val) {
                console.log(val)
                this.contentTypes.splice(val, 1)
                console.log(this.contentTypes)
            },
            onUpdate (val) {
                this.selectedContentTypes = _.uniq(val)
            },
            submitForm () {

                axios.put(`/manage/sizes/${this.editingTable.data.id}`, {
                    region: this.editingTable.data.region,
                    type: this.editingTable.data.type,
                    price: this.editingTable.data.price,
                    content_types: this.selectedMenus,
                    portrait: this.editingTable.data.portrait,
                    landscape: this.editingTable.data.landscape,
                    unit: this.editingTable.data.unit,
                })
                .then(response => {
                    this.$emit('updated')
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Size',
                        text: 'Updated!',
                    });
                })
            },
        },
        // apollo: {
        //     menus() {
        //         return {
        //             query: menus,
        //             update(data) {
        //                 return data.menus;
        //             },
        //         };
        //     },
        // }

    }
</script>

<style lang="scss">
.pretty .state label:before, .pretty .state label:after {
    top: 0px!important;
}
</style>
