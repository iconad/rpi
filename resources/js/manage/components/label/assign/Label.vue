<template>
    <div>
        <div v-if="menu.label" class="flex items-center">
            <span :class="[`inline-bock px-3 py-px font-medium rounded-lg shadow text-xs ${menu.label.color}`, menu.label.color === 'yellow-300' ? 'text-gray-900' : 'text-gray-100' ]">{{menu.label.title}}</span>
            <edit-label class="ml-2" @updated="updatedLabels" :label="menu.label" model="menu" :title="menu.title" :id="menu.id"></edit-label>
        </div>
        <div v-else>
            <assign-label @updated="updatedLabels" :id="menu.id" model="menu" :title="menu.title"></assign-label>
        </div>

    </div>
</template>

<script>

    import EditLabel from './EditLabel'

    export default {
        props: ['menu', 'model'],
        components: {
            EditLabel,
        },
        methods: {
            updatedLabels () {
                this.$emit('updated')
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
