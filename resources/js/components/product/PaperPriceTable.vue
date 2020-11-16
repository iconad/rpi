<template>
    <div>

        <!-- <div>
            <div v-if="(head, i) in header" :key="i" class="bg-green-400 p-4">
                {{head.id}} {{head.region}}
                <div v-if="price.size.id === head.id" class="bg-yellow-400 p-4" v-for="(price, b) in package.prices" :key="b">
                    {{price.price}}
                </div>
            </div>
        </div> -->

        <!-- <pre>
            {{test}}
        </pre> -->


        <table v-if="package" class="min-w-full divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="border p-4 bg-theme-gray-dark">Quantity</th>
                <th class="border p-4 bg-theme-gray-dark capitalize" v-for="(head, i) in header" :key="i">
                    {{head.region}}
                    ({{head.portrait}}x{{head.landscape}})
                    {{head.type}}</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="(price, i) in package.prices" :key="i">
                    <td class="border px-6 py-4 whitespace-no-wrap text-center">
                        <span class="leading-5 text-base font-medium text-gray-900">
                            {{price.quantity}}
                        </span>
                    </td>
                    <template v-for="(td, i) in header.length">
                        <td :key="i" class="border px-6 py-4 whitespace-no-wrap text-center">
                            <span v-for="(pri, p) in price.sizes" :key="p">
                                <span v-if="pri.size.region === header[i].region">
                                    {{pri.price}} AED
                                </span>
                            </span>
                        </td>
                    </template>

                    <!-- <template v-for="(pri, b) in price.sizes">
                        <template v-for="(hed, h) in header" >
                            <td :key="`${b}${h}`"
                            v-if="pri.size.region === hed.region"
                            :class="pri.size.region === hed.region ? 'bg-green-100' : 'bg-red-100' "
                            class="border px-6 py-4 whitespace-no-wrap text-center">
                                <span class="leading-5 text-base font-medium text-gray-900">
                                        {{hed.region}} -
                                        {{pri.price}} AED
                                </span>
                            </td>
                        </template>
                    </template> -->
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td align="right" colspan="4">
                        <a href="" class="red-button">Order Now</a>
                    </td>
                </tr>
            </tfoot>

        </table>
    </div>
</template>

<script>


    export default {
        props: ['package', 'header'],

        data() {
            return {
                test: []
            }
        },
        computed: {

            packages () {
                if(this.package){
                    let quantity = this.package.prices.map(e => {
                        // return e.quantity
                        // this.test.push(data)
                        return this.test[e.quantity] = e.size
                    })

                    return quantity

                }
            }

        },

    }
</script>

<style lang="scss" scoped>

</style>
