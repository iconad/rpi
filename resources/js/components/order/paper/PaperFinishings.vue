<template>
    <div>
        <hot-foil v-if="isHotFoil" :type="type" @added="added"></hot-foil>
        <emboss v-if="isEmboss" :type="type" @added="added"></emboss>
        <punch-hole v-if="isPunchHole" :type="type" @added="added"></punch-hole>
        <round-corner v-if="isRoundCorner" :type="type" @added="added"></round-corner>
    </div>
</template>

<script>


    // components
    import HotFoil from './HotFoil'
    import Emboss from './Emboss'
    import PunchHole from './PunchHole'
    import RoundCorner from './RoundCorner'

    export default {
        props: ['type'],
        components: {HotFoil, Emboss, PunchHole, RoundCorner},
        computed: {
            isHotFoil () {
                return this.type.toLowerCase() === 'hot foil'
            },
            isEmboss () {
                return this.type.toLowerCase() === 'emboss'
            },
            isPunchHole () {
                return this.type.toLowerCase() === 'punch hole'
            },
            isRoundCorner () {
                return this.type.toLowerCase() === 'round corner'
            }
        },
        methods: {
            added () {
                this.$emit('added')
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
