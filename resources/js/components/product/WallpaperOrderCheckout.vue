<template>
    <div class="flex items-center justify-center">
        <table class="p-5 table w-full md:w-1/2 mt-10">
            <tr>
                <td class="border p-3 font-semibold">Order ID</td>
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
                <td class="border border-b-0 p-3">{{order.price_total}}</td>
            </tr>
            <tr>
                <td class="border border-t-0 font-semibold text-center">
                    <button class="p-3 block bg-gray-200 w-full font-medium hover:bg-gray-300">Go Back</button>
                </td>
                <td class="border border-t-0">
                    <button class="p-3 block bg-theme-red w-full text-white font-medium hover:bg-theme-red-light" @click="placeOrder">Place this order</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['order'],
        methods: {
            placeOrder () {
                axios.put(`/profile/orders/${this.order.id}`, {
                    status: 'pending',
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
                    // window.location.href = `/`
                    window.location.href = `/profile/orders/${this.order.id}`
                })

            },
        },
    }
</script>

<style lang="scss" scoped>

</style>
