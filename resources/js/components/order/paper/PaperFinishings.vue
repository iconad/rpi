<template>
    <div>
        <other-finishing :finishing="finishing" v-if="normalFinishing" :type="type" @added="added"></other-finishing>
        <round-corner :finishing="finishing" v-else-if="isRoundCorner" :type="type" @added="added"></round-corner>

    </div>
</template>

<script>


    // components
    import RoundCorner from './RoundCorner'
    import OtherFinishing from './Finishings.vue'

    export default {
        props: ['type', 'finishings'],
        components: {RoundCorner, OtherFinishing},
        computed: {

            normalFinishing () {
                return this.type.toLowerCase() !== 'round corner'
            },

            isRoundCorner () {
                return this.type.toLowerCase() === 'round corner'
            },

            finishing () {
                if(this.finishings && this.finishings[`${this.type}`]) {
                    return this.finishings[`${this.type}`]
                }
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
