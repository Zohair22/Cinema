<template>
    <section
        class="max-w-5xl mx-auto"
    >
        <div
            class="lg:grid lg:grid-cols-3 gap-4 bg-gray-100 hover:bg-gray-200 rounded-3xl drop-shadow-2xl duration-700"
        >
            <div v-if="!user && last.id === movie.id"
                 class="bg-yellow-600 m-0 w-28 text-center text-white right-0 absolute">
                Newest One
            </div>

            <Photo class="col-span-1" :movie="movie" />
            <div class="col-span-2 p-5">
                <Header :movie="movie" :user="user" />
                <Description :movie="movie" />
                <Information :movie="movie" />
                <Footer :movie="movie" />
            </div>
        </div>
    </section>
</template>

<script setup>

import Photo from "./Movie/Photo";
import Header from "./Movie/Header";
import Description from "./Movie/Description";
import Information from "./Movie/Information";
import Footer from "./Movie/Footer";

defineProps({
    movie: Array,
    user: Array,
    last: Array,
})
</script>
