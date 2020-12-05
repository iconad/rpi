<template>
    <div>
        <div v-if="isRedLine" class="dull absolute w-full bg-primary-400 h-2"></div>
        <span class="flex items-end justify-center h-16 relative z-10"> {{q}} </span>
    </div>
</template>

<script>
    export default {
        props: ['q', 'minq', 'maxq'],
        computed: {
            isRedLine () {
                if(this.q >= this.minq) {
                    if(this.q < this.maxq) {
                        return true
                    }else{
                        return false
                    }
                }
            }
        },
    }
</script>

<style lang="scss" scoped>
    .dull {
        left: 50%;
        top: -5px;
    }

</style>
