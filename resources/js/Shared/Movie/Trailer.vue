<template>
    <div>
        <a
            :href="movie.trailer"
            class="border text-sm border-blue-600 duration-700 hover:bg-blue-600 hover:text-white rounded-3xl text-sm px-3 py-1 uppercase"
            v-text="'Trailer'"
            target="_blank"
        />
    </div>
</template>

<script setup>
defineProps({
    movie: Array,
})
</script>

<style scoped>

</style>
