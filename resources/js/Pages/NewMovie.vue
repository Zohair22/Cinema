<template>
    <div class="max-w-2xl mx-auto border border-yellow-600 rounded-3xl p-5 mt-10">
        <h1 class="text-center text-yellow-700 text-3xl mb-6">Add New Movie</h1>
        <form @submit.prevent="submit">
            <div class="mb-4 flex gap-4">
                <div class="block text-gray-700 text-xs font-bold mb-2 uppercase w-full">
                    <input
                        v-model="movie.name"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
                        id="name"
                        type="text"
                        name="name"
                        placeholder="Name"
                        required
                    >
                    <p
                        v-if="$page.props.errors.name"
                        v-text="$page.props.errors.name"
                        class="text-red-500 text-sm mt-1"
                    />
                </div>
            </div>

            <div class="block mb-4 text-gray-700 text-xs font-bold uppercase w-full">
                <textarea
                    v-model="movie.description"
                    class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="description"
                    type="text"
                    name="description"
                    rows="3"
                    placeholder="Description"
                    required
                />
                <p
                    v-if="$page.props.errors.description"
                    v-text="$page.props.errors.description"
                    class="text-red-500 text-sm mt-1"
                />
            </div>

            <div class="mb-4 flex gap-4">
                <div class="block text-gray-700 text-xs font-bold mb-2 uppercase w-full">
                    <input
                        v-model="movie.rate"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
                        id="rate"
                        type="text"
                        name="rate"
                        placeholder="Rate"
                        required
                    >
                    <p
                        v-if="$page.props.errors.rate"
                        v-text="$page.props.errors.rate"
                        class="text-red-500 text-sm mt-1"
                    />
                </div>
                <div class="block text-gray-700 text-xs font-bold mb-2 uppercase w-full">
                    <input
                        v-model="movie.IMDBRate"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="IMDBRate"
                        type="text"
                        name="IMDBRate"
                        placeholder="IMDB Rate"
                        required
                    >
                    <p
                        v-if="$page.props.errors.IMDBRate"
                        v-text="$page.props.errors.IMDBRate"
                        class="text-red-500 text-sm mt-1"
                    />
                </div>
            </div>

            <div class="mb-4 flex gap-4">
                <div class="block text-gray-700 text-xs font-bold mb-2 uppercase w-full">
                    <h1 class="font-bold px-5 text-gray-400 uppercase">Released</h1>
                    <input
                        v-model="movie.released"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
                        id="released"
                        type="date"
                        name="released"
                        placeholder="Released"
                        required
                    >
                    <p
                        v-if="$page.props.errors.released"
                        v-text="$page.props.errors.released"
                        class="text-red-500 text-sm mt-1"
                    />
                </div>
                <div class="block text-gray-700 text-xs font-bold mb-2 uppercase w-full">
                    <h1 class="font-bold px-5 text-gray-400 uppercase">Movie Time</h1>
                    <input
                        v-model="movie.time"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="time"
                        type="text"
                        name="time"
                        placeholder="Movie Hours"
                        required
                    >
                    <p
                        v-if="$page.props.errors.time"
                        v-text="$page.props.errors.time"
                        class="text-red-500 text-sm mt-1"
                    />
                </div>
                <div class="block text-gray-700 text-xs font-bold mb-2 uppercase w-full">
                    <h1 class="font-bold px-5 text-gray-400 uppercase">Ticket Price</h1>
                    <input
                        v-model="movie.ticket"
                        class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="ticket"
                        type="text"
                        name="ticket"
                        placeholder="Ticket Price"
                        required
                    >
                    <p
                        v-if="$page.props.errors.ticket"
                        v-text="$page.props.errors.ticket"
                        class="text-red-500 text-sm mt-1"
                    />
                </div>
            </div>

            <div class="block text-gray-700 col-span-1 text-xs font-bold mb-4 uppercase">
                <input
                    v-model="movie.director"
                    class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    autofocus
                    id="director"
                    type="text"
                    name="director"
                    placeholder="Directors"
                    required
                >
                <p
                    v-if="$page.props.errors.director"
                    v-text="$page.props.errors.director"
                    class="text-red-500 text-sm mt-1"
                />
            </div>

            <div class="block text-gray-700 col-span-1 text-xs font-bold mb-2 uppercase w-full">
                <input
                    v-model="movie.casts"
                    class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="casts"
                    type="text"
                    name="casts"
                    placeholder="Casts"
                    required
                >
                <p
                    v-if="$page.props.errors.casts1"
                    v-text="$page.props.errors.casts1"
                    class="text-red-500 text-sm mt-1"
                />
            </div>

            <div class="block text-gray-700 col-span-1 text-xs font-bold mb-2 uppercase w-full">
                <input
                    v-model="movie.genres"
                    class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text"
                    name="genres"
                    placeholder="genres"
                    required
                >
                <p
                    v-if="$page.props.errors.genres"
                    v-text="$page.props.errors.genres"
                    class="text-red-500 text-sm mt-1"
                />
            </div>

            <div class="block mb-4 text-gray-700 text-xs font-bold uppercase w-full">
                <input
                    @input="movie.photo = $event.target.files[0]"
                    class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    autofocus
                    id="photo"
                    type="file"
                    name="photo"
                    placeholder="Photo"
                    required
                >
                <p
                    v-if="$page.props.errors.photo"
                    v-text="$page.props.errors.photo"
                    class="text-red-500 text-sm mt-1"
                />
            </div>

            <div class="block mb-4 text-gray-700 text-xs font-bold uppercase w-full">
                <input
                    v-model="movie.trailer"
                    class="shadow appearance-none border rounded-xl w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="trailer"
                    type="text"
                    name="trailer"
                    placeholder="Trailer Link"
                    required
                >
                <p
                    v-if="$page.props.errors.trailer"
                    v-text="$page.props.errors.trailer"
                    class="text-red-500 text-sm mt-1"
                />
            </div>

            <h1 class="font-bold mb-2 px-5 text-gray-500 uppercase">Time Show</h1>
            <div class="mb-4 grid grid-cols-3 gap-4 justify-between max-w-full">
                <div class="block text-gray-700 text-xs font-bold mb-2 uppercase max-w-full">
                    <input
                        v-model="movie.timeShow1"
                        class="shadow appearance-none border rounded-xl max-w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
                        type="time"
                        name="timeShow1"
                        required
                    >
                    <p
                        v-if="$page.props.errors.timeShow1"
                        v-text="$page.props.errors.timeShow1"
                        class="text-red-500 text-sm mt-1"
                    />
                </div>
                <div class="block text-gray-700 text-xs font-bold mb-2 uppercase max-w-full">
                    <input
                        v-model="movie.timeShow2"
                        class="shadow appearance-none border rounded-xl max-w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
                        type="time"
                        name="timeShow2"
                        required
                    >
                    <p
                        v-if="$page.props.errors.timeShow2"
                        v-text="$page.props.errors.timeShow2"
                        class="text-red-500 text-sm mt-1"
                    />
                </div>
                <div class="block text-gray-700 text-xs font-bold mb-2 uppercase max-w-full">
                    <input
                        v-model="movie.timeShow3"
                        class="shadow appearance-none border rounded-xl max-w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
                        type="time"
                        name="timeShow3"
                        required
                    >
                    <p
                        v-if="$page.props.errors.timeShow3"
                        v-text="$page.props.errors.timeShow3"
                        class="text-red-500 text-sm mt-1"
                    />
                </div>
                <div class="block text-gray-700 text-xs font-bold mb-2 uppercase max-w-full">
                    <input
                        v-model="movie.timeShow4"
                        class="shadow appearance-none border rounded-xl max-w-full py-2 px-5 text-lg text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        autofocus
                        type="time"
                        name="timeShow4"
                        required
                    >
                    <p
                        v-if="$page.props.errors.timeShow4"
                        v-text="$page.props.errors.timeShow4"
                        class="text-red-500 text-sm mt-1"
                    />
                </div>
            </div>

            <div class="flex items-center mt-10 justify-between">
                <div></div>
                <button
                    class="bg-yellow-600 hover:bg-yellow-800 duration-700 text-white font-semibold px-6 py-1 rounded-3xl focus:outline-none focus:shadow-outline"
                    :disabled="movie.processing"
                    type="submit"
                >
                    Submit
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let movie = useForm({
    name: '',
    description: '',
    rate: '',
    IMDBRate: '',
    time: '00:00:00',
    released: '',
    director: '',
    photo: '',
    casts: '',
    genres: '',
    trailer: '',
    ticket: '',
    timeShow1: '',
    timeShow2: '',
    timeShow3: '',
    timeShow4: '',
});

let submit = () => {
    movie.post('/newMovie', { preserveScroll: true, preserveState: true});
}
</script>
