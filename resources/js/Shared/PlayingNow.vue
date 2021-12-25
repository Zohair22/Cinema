<template>
    <div class="max-w-5xl mx-auto gap-6 grid grid-cols-3">
        <div v-for="movie in movies" class="col-span-1">
            <div class="bg-white rounded-3xl pb-3">

                <Link :href='"/movie/" + movie.name'>
                    <Photo :movie="movie" :style="'max-height: 400px'" />
                </Link>

                <div class="p-2">
                    <Header :movie="movie"/>
                    <Times :movie="movie" class="mt-4" />
                    <div class="grid grid-cols-2 gap-1 mt-4">
                        <Trailer :movie="movie" />
                        <BuyTicket :movie="movie" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Photo from "../Shared/Movie/Photo";
import Header from "../Shared/Movie/Header";
import Times from "../Shared/Movie/Times";
import BuyTicket from "../Shared/Movie/BuyTicket";
import Trailer from "../Shared/Movie/Trailer";
import {defineProps} from "vue";

defineProps({
    movies: Object,
})

</script>

<style scoped>

</style>
