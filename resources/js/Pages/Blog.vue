

<template>
    <Movies :movie="movie" :last="last" :user="auth.user" class="mt-10" />
    <MovieComments :movie="movie" :auth="auth" :locations="locations" />
</template>

<script setup>
import Movies from "../Shared/Movies";
import MovieComments from "../Shared/MovieComments";
defineProps({
    last: Array,
    locations: Array,
    movie: Array,
    auth: Object,
})
</script>
