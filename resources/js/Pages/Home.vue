<template>
    <!--    <div class="text-center mb-4">-->
    <!--        <Search :filters="filters"/>-->
    <!--    </div>-->

    <div v-if="movies[0]" class="my-10">
        <Movies :movie="movies[0]" :last="last" :user="auth.user" />
    </div>

    <div class="bg-black p-8 mb-10 ">
        <h1 class="text-center mt-10 mb-20 text-4xl text-white">
            <span class="border-b-2 font-bold pb-3 border-yellow-600">Now Playing</span>
        </h1>
        <PlayingNow :movies="movies" />
    </div>

    <div class="p-8 mb-10 max-w-5xl mx-auto">
        <h1 class="text-center mt-10 mb-20 text-4xl">
            <span class="border-b-2 font-bold pb-3 border-yellow-300">Your experience is gonna be exquisite.</span>
        </h1>
        <Experience />
    </div>
    <HomeFooter :address="address" />
</template>

<script setup>
import Search from "../Shared/Search";
import Movies from "../Shared/Movies";
import PlayingNow from "../Shared/PlayingNow";
import Experience from "../Shared/Experience";
import HomeFooter from "../Shared/HomeFooter";

let props = defineProps({
    filters: Object,
    address: Object,
    movies: Object,
    last: Object,
    auth: Object,
})

</script>
