<template>
    <div class="lg:grid lg:grid-cols-3 items-center gap-10 mt-6">
        <div class="col-span-2">
            <div>
                <div class="grid grid-cols-2 p-2 border-t border-yellow-600">
                    Running Time:
                    <div class="col-span-1 ml-5" v-text="movie.time"/>
                </div>
                <div class="grid grid-cols-2  p-2 border-t border-yellow-600">
                    Genre:
                    <div class="col-span-1 ml-5" v-text="movie.genres"/>
                </div>
                <div class="grid grid-cols-2  p-2 border-t border-yellow-600">
                    Director:
                    <div class="col-span-1 ml-5" v-text="movie.director"/>
                </div>
                <div class="grid grid-cols-2  p-2 border-t border-yellow-600">
                    Cast:
                    <div class="col-span-1 ml-5" v-text="movie.casts"/>
                </div>
                <div class="grid grid-cols-2  p-2 border-t border-b border-yellow-600">
                    Release Date:
                    <div class="col-span-1 ml-5" v-text="movie.released"/>
                </div>
            </div>
        </div>
        <div class="col-span-1 flex mt-10 items-center justify-between text-center">
            <div>
                <span class="border-2 border-yellow-600 rounded-full p-3" v-text="movie.IMDBRate" />
                <span class="block font-semibold text-gray-700 mt-6">IMDB Rating</span>
            </div>
            <div>
                <span class="border-2 border-yellow-600 rounded-full p-3" v-text="movie.rate" />
                <span class="block font-semibold text-gray-700 mt-6">Rating</span>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    movie: Array,
})
</script>

<style scoped>

</style>
