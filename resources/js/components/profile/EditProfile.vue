<template>
    <div>
        <div class="text-2xl font-semibold text-gray-900 flex items-center justify-between">
            <span>Account Identity</span>
        </div>
        <div v-if="$apollo.queries.user.loading" class="flex justify-center w-full">
            <div class="loader"></div>
        </div>
        <div class="mt-10" v-else>
            <ValidationObserver v-slot="{ invalid, passes }">
                <form @submit.prevent="submitForm">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-full">
                            <label class="w-full">
                                <span class="block mb-1 text-gray-900">Full Name</span>
                                    <ValidationProvider name="updatedUser.name" rules="required">
                                        <div slot-scope="{ errors }">
                                                <input type="text" v-model="updatedUser.name" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none">
                                            <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                        </div>
                                    </ValidationProvider>
                            </label>
                        </div>
                        <div class="w-full">
                            <label class="w-full">
                                <span class="block mb-1 text-gray-900">Email Address</span>
                                <div class="w-full border border-gray-300 bg-gray-300 rounded p-2 focus:outline-none active:outline-none">
                                    {{user.email}}
                                </div>
                            </label>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-full">
                            <label class="w-full">
                                <span class="block mb-1 text-gray-900">Mobile</span>
                                <ValidationProvider name="updatedUser.mobile" rules="mobile">
                                    <div slot-scope="{ errors }">
                                        <input type="number" min="0" v-model="updatedUser.mobile" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none">
                                        <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                            </label>
                        </div>
                        <div class="w-full">
                            <label class="w-full">
                                <span class="block mb-1 text-gray-900">Office Number</span>
                                <ValidationProvider name="updatedUser.office" rules="mobile">
                                    <div slot-scope="{ errors }">
                                        <input type="number" min="0" v-model="updatedUser.office" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none">
                                        <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                            </label>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-full">
                            <label class="w-full">
                                <span class="block mb-1 text-gray-900">Location / Country</span>
                                <input type="text" v-model="updatedUser.country" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none">
                            </label>
                        </div>
                        <div class="w-full">
                            <label class="w-full">
                                <span class="block mb-1 text-gray-900">Full Address</span>
                                <input type="text" v-model="updatedUser.address" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none">
                            </label>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-full">
                            <label class="w-full">
                                <span class="block mb-1 text-gray-900">Company Name</span>
                                <input type="text" v-model="updatedUser.company" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none">
                            </label>
                        </div>
                        <div class="w-full">
                            <label class="w-full">
                                <span class="block mb-1 text-gray-900">Company TRN</span>
                                <input type="text" v-model="updatedUser.company_trn" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none">
                            </label>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-full">
                            <label class="w-full">
                                <span class="block mb-1 text-gray-900">New Password</span>
                                <input type="text" v-model="password" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none">
                            </label>
                        </div>
                        <div class="w-full">
                            <label class="w-full">
                                <span class="block mb-1 text-gray-900">Confirm New Password</span>
                                <input type="text" v-model="confirm_password" class="w-full border border-gray-300 rounded p-2 focus:outline-none active:outline-none">
                            </label>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="flex items-center justify-end">
                        <div>
                            <div v-if="isLoading" class="loader"></div>
                            <input
                            v-else
                            :disabled="invalid"
                            :class="invalid ? 'bg-gray-200 text-gray-700 border-gray-200 hover:border-gray-200 hover:bg-gray-200 cursor-not-allowed' : '' "
                            type="submit" value="Update" class="theme-button rounded cursor-pointer">
                        </div>
                    </div>
                    <!-- row -->

                </form>
            </ValidationObserver>
        </div>
    </div>
</template>

<script>


    import gql from 'graphql-tag'
    import userQuery from "../../../../gql/frontend/queries/user.gql";

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required, email } from 'vee-validate/dist/rules';

    extend('required', {
        ...required,
        message: 'This field is required'
    });

    extend("mobile", {
        validate(value) {
            return /^(?:\+971|00971|0)?(?:50|51|52|55|58|56|2|3|4|6|7|9)\d{7}$/.test(value);
        },
        message: `Must be a valid UAE number`
    });

    extend('email', {
    ...email,
    message: 'This field must be a valid email'
    });

    export default {
        props: ['user_id'],
        components: {
            ValidationProvider,
            ValidationObserver,
        },
        data() {
            return {
                password: null,
                confirm_password: null,
                landLineError: false,
                mobileError: false,
                isLoading: false
            }
        },
        computed: {
            updatedUser: {
                get: function () {
                    if(!this.$apollo.queries.user.loading) {
                        return this.user
                    }
                },
                set: function (newValue, oldValue) {
                    console.log(newValue)
                    console.log(oldValue)
                }
            }
        },
        methods: {
            submitForm () {
                this.isLoading = true
                axios.post(`/profile/update`, {
                    name: this.updatedUser.name,
                    mobile: this.updatedUser.mobile,
                    office: this.updatedUser.office,
                    country: this.updatedUser.country,
                    address: this.updatedUser.address,
                    company: this.updatedUser.company,
                    company_trn: this.updatedUser.company_trn,
                    password: this.password,
                    new_password: this.confirm_password,
                })
                .then(response => {
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Profile',
                        text: 'Updated!',
                    });
                    this.isLoading = false
                })
            },
        },
        apollo: {
            user() {
                return {
                    query: userQuery,
                    variables: {
                        id: this.user_id
                    },
                    update(data) {
                        return data.user;
                    },
                };
            },
        }
    }
</script>
