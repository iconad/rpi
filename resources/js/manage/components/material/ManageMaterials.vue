<template>
    <div>
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 flex items-center justify-between">
            <span>Materials</span>
            <create-material @updated="updatedMaterials"></create-material>
            </div>
            <!-- New Table -->
            <div v-if="$apollo.queries.materials.loading" class="flex items-enter justify-center mx-12">
                <div class="loader"></div>
            </div>
            <div v-else class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Excerpt</th>
                        <th class="px-4 py-3">Min-Max</th>
                        <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800" >

                        <tr class="text-gray-700 dark:text-gray-400" v-for="(material, i) in materials" :key="i">
                            <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div>
                                    <p class="font-semibold hover:border-transparent">{{material.title}}</p>
                                </div>
                            </div>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span>{{material.excerpt ? material.excerpt : '- - -'}}</span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span>{{material.min ? material.min : 'not required'}} - {{material.max ? material.max : 'not required'}}</span>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span class="flex items-center">
                                    <edit-material @updated="updatedMaterials" :data="material"></edit-material>
                                    <delete-record @updated="updatedMaterials" :id="material.id" model="materials" class="ml-3"></delete-record>
                                </span>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

    import EditMaterial from './Edit'
    import CreateMaterial from './Create'

    import materials from "../../../../../gql/queries/materials.gql";

    export default {
        components: {
            CreateMaterial,
            EditMaterial
        },
        methods: {
            updatedMaterials () {
                this.$apollo.queries.materials.refetch()
            }
        },
        apollo: {
            materials() {
                return {
                    query: materials,
                    update(data) {
                        return data.materials;
                    },
                };
            },
        }
    }
</script>
