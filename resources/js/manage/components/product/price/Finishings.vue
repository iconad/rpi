<template>
    <div>

        <table class="w-full border mt-5" v-if="newFinishings.length != 0">
            <thead class="bg-gray-100">
                <tr class="text-xs">
                    <th class="p-1 font-medium">Finishing Title</th>
                    <th class="p-1 font-medium">Option Title</th>
                    <th class="p-1 font-medium">Price</th>
                    <th class="p-1 font-medium">Days</th>
                    <th class="p-1 font-medium">Action</th>
                </tr>
            </thead>
            <tr v-for="(nf,i) in newFinishings" :key="i" class="text-xs text-center">
                <td class="p-1 border border-b-0"> {{nf.finishing_title}} </td>
                <td class="p-1 border border-b-0"> {{nf.option_title}} </td>
                <td class="p-1 border border-b-0"> {{nf.price}} </td>
                <td class="p-1 border border-b-0"> {{nf.days}} </td>
                <td class="p-1 border border-b-0">
                <svg @click="removeFinishing(nf,i)" xmlns="http://www.w3.org/2000/svg" class="hover:text-red-500 h-4 w-4 mx-auto cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                </td>
            </tr>
        </table>

        <div class="mt-5">
            <label class="font-medium mb-1">
                <span v-if="checkOptions" class="text-sm font-medium mb-1">Add Finishing </span>
                <span v-else class="text-sm font-medium mb-1">No finishing found! </span>
            </label>
            <ul class="mt-3 text-lg grid grid-cols-4 gap-3">
                <template v-for="item in finishings">
                <li v-if="item.options.length != 0" :key="item.id" :value="item.id">

                    <label class="block h-8 text-sm flex items-center justify-center border hover:bg-gray-200 cursor-pointer" :class="selected_finishing.id == item.id ? `bg-gray-200` : ``">
                        <span> {{ item.finishing.title }}</span>
                        <input type="radio" v-model="selected_finishing" :value="item" class="hidden" name="finishing" @change="getOptions">
                    </label>

                </li>
                </template>
            </ul>

            <ul v-if="selectedOption" class="mt-3 text-lg grid grid-cols-4 gap-3">
                <li v-for="option in options" :key="option.id">
                    <label class="block h-8 text-sm flex items-center justify-center border hover:bg-gray-200 cursor-pointer" :class="selectedOption.id == option.id ? `bg-gray-200` : ``">
                        <span>{{option.title}}</span>
                        <input type="radio" v-model="selectedOption" :value="option" class="hidden" name="option">
                    </label>
                </li>
            </ul>

            <div v-if="selectedOption" class="flex items-end space-x-3 mt-3">
                <div>
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Price</span>
                        <ValidationProvider name="editingTable.data.price" rules="required|number">
                            <div slot-scope="{ errors }">
                                <input type="number" class="form-input text-sm" v-model="selectedOption.price">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>

                <div>
                    <label class="w-full block">
                        <span class="text-sm font-medium mb-1">Days</span>
                        <ValidationProvider name="editingTable.data.price" rules="required|number">
                            <div slot-scope="{ errors }">
                                <input type="number" class="form-input text-sm" v-model="selectedOption.days">
                                <p class="text-theme-red-light mt-1 px-1 text-sm font-medium">{{ errors[0] }}</p>
                            </div>
                        </ValidationProvider>
                    </label>
                </div>

            </div>

            <div class="w-32 mt-2" v-if="selectedOption != null">
                <span
                @click="addFinishing"
                :disabled="!selectedOption.price || !selectedOption.days"
                :class="!selectedOption.price || !selectedOption.days ? 'bg-gray-200 text-gray-700 border-gray-200 hover:border-gray-200 hover:bg-gray-200 cursor-not-allowed':''"
                class="theme-button text-base font-medium px-2 cursor-pointer inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </span>
            </div>
        </div>

    </div>
</template>

<script>

    import { ValidationProvider,ValidationObserver } from 'vee-validate';
    import { required} from 'vee-validate/dist/rules';

    import optionsQuery from "../../../../../../gql/queries/selectionoptionsbyselectedfinishing.gql";

    export default {
        props:['finishings'],
        components: {
            ValidationProvider,
            ValidationObserver
        },
        data() {
            return {
                selected_finishing: this.finishings.length != 0 ? this.finishings[0] : null,
                selectedOption: this.finishings[0].options.length != 0 ? this.finishings[0].options[0] : null,
            }
        },
        computed: {

            checkOptions () {
                let options;
                if (this.finishings.length != 0 ) {
                    options = this.finishings.map(f => {
                        return  f.options.length != 0 ? true : false
                    })
                }
                return options.includes(true);
            },


            newFinishings () {
                return this.$store.state.newFinishings
            }
        },
        methods: {
            getOptions () {
                this.$apollo.queries.options.refetch({
                    selected_finishing_id: this.selected_finishing.id
                })
                setTimeout(function () {
                    this.selectedOption = this.options[0]
                 }.bind(this), 500)
            },

            addFinishing () {
                let finishing = {
                    finishing_id: this.selected_finishing.id,
                    finishing_title: this.selected_finishing.finishing.title,
                    option_id: this.selectedOption.id,
                    option_title: this.selectedOption.title,
                    price: this.selectedOption.price,
                    days: this.selectedOption.days
                }
                if(!this.checkFinishing(finishing, this.newFinishings)){
                    this.$store.commit('newFinishings', finishing)
                }else{
                    this.$swal({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 3000,
                        title: 'Option',
                        text: 'Already Exist!',
                    });
                }
            },

            removeFinishing (finishing, index) {
                this.$store.commit('removeFromNewFinishings', index)
                this.$swal({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 3000,
                    icon: "success",
                    title: 'Finishing',
                    text: 'successfully deleted',
                });
            },

            checkFinishing(obj, list) {
                return list.some(elem => elem.option_title === obj.option_title)
            }

        },
        apollo: {
            options() {
                return {
                    query: optionsQuery,
                    variables: {
                    selected_finishing_id: this.selected_finishing.id
                    },
                    update(data) {
                        return data.selectedoptions;
                    },
                };
            },
        }
    }

</script>

<style lang="scss" scoped>

</style>
