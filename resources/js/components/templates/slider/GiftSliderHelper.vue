<template>
    <div>
        {{oneProduct}}
        <pre>
            {{giftProducts}}
        </pre>
        <!-- <products-slider :products="products"></products-slider> -->
    </div>
</template>

<script>

    import ProductsSlider from './ProductsSlider'

    export default {
        props: ['products'],
        components: {
            ProductsSlider,
        },
        data() {
            return {
                giftProducts: [],
            }
        },
        computed: {
            oneProduct () {
                let product = this.products.map(e => {
                    this.giftProducts.push(e)
                    // console.log(_.merge(e))
                })
            },
        },
    };

</script>

