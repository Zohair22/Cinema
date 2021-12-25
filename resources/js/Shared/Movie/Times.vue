<template>
    <div class="lg:flex lg:items-center lg:justify-between lg:p-0 pb-3 overflow-auto">
        <div v-for="showTime in movie.show_times">
            <p
                class="mr-1 text-xs lg:mt-0 mt-4 max-w-sm p-1 text-sm border border-gray-600 duration-700 hover:border-yellow-600 hover:bg-yellow-600 hover:text-white rounded-3xl">
                {{ showTime.time }}</p>
        </div>
    </div>
</template>

<script setup>
defineProps({
    movie:Array,
})
</script>

<style scoped>

</style>
