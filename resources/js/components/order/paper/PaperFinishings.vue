<template>
    <div>
        <!-- {{finishing}} -->
        <hot-foil :finishing="finishing" v-if="isHotFoil" :type="type" @added="added"></hot-foil>
        <emboss :finishing="finishing" v-if="isEmboss" :type="type" @added="added"></emboss>
        <punch-hole :finishing="finishing" v-if="isPunchHole" :type="type" @added="added"></punch-hole>
        <round-corner :finishing="finishing" v-if="isRoundCorner" :type="type" @added="added"></round-corner>
        <other-finishing :finishing="finishing" v-if="!isRoundCorner && !isPunchHole && !isEmboss && !isHotFoil" :type="type" @added="added"></other-finishing>
    </div>
</template>

<script>


    // components
    import HotFoil from './HotFoil'
    import Emboss from './Emboss'
    import PunchHole from './PunchHole'
    import RoundCorner from './RoundCorner'
    import OtherFinishing from './OtherFinishing.vue'

    export default {
        props: ['type', 'finishings'],
        components: {HotFoil, Emboss, PunchHole, RoundCorner, OtherFinishing},
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
            },
            finishing () {
                return this.finishings.find(f => {
                    return f.title == this.type
                })
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
