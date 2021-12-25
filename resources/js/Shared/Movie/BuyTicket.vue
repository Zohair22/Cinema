<template>
    <div class="text-right">
        <Link
            :href="'/reservation/' + movie.name"
            class="border text-sm border-yellow-600 duration-700 hover:bg-yellow-600 hover:text-white rounded-3xl text-sm px-3 py-1 uppercase"
        >
            Buy Ticket
        </Link>
    </div>
</template>

<script setup>
  defineProps({
      movie: Array,
  })
</script>
