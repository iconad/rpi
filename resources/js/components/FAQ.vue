<template>
    <div class="bg-gray-100 pt-10">
    <div class="mx-auto max-w-6xl">
        <div class="p-2 bg-gray-100 rounded">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3 p-4 text-sm">
                    <div class="text-3xl">Frequently asked <span class="font-medium">Questions</span></div>
                    <div class="my-2">Wondering how our service works ?</div>
                    <div class="mb-2">Confused about how we can improve your business ?</div>
                    <div class="text-xs text-gray-600">Dive into our FAQ for more details</div>
                </div>
                <div class="md:w-2/3">
                    <div class="p-4 space-y-3">


                        <div v-for="data in content" :key="data.id">
                            <div @click="accordion(data.id)" class="select-none font-medium rounded-sm text-lg px-2 py-3 flex text-gray-800 flex-row-reverse mt-2 cursor-pointer text-black bg-white hover:bg-white">
                                <div class="flex-auto">{{data.title}}</div>
                                <div class="px-2 mt-1">
                                    <div style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down w-5 h-5">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 pl-12 pr-5 text-justify text-left text-gray-800 mb-5 bg-white" v-if="data.isOpen" v-html="data.detail"></div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                content: [
                    {
                        id: 1,
                        title: "What Kind Of Printers/Printing types does RPI have?",
                        detail: "<p> Rainbow printing press has proven its expertise as a leading printing press in the UAE for <b> digital print solutions </b> We work with all types of firms, such as Public relation, Global Brands and Design agencies. </p>",
                        isOpen: false
                    },
                    {
                        id: 2,
                        title: "Do I need to pay separate delivery charges for each product ?",
                        detail: "<p> No, One Shopping Cart has one delivery charge you can include as many products as you want in one <b> shopping cart </b> but delivery charges are fixed and one for all </p>",
                        isOpen: false
                    },
                    {
                        id: 3,
                        title: "Do you supply overseas?",
                        detail: "<p> Yes, Rainbow Printing Ind. Proudly delivers overseas! <b> Anywhere around </b> the world to satisfy our clients with any printing inquiry. </p>",
                        isOpen: false
                    },
                    {
                        id: 4,
                        title: "RPI’s service time or how quick is our delivery?",
                        detail: "<p> RPI’s service time or how quick is our delivery? Every job is different <b> Some jobs </b> can be produced in minutes while some may take several days to complete. Let us know when you need your job completed and we'll let you know if it can be done. We go to great lengths to meet even your most demanding timelines. </p>",
                        isOpen: false
                    },
                    {
                        id: 5,
                        title: "How can I place an order?",
                        detail: "<p> You can select the product of your choice, make appropriate selections from the options available, select the required quantity, then you can either select <b> DESIGN IT </b> if you want to design on your own) or you can UPLOAD your FILES (if you either have print ready files or want RPI's designer's free support) and then make the payment and checkout </p>",
                        isOpen: false
                    }
                ]
            }
        },
        methods: {
            accordion (id) {

                this.content.map(e => {
                    if (e.id !== id) {
                        e.isOpen = false
                        } else {
                            e.isOpen ? e.isOpen = false : e.isOpen = true
                        }
                    })

                }
        },
    }
</script>

<style lang="scss" scoped>

</style>
