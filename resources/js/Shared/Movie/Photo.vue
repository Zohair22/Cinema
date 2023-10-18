<template>
    <div>
        <img :src="'/storage/' + movie.photo" class="rounded-3xl w-full h-full" :style="style">
    </div>
</template>

<script setup>
defineProps({
    movie: Array,
    style: String,
})
</script>

<style scoped>

</style>
