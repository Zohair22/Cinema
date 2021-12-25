<template>
    <div class="lg:flex items-center justify-between px-10 text-center">
        <div class="lg:mt-0 mt-4">
            <Link
                href="/newMovie"
                v-html="'add new movie'"
                class="px-3 py-1 border text-md uppercase rounded-3xl border-yellow-600 hover:bg-yellow-600 hover:text-white duration-700"
            />
        </div>
        <Search :filters="filters" />
        <div class="lg:mt-0 mt-4">
            <Link
                href="/newAdmin"
                v-html="'Admins & Locations'"
                class="px-3 py-1 border text-md uppercase rounded-3xl border-yellow-600 hover:bg-yellow-600 hover:text-white duration-700"
            />
        </div>
    </div>
</template>

<script setup>
import Search from "./Search";
defineProps({
    filters: Object,
});
</script>

<style scoped>

</style>
