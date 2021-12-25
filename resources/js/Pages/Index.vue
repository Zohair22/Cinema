<template>
    <Head title="Admission" />
    <div class="max-w-5xl mx-auto">
        <Header :filters="filters" class="mb-6" />

        <Movies v-if="movies" v-for="movie in movies" :movie="movie" :user="auth.user" class="mb-10"/>
    </div>
</template>

<script setup>
import Movies from "../Shared/Movies";
import Header from "../Shared/Header";

defineProps({
    filters: Object,
    movies: Object,
    auth: Object,
})
</script>

<style scoped>

</style>
