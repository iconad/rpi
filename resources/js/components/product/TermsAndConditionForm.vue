<template>
    <div>
        <form>
            <div class="flex items-center justify-end">
                <label class="block flex items-center cursor-pointer checkbox-checkmark">
                    <span class="block w-auto">
                        <input v-model="agree" type="checkbox" class="hidden" name="agree" value="agree">
                        <span class="block w-4 md:w-6 h-4 md:h-6 border border-primary-500 relative m-1 cursor-pointer">
                        <span :class="agree ? 'flex' : 'hidden' " class="checkmark w-full h-full absolute inset-0 bg-primary-500 text-lg md:text-2xl items-center text-white justify-center left-px top-px">✓</span>
                    </span>
                    </span>
                    <span class="w-full inline-block ml-2 text-sm md:text-lg font-medium text-theme-red select-none">I agree to the above conditions</span>
                </label>
            </div>
            <div class="flex items-center justify-center md:justify-end mt-8 md:mt-5">
                <a class="mr-3 px-4 py-2 bg-primary-500 text-white font-medium text-lg hover:bg-transparent border border-primary-500 hover:text-primary-500 transition ease-linear duration-200" href="http://">Go Back</a>
                <a class="px-4 py-2 bg-primary-500 text-white font-medium text-lg hover:bg-transparent border border-primary-500 hover:text-primary-500 transition ease-linear duration-200" href="http://">Proceed</a>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                agree: false
            }
        },
    }
</script>
