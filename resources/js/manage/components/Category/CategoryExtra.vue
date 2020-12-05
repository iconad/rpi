<template>
    <div>

        <div class="rounded-lg border border-gray-200 bg-white p-4 mb-6">
            <div class="text-lg font-semibold text-gray-800">Category Label</div>

            <div class="form-element mb-0">
                <div class="loader" v-if="$apollo.queries.category.loading"></div>
                <div v-else>
                    <assigned-label-row v-if="category.label" @updated="updatedCategory" model="categories" :label="category.label" :id="category.id" :title="category.title"></assigned-label-row>
                    <assign-label @updated="updatedCategory" class="mt-5" v-else :id="category.id" model="categories" :title="category.title"></assign-label>
                </div>
            </div>
        </div>

        <div class="rounded-lg border border-gray-200 bg-white p-4 mb-6">
            <div class="mb-3 text-lg font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>Sub Categories</span>
                <a :href="`/manage/categories/${id}/sub-categories/create`" class="text-sm block theme-link">Add New</a>
            </div>

            <div class="form-element">
                <manage-sub-categories :cid="id"></manage-sub-categories>
           </div>
        </div>

    </div>
</template>

<script>

    import gql from 'graphql-tag'
    import category from "../../../../../gql/queries/category.gql";

    export default {
        props: ['id'],
        methods: {
            updatedCategory () {
                this.$apollo.queries.category.refetch()
            }
        },
        apollo: {
            category() {
                return {
                    query: category,
                    variables: {
                    id: this.id
                    },
                    update(data) {
                        return data.category;
                    },
                };
            },
        }
    }
</script>
