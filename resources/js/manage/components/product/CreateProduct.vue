<template>
    <div>
        <form action="/manage/products" method="post" class="w-full rounded-lg border border-gray-200 bg-white p-4">
            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Title</span>
                    <input class="form-input">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label>
                    <span class="text-gray-800 block">Cover Image</span>
                    <input type="file" name="image">
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element">
                <label class="flex items-center">
                    <p-check class="p-bigger p-curve p-pulse p-icon" name="featured" color="success">
                        <span>
                            <svg class="icon w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                        </span>
                    </p-check>
                    <span class="text-gray-800 block mt-1 inline-block">featured</span>
                </label>
            </div>
            <!-- form-ele -->

            <div class="form-element mt-8">
                <input type="submit" value="Submit" class="theme-button">
            </div>
            <!-- form-ele -->
        </form>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>

</style>
