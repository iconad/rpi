<template>
    <div class="mx-auto container">

        <div class="mx-auto container px-4 xl:px-0 pt-16 lg:pt-36">
            <div class="flex flex-col w-full items-center justify-center f-f-l">
                <div class="bg-white w-full xl:w-11/12 px-6 py-8 xl:px-16 lg:py-16 shadow-lg">
                    <div class="lg:flex justify-between w-full">
                        <div>
                            <div class="flex w-full justify-between lg:justify-start items-center">
                                <h1 class="font-black text-2xl lg:text-5xl lg:mr-8 text-gray-700">Today 1PM</h1>

                            </div>
                            <div class="pt-3">
                                <p class="text-2xl f-f-r lg:w-10/12">Proof approval by  &amp; 01pm</p>
                            </div>
                        </div>
                        <div class="pt-8 lg:pt-0 flex items-center flex-col">
                            <h1 class="f-f-l font-black text-2xl lg:text-3xl text-gray-700">Day 1</h1>
                            <button class="py-4 px-4 xl:px-10 bg-gray-100 focus:outline-none f-f-r text-xl font-bold text-color mt-7">3PM TO 8PM</button>
                        </div>
                    </div>
                </div>
                  <div class="text-2xxl py-2 text-gray-100 bg-cyan-500 font-semibold text-lg text-center p-3">2 Business Days Turnaround Schedule</div>
                                <div class="bg-white w-full xl:w-11/12 px-6 py-8 xl:px-16 lg:py-16 mt-12 shadow-lg">
                    <div class="lg:flex justify-between w-full">
                        <div>
                            <div class="flex w-full justify-between lg:justify-start items-center">
                                <h1 class="text-color font-black text-3xl lg:text-3xl lg:mr-8">Overview</h1>
                                <div data-menu="" class="cursor-pointer">
                                    <button class="w-10 h-10 bg-gray-100 focus:outline-none flex items-center justify-center rounded-full">
                                        <svg id="andicators" class="" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                            <path d="M16 17.5626L22.6 10.9626L24.4853 12.848L16 21.3333L7.51465 12.848L9.39998 10.9626L16 17.5626Z" fill="#4A5568"></path>
                                        </svg>
                                        <svg id="andicators1" class="hidden" xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
                                            <path d="M9.00002 4.73399L2.40001 11.334L0.514683 9.44865L9.00002 0.963319L17.4854 9.44865L15.6 11.334L9.00002 4.73399Z" fill="#4A5568"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="pt-3">

                            </div>
                            <div id="listHolder" class="hidden pt-12">
                                <div class="flex items-center">
                                    <div class="pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12L10 17L20 7" stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="text-2xl f-f-r">Sun 01pm</div>
                                </div>
                                      <button class="ml- text-2xxl py-2 text-gray-100 bg-cyan-500 font-semibold text-lg text-center p-3">Sun(3pm-8pm)</button>

                                <div class="flex items-center mt-7">
                                    <div class="pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12L10 17L20 7" stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                <div class="text-2xl f-f-r">Mon 01pm</div>
                                </div>
                                      <button class="text-2xxl py-2 text-gray-100 bg-cyan-500 font-semibold text-lg text-center p-3">Mon (3pm-8pm)</button>
                                <div class="flex items-center mt-7">
                                    <div class="pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12L10 17L20 7" stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                 <div class="text-2xl f-f-r">Tue 01pm</div>
                                </div>
                                      <button class="text-2xxl py-2 text-gray-100 bg-cyan-500 font-semibold text-lg text-center p-3">Tue(3pm-8pm)</button>
                                <div class="flex items-center mt-7">
                                    <div class="pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12L10 17L20 7" stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                 <div class="text-2xl f-f-r">Wed 01pm</div>
                                </div>
                                      <button class="text-2xxl py-2 text-gray-100 bg-cyan-500 font-semibold text-lg text-center p-3">Wed(3pm-8pm)</button>
                                <div class="flex items-center mt-7">
                                    <div class="pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12L10 17L20 7" stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                 <div class="text-2xl f-f-r">Thu 01pm</div>
                                </div>
                                      <button class="text-2xxl py-2 text-gray-100 bg-cyan-500 font-semibold text-lg text-center p-3">Thu(3pm-8pm)</button>
                                <div class="flex items-center mt-7">
                                    <div class="pr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 12L10 17L20 7" stroke="#718096" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                 <div class="text-2xl f-f-r">Sat 01pm</div>
                                </div>
                                      <button class="text-2xxl py-2 text-gray-100 bg-cyan-500 font-semibold text-lg text-center p-3">Sat(3pm-8pm)</button>
                                <div class="flex items-center mt-7">

                                </div>

                            </div>
                        </div>
                        <div class="pt-8 lg:pt-0 flex items-center flex-col">

  <p class="text-2xl f-f-r lg:w-10/12">Weekly Turnaround  &amp; Schedule</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        let elements = document.querySelectorAll("[data-menu]");
        for (let i = 0; i < elements.length; i++) {
            let main = elements[i];
            main.addEventListener("click", function () {
                let list = document.getElementById("listHolder");
                let open = document.getElementById("andicators");
                let close = document.getElementById("andicators1");
                list.classList.toggle("hidden");
                if (list.classList.value.indexOf("hidden") === -1) {
                    open.classList.add("hidden");
                    close.classList.remove("hidden");
                } else {
                    open.classList.remove("hidden");
                    close.classList.add("hidden");
                }
            });
        }
    },
};
</script>
