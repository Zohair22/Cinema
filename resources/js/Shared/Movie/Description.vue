<template>
    <div class="mt-4">
        <a class="text-xl text-red-700 border-b-2 border-red-600 p-1">Description</a>
        <p class="mt-6 text-sm" v-text="movie.description"/>
    </div>
</template>

<script setup>
defineProps({
    movie: Object
})
</script>

<style scoped>

</style>
