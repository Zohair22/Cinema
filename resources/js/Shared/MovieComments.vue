<template>
    <div class="max-w-4xl mx-auto border bg-white p-5 rounded-3xl drop-shadow-2xl border-teal-300 my-10">
        <h1 class="text-2xl text-gray-700 font-bold mb-5 lg:text-center"> Comments </h1>
        <div v-for="comment in movie.comments">
            <div class="flex justify-between rounded-3xl bg-gray-50 py-3 px-5">
                <div class="lg:flex">
                    <div class="flex items-center gap-10 mr-6">
                        <div class="ml-2">
                            <h5 class="font-bold text-lg"><a href="#">{{ comment.name }}</a></h5>
                            <h5 class="font-bold text-gray-400"><a href="#">{{ comment.email }}</a></h5>
                        </div>
                        <div
                            class="max-w-2xl lg:mt-0 lg:ml-0 mt-5 ml-6 text-gray-600"
                            v-html="comment.comment"
                        />
                    </div>

                </div>
            </div>
            <hr class="my-5">
        </div>

        <form @submit.prevent="submit" class="max-w-2xl mx-auto">
            <div class="mb-4">
                <label class="block text-gray-700 text-xs font-bold mb-2 uppercase" >
                    <input
                        v-model="form.name"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
                        id="name"
                        type="text"
                        name="name"
                        placeholder="Write ur Name"
                        required
                    >
                </label>
                <div
                    v-if="form.errors.name"
                    v-text="form.errors.name[0]"
                    class="text-red-500 text-sm mt-1"
                ></div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-xs font-bold mb-2 uppercase" >
                    <input
                        v-model="form.email"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Write ur email"
                        required
                    >
                </label>
                <div
                    v-if="form.errors.email"
                    v-text="form.errors.email[0]"
                    class="text-red-500 text-sm mt-1"
                ></div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-xs font-bold mb-2 uppercase">
                    <textarea
                        v-model="form.comment"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
                        id="comment"
                        type="text"
                        name="comment"
                        placeholder="Leave a Comment"
                        required
                    />
                </label>
                <div
                    v-if="form.errors.comment"
                    v-text="form.errors.comment[0]"
                    class="text-red-500 text-sm mt-1"
                ></div>
            </div>
            <div class="text-right">
                <button
                    type="submit"
                    class="border text-sm border-blue-600 duration-700 hover:bg-blue-600 hover:text-white rounded-3xl text-sm px-3 py-1 uppercase"
                >
                    Comment
                </button>
            </div>
        </form>

    </div>

    <HomeFooter :address="locations" />
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import HomeFooter from "./HomeFooter";

let props = defineProps({
    'movie' : Array,
    'auth' : Object,
    'errors': Object,
    locations: Array,
})
const movie = props.movie
const user = props.auth.user

let form = useForm({
    name: '',
    email: '',
    comment: '',
    movie_id: movie.id,
});

let submit = () => {
    form.post('/comment', { preserveScroll: true, preserveState: false });
}
</script>
