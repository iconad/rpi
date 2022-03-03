<template>
    <div>
        <form @submit.prevent="processPayment">
        <table class="p-5 border w-full">
            <tr>
                <td colspan="2" class="border border-b-0 p-3 py-2 font-semibold">
                    <span class="text-lg text-blue-500">Billing Address</span>
                </td>
            </tr>
            <tr>
                <td class="border border-b-0 p-3 relative">
                    <ValidationProvider name="customer.first_name" rules="required">
                    <div slot-scope="{ errors }">
                        <input placeholder="First Name" required type="text" v-model="customer.first_name" class="form-input" :disabled="paymentProcessing">
                        <p class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-2 left-0 text-center w-full">{{ errors[0] }}</p>
                    </div>
                    </ValidationProvider>
                </td>
                <td class="border border-b-0 p-3">
                    <ValidationProvider name="customer.first_name" rules="required">
                    <div slot-scope="{ errors }">
                        <input placeholder="Last Name" required type="text" v-model="customer.last_name" class="form-input" :disabled="paymentProcessing">
                    <p class="text-theme-red-light mt-1 px-1 text-sm font-medium absolute top-2 left-0 text-center w-full">{{ errors[0] }}</p>
                    </div>
                    </ValidationProvider>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border border-b-0 p-3">
                    <span placeholder="Email" disabled class="form-input w-full block bg-gray-50 font-medium text-gray-400"> info@rpi.ae </span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border border-b-0 p-3">
                    <input placeholder="Street Address" v-model="customer.address" required type="text" class="form-input" :disabled="paymentProcessing">
                </td>
            </tr>
            <tr>
                <td class="border border-b-0 p-3">
                    <input placeholder="City" required type="text" v-model="customer.city" class="form-input" :disabled="paymentProcessing">
                </td>
                <td class="border border-b-0 p-3">
                    <tr>
                        <td class="px-2">
                            <input placeholder="State" v-model="customer.state" required type="text" class="form-input" :disabled="paymentProcessing">
                        </td>
                        <td class="px-2">
                            <input placeholder="Zip Code" v-model="customer.zip_code" required type="text" class="form-input" :disabled="paymentProcessing">
                        </td>
                    </tr>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border border-b-0 p-3 py-2 font-semibold">
                    <span class="text-lg text-blue-500">Card Details</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border border-b-0 p-3">
                    <div id="card-element"></div>
                    <p v-if="paymentError" class="text-theme-red-light mt-1 px-1 text-sm font-medium w-full">{{paymentError.message}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="flex items-center px-3 py-3 border-t border-gray-300">
                        <div class="font-semibold">
                            <button v-if="!paymentProcessing" type="submit" class="theme-button rounded"> Pay Now ( {{ oprice }} AED ) </button>
                            <span v-else class="text-lg"> Payment processing... </span>
                        </div>
                        <span class="text-xs text-gray-600"></span>
                    </div>
                </td>
            </tr>
        </table>
        </form>
    </div>
</template>

<script>

    import { extend,ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required } from 'vee-validate/dist/rules';
    import { loadStripe } from '@stripe/stripe-js';

    extend('required', {
        ...required,
        message: 'This field is required'
    });


    export default {
        props: ['oprice', 'oid', 'username', 'email', 'userid'],
        components: {
            ValidationProvider,
            ValidationObserver,
        },
        data() {
            return {
                stripe: {},
                cardElement: {},
                paymentProcessing: false,
                customer: {
                    first_name: this.username,
                    last_name: null,
                    email: this.email,
                    address: null,
                    city: null,
                    state: null,
                    zip_code: null
                },
                paymentProcessing: false,
                paymentError: null

            }
        },
        async mounted() {

            this.stripe = await loadStripe('pk_live_51JD6dYAVnz1rgqBdzRLfG1fR6Q10Tk2qlb5E6mUFDbMYF6VS8kpd9TLmfXOXqxXi48XtwsI0GbfBmFZCPJElw9F000T0eljZMe');
            const elements = this.stripe.elements();
            this.cardElement = elements.create('card', {
                hidePostalCode: true,
                classes: {
                    base: 'rounded border border-gray-300 focus:border-indigo-500 text-lg outline-none text-gray-700 p-3 leading-8 transition-colors duration-200 ease-in-out'
                }
            });
            this.cardElement.mount('#card-element');
        },
        methods: {
            async processPayment() {

                this.paymentProcessing = true;

                const {paymentMethod, error} = await this.stripe.createPaymentMethod(
                    'card', this.cardElement, {
                        billing_details: {
                            name: this.customer.first_name + ' ' + this.customer.last_name,
                            email: this.customer.email,
                            address: {
                                line1: this.customer.address,
                                city: this.customer.city,
                                state: this.customer.state,
                                postal_code: this.customer.zip_code
                            }
                        }
                    }

                );
                if (error) {
                    this.paymentProcessing = false;
                    var parsedError = JSON.parse(JSON.stringify(error))
                    this.paymentError = parsedError
                } else {
                    this.customer.payment_method_id = paymentMethod.id;
                    this.customer.amount = Math.round(this.oprice * 100);
                    this.payAmount()
                }
            },

            payAmount () {
                axios.put(`/profile/orders/${this.oid}`, {
                    status: 'pending',
                    customer: this.customer
                })
                .then(response => {
                    this.$swal({
                        toast: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Done',
                        text: 'Your order payment has been successfully paid!',
                    });
                    window.location.href = `/profile/orders/${this.oid}`
                })

            },
        },
        computed: {
            totalPrice() {
                return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'AED' }).format(this.oprice);
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
