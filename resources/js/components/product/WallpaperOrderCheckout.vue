<template>
    <div class="flex items-center justify-center">
        <table class="p-5 table w-full md:w-1/2 mt-10">
            <tr>
                <td class="border p-3 font-semibold">Order ID </td>
                <td class="border p-3">{{order.id}}</td>
            </tr>
            <tr>
                <td class="border p-3 font-semibold">Product</td>
                <td class="border p-3">{{order.title}}</td>
            </tr>
            <tr>
                <td class="border p-3 font-semibold">Width</td>
                <td class="border p-3">{{order.width}} (CM)</td>
            </tr>
            <tr>
                <td class="border p-3 font-semibold">Height</td>
                <td class="border p-3">{{order.height}} (CM)</td>
            </tr>
            <tr>
                <td class="border p-3 font-semibold">Quantity</td>
                <td class="border p-3">{{order.wallpaper_quantity}}</td>
            </tr>
            <tr>
                <td class="border p-3 font-semibold">Installation</td>
                <td class="border p-3 capitalize">{{order.installation}}</td>
            </tr>
            <tr v-if="order.installation == 'yes'">
                <td class="border p-3 font-semibold">Installation</td>
                <td class="border p-3">{{order.installation_state}}</td>
            </tr>
            <tr v-if="order.installation == 'yes'">
                <td class="border p-3 font-semibold">Installation Price</td>
                <td class="border p-3">{{order.installation_price}}</td>
            </tr>
            <tr v-if="order.installation == 'yes'">
                <td class="border p-3 font-semibold">Product Price</td>
                <td class="border p-3">{{order.price_product}}</td>
            </tr>
            <tr v-if="order.installation == 'yes'">
                <td class="border p-3 font-semibold">VAT</td>
                <td class="border p-3">{{order.price_vat}}</td>
            </tr>
            <tr v-if="order.installation == 'yes'">
                <td class="border border-b-0 p-3 font-semibold">Total Price</td>
                <td class="border border-b-0 p-3">{{totalPrice }}</td>
            </tr>
            <tr>
                <td colspan="2" class="border border-b-0 p-3 font-semibold">
                    <span class="text-xl text-blue-500">Billing Address</span>
                </td>
            </tr>
            <tr>
                <td class="border border-b-0 p-3">
                    <input placeholder="First Name" type="text" v-model="customer.first_name" class="form-input" :disabled="paymentProcessing">
                </td>
                <td class="border border-b-0 p-3">
                    <input placeholder="Last Name" type="text" v-model="customer.last_name" class="form-input" :disabled="paymentProcessing">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border border-b-0 p-3">
                    <span placeholder="Email" disabled class="form-input w-full block bg-gray-50 font-medium text-gray-400"> info@rpi.ae </span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border border-b-0 p-3">
                    <input placeholder="Street Address" v-model="customer.address" type="text" class="form-input" :disabled="paymentProcessing">
                </td>
            </tr>
            <tr>
                <td class="border border-b-0 p-3">
                    <input placeholder="City" type="text" v-model="customer.city" class="form-input" :disabled="paymentProcessing">
                </td>
                <td class="border border-b-0 p-3">
                    <tr>
                        <td class="px-2">
                            <input placeholder="State" v-model="customer.state" type="text" class="form-input" :disabled="paymentProcessing">
                        </td>
                        <td class="px-2">
                            <input placeholder="Zip Code" v-model="customer.zip_code" type="text" class="form-input" :disabled="paymentProcessing">
                        </td>
                    </tr>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border border-b-0 p-3 font-semibold">
                    <span class="text-xl text-blue-500">Card Details</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="border border-b-0 p-3">
                    <div id="card-element"></div>
                </td>
            </tr>
            <tr>
                <td class="border border-t-0 font-semibold text-center">
                    <button class="p-3 block bg-gray-200 w-full font-medium hover:bg-gray-300">Go Back</button>
                </td>
                <td class="border border-t-0">
                    <button class="p-3 block bg-theme-red w-full text-white font-medium hover:bg-theme-red-light" @click="processPayment">Place this order</button>
                </td>
            </tr>
        </table>




    </div>
</template>

<script>

    import { loadStripe } from '@stripe/stripe-js';

    export default {
        props: ['order'],
        components: {
        },
        data() {
            return {
                stripe: {},
                cardElement: {},
                customer: {
                    first_name: 'Amir',
                    last_name: 'Rehman',
                    email: 'info@print.ae',
                    address: '16b, 8 Street',
                    city: 'Oud Metha',
                    state: 'Dubai',
                    zip_code: '00000'
                },
                paymentProcessing: false

            }
        },
        async mounted() {

            if(this.order.status == 'paid-pending'){
                window.location.href = `/profile/orders/${this.order.id}`
            }

            this.stripe = await loadStripe(process.env.MIX_STRIPE_KEY);
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
                    console.error(error);
                } else {
                    this.customer.payment_method_id = paymentMethod.id;
                    this.customer.amount = Math.round(this.order.price_total * 100);
                    this.placeOrder()
                }
            },

            placeOrder () {
                axios.put(`/profile/orders/${this.order.id}`, {
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
                        text: 'Your order has beed placed successfully!',
                    });
                    window.location.href = `/profile/orders/${this.order.id}`
                })

            },
        },
        computed: {
            totalPrice() {
                return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'AED' }).format(this.order.price_total);
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
