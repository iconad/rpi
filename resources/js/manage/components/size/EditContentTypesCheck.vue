
<template>
    <div>
        <label v-for="type in content_types" :key="type">
            <p-check color="danger" name="ctype" class="p-default text-sm" v-model="editingTypes" :value="type">
                <span class="text-base capitalize font-medium">{{type}}</span>
            </p-check>
        </label>
    </div>
</template>

<script>

    import PrettyCheckbox from 'pretty-checkbox-vue/check';

    export default {
        props: ['types'],
        components: {
            'p-check': PrettyCheckbox
        },
        data () {
            return {
                content_types: ["shirt", "print", "banner", "gift"],
            }
        },
        computed: {
            editingTypes: {
                get: function () {
                    return this.types
                },
                set: function (value) {
                    // return value
                    this.$emit('update', value)
                }
            },
        },

    }
</script>

<style lang="scss" scoped>

</style>
