<template>
    <nav class="flex items-center justify-between flex-wrap bg-blue-500 px-6" style="max-height: 50px">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <Link
                :href="user ? '/homepage' : '/'"
                preserve-scroll
                class="font-semibold text-xl tracking-tight transition duration-700 transform hover:-translate-y-1 ml-5"
            >
                <img src="/images/logo.png" style="max-height: 55px">
            </Link>
        </div>
        <div class="block lg:hidden">
            <button
                class="flex items-center px-3 py-2 border rounded text-blue-200 border-blue-400 hover:text-white hover:border-white" @click="open = !open"
            >
                <svg
                    :class="!open ? '' : 'hidden'"
                    class="fill-current h-3 w-3"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>

        <div
            class="w-full block flex-grow lg:flex lg:items-center lg:w-auto"
            :class="open ? '' : 'hidden'"
        >
            <div class="text-sm lg:flex-grow">
                <Link
                    href="#responsive-header"
                    class="hidden block mt-4 inline-block lg:mt-0 text-blue-200 hover:text-white transition duration-700 transform hover:-translate-y-1 mr-4"
                >
                    Docs
                </Link>
            </div>
            <div class="text-sm">
                <div v-if="user">
                    <Link
                        href="/logout"
                        class="block mt-4 inline-block lg:mt-0 text-blue-200 hover:text-white hover:text-bold transition duration-700 transform hover:-translate-y-1"
                    >
                        Logout
                    </Link>
                </div>
                <div v-else>
                    <Link
                        href="/login"
                        class="block mt-4 inline-block lg:mt-0 text-blue-200 hover:text-white hover:text-bold transition duration-700 transform hover:-translate-y-1"
                    >
                        Login As Administrator
                    </Link>
                </div>
            </div>
        </div>
    </nav>

</template>

<script setup>
defineProps({
    open: false,
    user: Array,
})
</script>

<style scoped>

</style>
