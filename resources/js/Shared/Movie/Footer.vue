<template>
    <div class="lg:p-0 mt-4 p-5">
        <div class="lg:flex items-center justify-between relative">
            <Times :movie="movie" />
            <BuyTicket :movie="movie" />
        </div>
    </div>
</template>

<script setup>
import BuyTicket from "./BuyTicket";
import Times from "./Times"

defineProps({
    movie: Array,
})
</script>

<style scoped>

</style>
