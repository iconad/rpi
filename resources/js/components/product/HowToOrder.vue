<template>
    <div>
        <div class="text-center product-points-grid points-grid grid grid-cols-2 lg:grid-cols-4 mx-6 mt-16 lg:border border-gray-900 border-b-0 border-l-0 border-r-0">
            <div class="point p-5 cursor-pointer" v-on:click="howToOrderMethod(1)">
                <img src="https://www.printarabia.ae/img/products/misc/how-to-order/step-1.png" alt="icon" class="w-24 mx-auto">
                <div class="text-lg font-semibold mt-4 text-theme-red-light">Select your desired <br> product from menu</div>
            </div>
            <div class="point p-5 cursor-pointer" v-on:click="howToOrderMethod(2)">
                <img src="https://www.printarabia.ae/img/products/misc/how-to-order/step-2.png" alt="icon" class="w-24 mx-auto">
                <div class="text-lg font-semibold mt-4 text-theme-red-light">Upload your data, or <br> ask for design service</div>
            </div>
            <div class="point p-5 cursor-pointer" v-on:click="howToOrderMethod(3)">
                <img src="https://www.printarabia.ae/img/products/misc/how-to-order/step-3.png" alt="icon" class="w-24 mx-auto">
                <div class="text-lg font-semibold mt-4 text-theme-red-light">Review order and <br> make payment</div>
            </div>
            <div class="point p-5 cursor-pointer" v-on:click="howToOrderMethod(4)">
                <img src="https://www.printarabia.ae/img/products/misc/how-to-order/step-4.png" alt="icon" class="w-24 mx-auto">
                <div class="text-lg font-semibold mt-4 text-theme-red-light">Receive order and <br> delivery notifications</div>
            </div>
        </div>
        <div class="bg-theme-gray text-center p-5 mt-10 how-to-order one relative" :class="howToOrder === 1 ? '' : 'hidden'">
            <div class="text-xl"> <span class="font-semibold">Step 1:</span> Select the product you want and customise to your liking.</div>
            <div class="box m-5">
                <div class="p-2 text-white bg-gray-600 text-lg font-medium">We keep you posted for the free delivery schedule</div>
                <div class="mt-8 text-lg w-4/5 mx-auto">
                    <p class="mb-5">Clicking the <span class="font-semibold">‘Check Prices’</span> or <span class="font-semibold">‘‘Order Now’</span> button will take you to the ‘Configuration & Upload’ page.</p>
                    <p class="mb-5">
                        Customise your specifications by selecting size, paper, colour, quantity and any finishing options. Depending on which options or finishings are selected, the estimated <span class="font-semibold">delivery date</span> will adjust. The <span class="font-semibold">price</span> sub-total will automatically update at the bottom.
                    </p>
                </div>
            </div>
        </div>
        <!-- one -->
        <div class="bg-theme-gray text-center p-5 mt-10 how-to-order two relative" :class="howToOrder === 2 ? '' : 'hidden'">
            <div class="text-xl"> <span class="font-semibold">Step 2:</span> Upload your artwork or use our graphic design services.</div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-10">
                <div class="box m-5">
                    <div class="p-2 text-white bg-gray-600 text-lg font-medium">Upload your work</div>
                    <div class="mt-8 text-lg w-4/5 mx-auto">
                        <p class="mb-5">Good If...</p>
                        <ul class="text-left list-disc text-base">
                            <li class="mb-1">You have a print-ready design</li>
                            <li class="mb-1">Your artwork was created in design software or by a designer</li>
                        </ul>
                    </div>
                </div>
                <!-- box -->
                <div class="box m-5">
                    <div class="p-2 text-white bg-gray-600 text-lg font-medium">Free design campaign</div>
                    <div class="mt-8 text-lg w-4/5 mx-auto">
                        <p class="mb-5">Free design campaign</p>
                        <ul class="text-left list-disc text-base">
                            <li class="mb-1">Supply the details for your layout</li>
                            <li class="mb-1">Place your order and leave the design to us!</li>
                        </ul>
                    </div>
                </div>
                <!-- box -->
                <div class="box m-5">
                    <div class="p-2 text-white bg-gray-600 text-lg font-medium">Pre-made templates</div>
                    <div class="mt-8 text-lg w-4/5 mx-auto">
                        <p class="mb-5">No special software needed.</p>
                        <ul class="text-left list-disc text-base">
                            <li class="mb-1">Select the template you like best</li>
                            <li class="mb-1">Add your own text and logo</li>
                            <li class="mb-1">Make a custom design in minutes!</li>
                        </ul>
                    </div>
                </div>
                <!-- box -->
            </div>
        </div>
        <!-- two -->
        <div class="bg-theme-gray text-center p-5 mt-10 how-to-order three relative" :class="howToOrder === 3 ? '' : 'hidden'">
            <div class="text-xl"> <span class="font-semibold">Step 3:</span> Review your order details & approve your digital proof.</div>
            <div class="box m-5">
                <div class="p-2 text-white bg-gray-600 text-lg font-medium">Printing starts only after you confirm your digital proof.</div>
                <div class="mt-8 text-lg w-4/5 mx-auto">
                    <p class="mb-5">Approved data is sent to the factory for production. We trim your order down to its final size, then it is bound together with a sash and wrapped in brown paper for protection. When your order is ready to ship, we will notify you by email, Whatsapp or by phone (for deliveries within Dubai).</p>
                    <p class="mb-5">
                        Customise your specifications by selecting size, paper, colour, quantity and any finishing options. Depending on which options or finishings are selected, the estimated <span class="font-semibold">delivery date</span> will adjust. The <span class="font-semibold">price</span> sub-total will automatically update at the bottom.
                    </p>
                </div>
            </div>
        </div>
        <!-- three -->
        <div class="bg-theme-gray text-center p-5 mt-10 how-to-order four relative" :class="howToOrder === 4 ? '' : 'hidden'">
            <div class="text-xl"> <span class="font-semibold">Step 4:</span> Your order is printed, packed and prepared for delivery.</div>
            <div class="box m-5">
                <div class="p-2 text-white bg-gray-600 text-lg font-medium">We keep you posted for the free delivery schedule</div>
                <div class="mt-8 text-lg w-4/5 mx-auto">
                    <p class="mb-5">Clicking the <span class="font-semibold">‘Check Prices’</span> or <span class="font-semibold">‘‘Order Now’</span> button will take you to the ‘Configuration & Upload’ page.</p>
                    <p class="mb-5">
                        Customise your specifications by selecting size, paper, colour, quantity and any finishing options. Depending on which options or finishings are selected, the estimated <span class="font-semibold">delivery date</span> will adjust. The <span class="font-semibold">price</span> sub-total will automatically update at the bottom.
                    </p>
                </div>
            </div>
        </div>
        <!-- four -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                howToOrder: 1
            }
        },
        mounted() {
            this.authoChangeHowToOrder()
        },
        methods: {
            howToOrderMethod(num) {
                this.howToOrder = num
            },
            authoChangeHowToOrder () {
                this.intervalid1 = setInterval(function(){

                    if( this.howToOrder === 4) {
                         this.howToOrder = 1
                    }else{
                         this.howToOrder += 1
                    }

                }.bind(this), 7000);
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
