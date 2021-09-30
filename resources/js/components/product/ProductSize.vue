<template>
    <div>
        <div class="px-4 py-2 bg-cyan-500 text-white text-lg font-semibold">{{size.region}} Standard ({{size.landscape}}x{{size.portrait}}{{size.unit}})</div>
        <div class="flex flex-wrap lg:flex-nowrap items-center justify-around p-5 lg:pb-0 bg-white pb-10 pt-16 lg:py-0 lg:h-18rem">
            <div class="w-full" >
                <div class="w-64 h-32 bg-cyan-50  relative mx-auto">

                    <div class="left-6 absolute -top-3 h-2px flex items-center justify-between">
                  
                        <span class="absolute -top-8 text-lg left-0 w-full text-center"> {{size.landscape}} </span>
                        <span class="inline-block text-gray-400">❮</span>
                        <div class="h-2px bg-gray-400 w-48 -mt-px"></div>
                        <span class="inline-block text-gray-400">❯</span>
                    </div>
                    <!-- hor line -->

                    <div class="top-0 absolute left-3 -right-auto lg:left-auto lg:-right-3 w-2px h-32 flex flex-col tems-center justify-between">
                        <span class="absolute top-12 mt-2 text-lg -right-5 w-full flex items-center" style="writing-mode: vertical-rl"> {{size.portrait}} </span>
                        <span class="inline-block text-gray-400 transform rotate-90">❮</span>
                        <div class="w-2px bg-gray-400 h-full mt-0"></div>
                        <span class="inline-block text-gray-400 transform rotate-90">❯</span>
                    </div>
                    <!-- ver line -->

                </div>
            </div>
            <div class="w-full flex items-center justify-center mt-16 lg:mt-0">

                <div class="w-32 h-48 bg-cyan-50 relative">

                    <div class="left-0 absolute -top-3 h-2px w-32 flex items-center justify-between">
                        <span class="absolute -top-8 text-lg left-0 w-full text-center"> {{size.portrait}} </span>
                        <span class="inline-block text-gray-400">❮</span>
                        <div class="h-2px bg-gray-400 w-full -mt-px"></div>
                        <span class="inline-block text-gray-400">❯</span>
                    </div>
                    <!-- hor line -->

                    <div class="-top-px absolute -right-3 w-2px h-48 flex flex-col tems-center justify-between">
                        <span class="absolute top-16 mt-4 text-lg -right-5 w-full flex items-center" style="writing-mode: vertical-rl"> {{size.landscape}} </span>
                        <span class="inline-block text-gray-400 transform rotate-90">❮</span>
                        <div class="w-2px bg-gray-400 h-full mt-1"></div>
                        <span class="inline-block text-gray-400 transform rotate-90">❯</span>
                    </div>
                    <!-- ver line -->

                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['size']
    }
</script>

<style lang="scss" scoped>

</style>
