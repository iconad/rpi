<template>
    <div>
        <div class="p-6 relative w-full">
            <div class="text-xl mb-3 capitalize font-semibold">Add Size</div>
            <!-- <hr class="my-2"> -->
            <ValidationObserver v-slot="{ invalid,passes }">
            <form @submit.prevent="submitForm">
                <div>
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Title / Name</span>
                        <ValidationProvider name="form.region">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.region"
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
                        <ValidationProvider name="form.type">
                            <div slot-scope="{ errors }">
                                <input type="text" v-model="form.type"
                                :class="errors[0] ? 'border-red-400': ''"
                                class="form-input text-base font-normal" placeholder="Standard, Japan, 190x120">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>
                <div class="grid grid-cols-2 gap-5 mt-5 ">
                    <div class="h-auto">
                        <label class="w-full block">
                            <span class="text-sm font-medium mb-1">Portrait size</span>
                            <ValidationProvider name="form.portait">
                                <div slot-scope="{ errors }">
                                    <input type="number" v-model="form.portrait"
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
                            <ValidationProvider name="form.landscape">
                                <div slot-scope="{ errors }">
                                    <input type="number" v-model="form.landscape"
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
                        <input type="text" v-model="form.price"
                        class="form-input text-base font-normal" placeholder="AED">
                    </label>
                </div>
                <div class="mt-5">
                     <ValidationProvider name="form.content_types" rules="required">
                        <div slot-scope="{ errors }">
                                <span class="text-sm font-medium mb-2 block">Product Type</span>
                                <label v-for="type in menus" :key="type.id">
                                <p-check color="danger" name="ctype" class="p-default text-sm" v-model="form.content_types" :value="type.id">
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
                        <p-radio color="danger" class="p-default text-sm p-round" name="unit" v-model="form.unit" :value="unit">
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
                        >Add</button>
                    </div>
                </div>

            </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>

    import PrettyRadio from 'pretty-checkbox-vue/radio';
    import PrettyCheckbox from 'pretty-checkbox-vue/check';

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, oneOf } from 'vee-validate/dist/rules';


    import gql from 'graphql-tag'
    import menus from "../../../../../gql/queries/menus.gql";

    extend('required', {
        ...required,
        message: 'This field is required'
    });


    export default {
        components: {
            ValidationProvider,
            ValidationObserver,
            'p-radio': PrettyRadio,
            'p-check': PrettyCheckbox
        },
        data() {
            return {
                form: {
                    region: null,
                    type: null,
                    price: null,
                    landscape: null,
                    portrait: null,
                    content_types: [],
                    unit: 'mm'
                },
                units: ["mm", "cm", 'px'],
                content_types: ["print", "banner", 'tshirt', 'gift'],
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
        methods: {
            submitForm () {
                axios.post(`/manage/sizes`, {
                    region: this.form.region,
                    type: this.form.type,
                    price: this.form.price,
                    content_types: this.form.content_types,
                    portrait: this.form.portrait,
                    landscape: this.form.landscape,
                    unit: this.form.unit,
                })
                .then(response => {
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Size',
                        text: 'Added!',
                    });
                    this.$emit('updated')
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
