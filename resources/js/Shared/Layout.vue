<template>
    <Head>
        <title>Tenguu</title>
    </Head>
    <Navigation :user="auth.user" />
    <div
        v-if="success !== null"
        x-data="{ show:true }"
        x-init="setTimeout(() => show = false, 2000 )"
        x-show="show"
        x-transition.duration.500ms
        class="max-w-xl mx-auto bg-green-100 text-green-600 text-center border border-teal-600 rounded-3xl py-2 mt-2 transition transform duration-700"
        role="alert"
        v-text="success"
    />

    <slot />

</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import Navigation from "./Navigation";

defineProps({
    'auth' : Object,
    'success' : Object,
})
</script>
