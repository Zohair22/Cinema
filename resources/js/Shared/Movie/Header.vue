<template>
    <div class="flex items-center justify-between">
        <h1 class="text-2xl uppercase text-teal-700" v-text="movie.name"/>
        <div class="mx-5 flex gap-4" v-if="user" >
            <Link
                :href="'/editMovie/'+movie.id"
                class="far fa-edit text-2xl text-yellow-700"
            />
            <Link
                :href="'/deleteMovie/'+movie.id"
                class="far fa-trash-alt text-2xl text-red-700"
            />
        </div>
    </div>
</template>

<script setup>
defineProps({
    movie: Array,
    user: Array,
})
</script>

<style scoped>

</style>
