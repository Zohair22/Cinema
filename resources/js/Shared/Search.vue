<template>
    <div class="lg:mt-0 mt-4">
        <div class="relative flex lg:inline-flex items-center px-3 py-2">
            <input
                v-model="search"
                type="text"
                name="search"
                placeholder="Search..."
                class="border py-1 px-3 rounded-2xl shadow-xl w-full"
            >
        </div>
    </div>
</template>

<script setup>
import {ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";
import debounce from "lodash/debounce";

let props = defineProps({
    filters: Object,
});

let search = ref(props.filters.search);

watch(search, debounce(function (value) {
    Inertia.get('/',{search: value}, {
        preserveState: true,
        replace: true
    });
}, 300));
</script>

<style scoped>

</style>
