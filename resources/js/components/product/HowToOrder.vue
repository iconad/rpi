<template>
    <div>
        <div class="text-center product-points-grid points-grid grid grid-cols-2 lg:grid-cols-4 mx-6 mt-16 lg:border-t border-gray-900 border-b-0 border-l-0 border-r-0">
            <div class="point p-5 cursor-pointer" v-on:click="howToOrderMethod(1)">
                  <div class="bg-white px-6 py-6 text-color f-f-l shadow-lg">
                <h1 class="text-3xl font-bold w-1/2">Browse our designs</h1>
                <div class="flex justify-end w-full items-end">
                      <img class="mb-3" src="https://image.flaticon.com/icons/png/512/2742/2742229.png" alt="thumbnail" width="48" height="48"  fill="none">
                         
           
                </div>
            </div>
            </div>
            <div class="point p-5 cursor-pointer" v-on:click="howToOrderMethod(2)">
                  <div class="bg-white px-6 py-6 text-color f-f-l shadow-lg">
                <h1 class="text-3xl font-bold w-1/2">Upload Your Designs</h1>
                <div class="flex justify-end w-full items-end">
                      <img class="mb-3" src="https://image.flaticon.com/icons/png/512/568/568717.png" alt="thumbnail" width="48" height="48" fill="none">
                         
           
                </div>
            </div>
            </div>
            <div class="point p-5 cursor-pointer" v-on:click="howToOrderMethod(3)">
                 <div class="bg-white px-6 py-6 text-color f-f-l shadow-lg">
                <h1 class="text-3xl font-bold w-10/12">Finalize Your Designs</h1>
                  <div class="flex justify-end w-full items-end">
                      <img class="mb-3" src="https://image.flaticon.com/icons/png/512/681/681662.png" alt="thumbnail" width="48" height="48"  fill="none">
                         
           
                </div>
            </div>
            </div>
            <div class="point p-5 cursor-pointer" v-on:click="howToOrderMethod(4)">
                <div class="bg-white px-6 py-6 text-color f-f-l shadow-lg">
                <h1 class="text-3xl font-bold w-9/12">Order Your Designs</h1>
               <div class="flex justify-end w-full items-end">
                      <img class="mb-3" src="https://image.flaticon.com/icons/png/512/1008/1008010.png" alt="thumbnail" width="48" height="48" fill="none">
                         
           
                </div>
            </div>
            </div>
        </div>
        <div class="bg-theme-gray text-center p-5 mt-10 how-to-order one relative" :class="howToOrder === 1 ? '' : 'hidden'">
            <div class="text-xl"> <span class="font-semibold">Select the </span> appropriate category.</div>
            <div class="box m-5">
              
                <div class="mt-8 text-lg w-4/5 mx-auto">
                    <p class="mb-5">There are designated areas for business cards, gift & promo, luxury gift boxes, marketing & stationery printing services. Select your desired category from the given options <span class="font-semibold">‘Check Product Prices’</span> then <span class="font-semibold">‘‘Order Now’</span> You will be Redirect to Upload Page.</p>
                     <div class="p-2 text-white bg-gray-600 text-lg font-medium">Check the free delivery schedule</div>
                    
                </div>
            </div>
        </div>
        <!-- one -->
        <div class="bg-theme-gray text-center p-5 mt-10 how-to-order two relative" :class="howToOrder === 2 ? '' : 'hidden'">
            <div class="text-xl"> <span class="font-semibold">Customize </span> your Product.</div>
         


  <div class="box m-5">
              
                <div class="mt-8 text-lg w-4/5 mx-auto">
                    <p class="mb-5">We bring your imagination to reality, therefore you have the full freedom to customize your product. You can select
                         the required attributes from the drop down boxes. Our customer care executives are available to clear all your queries; 
                        in case you get stuck in the middle of the process <span class="font-semibold"></span> <span class="font-semibold"></span> .</p>
     
                    
                </div>
            </div>

        </div>
        <!-- two -->
        <div class="bg-theme-gray text-center p-5 mt-10 how-to-order three relative" :class="howToOrder === 3 ? '' : 'hidden'">
            <div class="text-xl"> <span class="font-semibold">  Upload file</span>  / Or Let us design product.</div>

 <div class="mt-8 text-lg w-4/5 mx-auto">
                    <p class="mb-5">You can upload the ready to print file in Al or PDF . AI & PSD format. Use through your account you made in RPI,
                         if the file size is bigger. In case you do not have a file ready, you can 
                        click on the hire design service option. The design cost will be added to your order amount, 
                        if you opt for this service<span class="font-semibold"></span> <span class="font-semibold"></span> .</p>
     
                    
                </div>



          
        </div>
        <!-- three -->
        <div class="bg-theme-gray text-center p-5 mt-10 how-to-order four relative" :class="howToOrder === 4 ? '' : 'hidden'">
            <div class="text-xl"> <span class="font-semibold">Order</span> Confirmation.</div>
            <div class="box m-5">
                <div class="p-2 text-white bg-gray-600 text-lg font-medium">We keep you posted for the free delivery schedule</div>
                <div class="mt-8 text-lg w-4/5 mx-auto">
                    <p class="mb-5">Clicking the <span class="font-semibold">We have got highly secured online payment portal. You can proceed with the payment process. 
                        On successful completion of payment, you will receive a confirmation mail and an invoice. RPI  will contact you shortly and start with the printing process
                        ’</span>  <span class="font-semibold">‘‘Order Now’</span></p>
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
