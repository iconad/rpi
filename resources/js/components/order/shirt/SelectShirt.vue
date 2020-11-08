<template>
    <div>
        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-3 md:gap-6">
            <div
                v-for="(shirt, i) in shirts"
                :key="i"
                @click="select(shirt.color)"
                class="border p-2 text-center rounded hover:border-gray-500 transition ease-linear duration-200 cursor-pointer">
                <div>
                    <img :src="shirt.image" alt="image">
                </div>
                <div class="text-sm font-medium text-gray-800"> {{shirt.color}} </div>
            </div>
            <!-- box -->
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                shirts: [
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/e5a7f30ad42e6867091ef566aa99843b5e157365b7da7.webp",
                        color: "Natural"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/c96ce52c8df42c3895faf2ac42dcf73b5e1570e0bfdd4.webp",
                        color: "Ivory"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/3f0ed47b199b9ceeeedf8b383dd7a6115e15732c55ff8.webp",
                        color: "Daisy"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/751c02305683c27c25d268b6cbfb37c85e1564310d431.webp",
                        color: "Light Green"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/23d919bb7e63fb95f78a0b3faf2f8a9f5e157473310aa.webp",
                        color: "Bright Green"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/c0b85358fd1b34d29d4973e67d02ec3b5e156751b657f.webp",
                        color: "Green"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/739be880b7c1ab58589bf703ea1022895e15752cd84c2.webp",
                        color: "Sea Blue"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/d6068df138d75ea91c8dbf4212e854975e156dd0abebb.webp",
                        color: "Royal BLue"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/e3013a02111c1b5e9faa4e9f94b2b7305e155c5374c67.webp",
                        color: "Purple"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/1328fb810feb23e0e28df9ed9ed080165e154a4b7b231.webp",
                        color: "Red"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/c85ecfd7ccb236a064da91ee31c6c08b5e1547b4cdc00.webp",
                        color: "White"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/e9e6e258dfa75b71545eb3aef6b2e21e5e1548f58cc63.webp",
                        color: "Heather Gray"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/cd8c1d7c54a6eea956fe0d4207c960075e1549772407d.webp",
                        color: "Black"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/a208c5f86f4bebb30cf0ff70ab24fec45e155bf3e5bbe.webp",
                        color: "Pink"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/f7eb22d72cd19ab37231afc19ce1c06b5e155cdf2487e.webp",
                        color: "Orange"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/d93d5b8354873c3c8ca072499e5561025e1563bdd6e3b.webp",
                        color: "Lavender"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/c7fd2d5d037871990db901ccffe2e8f25e15730986b25.webp",
                        color: "Olive"
                    },
                    {
                        image: "https://assets.printarabia.ae/tshirt/uploads/9514eb2add159eb83553de41b3ce8e565e15731cd12e8.webp",
                        color: "Hot Pink"
                    },
                ]
            }
        },
        methods: {
            select (color) {
                this.$emit('added')
                this.$store.commit("mutateSelectedShirtColor", color)
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
