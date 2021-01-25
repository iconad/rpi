<template>
    <div class="inline-block relative cursor-pointer">
        <span class="select-none" @click="isDropDown = !isDropDown">
            ▾ {{user.email}}
        </span>
        <ul :class="isDropDown ? '' : 'hidden'" class="absolute z-50 right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow"
            aria-label="submenu">
            <li v-if="roles.length != 0 && isAdmin">
                <a class="block px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="/manage/dashboard">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a class="block px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="/profile">
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a class="block px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="/profile/orders">
                    <span>Orders</span>
                </a>
            </li>
            <li>
                <a class="block px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="/profile/estimates">
                    <span>Estimates</span>
                </a>
            </li>
            <li>
                <a class="block px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="/profile/pending-proofs">
                    <span>Pending Proofs</span>
                </a>
            </li>
            <li>
                <a class="block px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="/profile/address-books">
                    <span>Address Book</span>
                </a>
            </li>
            <li>
                <a class="block px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="/profile/designs">
                    <span>My Designs</span>
                </a>
            </li>
            <li>
                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800" href="/logout">
                    <span>Log out</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['user', "roles"],
        data() {
            return {
                isDropDown: false
            }
        },
        computed: {
            isAdmin () {
                if(this.roles.length != 0) {
                    return this.roles.includes('admin')
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
