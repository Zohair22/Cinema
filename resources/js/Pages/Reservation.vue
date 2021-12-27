<template>
    <div class="border p-6 shadow-xl max-w-6xl mx-auto my-14 rounded-3xl">
        <h1 class="text-3xl text-blue-500 text-center">Make your Reservation</h1>
        <form @submit.prevent="submit" class="mt-10">

            <div class="lg:grid lg:grid-cols-2 gap-4">
                <div class="col-span-1">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs font-bold mb-2 uppercase ml-2">
                            Your Name
                        </label>
                        <input
                            v-model="form.name"
                            class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name"
                            type="text"
                            name="name"
                            placeholder="Enter your Name"
                            required
                        >
                        <div
                            v-if="form.errors.name"
                            v-text="form.errors.name[0]"
                            class="text-red-500 text-sm text-center mt-1"
                        ></div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs font-bold mb-2 uppercase ml-2">
                            Your Email
                        </label>
                        <input
                            v-model="form.email"
                            class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email"
                            type="email"
                            name="email"
                            placeholder="Enter your  Email"
                            required
                        >
                        <div
                            v-if="form.errors.email"
                            v-text="form.errors.email[0]"
                            class="text-red-500 text-sm text-center mt-1"
                        ></div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase ml-2">
                            Movie Name
                        </label>
                        <input
                            class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-300 leading-tight focus:outline-none focus:shadow-outline"
                            id="movie_id"
                            type="text"
                            name="movie_id"
                            :placeholder="movie.name"
                            required
                            disabled
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-300 text-xs font-bold mb-2 uppercase ml-2">
                            ticket price by $
                        </label>
                        <input
                            class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-300 leading-tight focus:outline-none focus:shadow-outline"
                            id="moviePrice"
                            type="text"
                            name="movie_id"
                            :placeholder="movie.ticket"
                            disabled
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs font-bold mb-2 uppercase ml-2">
                            Show Time
                        </label>
                        <select
                            class="form-select appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white border border-gray-300 rounded transition  focus:border-blue-600"
                            v-model="form.time_id"
                            name="time_id"
                        >
                            <option disabled selected>Open this select Movie show time</option>
                            <option v-for="time in movie.show_times" :value="time.id">
                                {{ time.time }}
                            </option>
                        </select>
                        <div
                            v-if="form.errors.time_id"
                            v-text="form.errors.time_id[0]"
                            class="text-red-500 text-sm text-center mt-1"
                        ></div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs font-bold mb-2 uppercase ml-2">
                            Location
                        </label>
                        <select
                            class="form-select appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white border border-gray-300 rounded transition  focus:border-blue-600"
                            v-model="form.location_id"
                            name="location_id"
                        >
                            <option disabled selected>Open this select location</option>
                            <option v-for="location in locations" :value="location.id">
                                {{ location.name + ' ,' + location.address }}
                            </option>
                        </select>
                        <div
                            v-if="form.errors.location_id"
                            v-text="form.errors.location_id[0]"
                            class="text-red-500 text-sm text-center mt-1"
                        ></div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs font-bold mb-2 uppercase ml-2">
                            Date
                        </label>
                        <input
                            v-model="form.date"
                            class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="date"
                            type="date"
                            name="date"
                            placeholder="date"
                            required
                            min="2021-12-01"
                            max="2022-3-30"
                        >
                        <div
                            v-if="form.errors.date"
                            v-text="form.errors.date[0]"
                            class="text-red-500 text-sm text-center mt-1"
                        ></div>
                    </div>
                </div>

                <div class="col-span-1">
                    <div class="grid grid-cols-2 gap-6 p-5">
                        <div class="col-span-1">
                            <div class="mb-4">
                                <h1 class="text-left">Movie Name: </h1>
                                <h1 class="text-teal-500 ml-3">{{ movie.name }} </h1>
                            </div>
                            <div class="mb-4">
                                <h1 class="text-left">Movie Ticket Price: </h1>
                                <h1 class="text-teal-500 ml-3">{{ movie.ticket }} </h1>
                            </div>
                            <div class="mb-4">
                                <h1 class="text-left">Show Time: </h1>
                                <h1 class="text-teal-500 ml-3" v-for="time in movie.show_times"
                                    v-text="form.time_id === time.id ? time.time : ''"  />
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div class="mb-4">
                                <h1 class="text-left">Location: </h1>
                                <h1 class="text-teal-500 ml-3" v-for="address in locations"
                                    v-text="form.location_id === address.id ? address.address : ''"  />
                            </div>
                            <div class="mb-4">
                                <h1 class="text-left">Date: </h1>
                                <h1 class="text-teal-500 ml-3">{{ form.date }} </h1>
                            </div>
                            <div class="mb-4">
                                <h1 class="text-left">Total Price: </h1>
                                <h1 class="text-teal-500 ml-3">{{ movie.ticket * form.seat.length }}$</h1>
                            </div>
                            <div v-if="success !== null" role="alert">
                                <div  class="mb-6"><img :src="'/'+qrCode"></div>
                                <a
                                    :href="'/'+qrCode" v-text="'Download'"
                                    class="bg-blue-500 mt-4 rounded-3xl px-5 py-2 text-white"
                                    download
                                />
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full bg-blue-500 rounded rounded-t-3xl p-3 text-center text-white font-bold"
                        v-text="'Screen'"
                        :hidden="form.time_id === 'Open this select Movie show time' || form.date === '' ||
                                                    form.movie_id === '' || form.location_id === 'Open this select location'"
                    />
                    <div class="mt-6 p-3">
                        <table
                            class="table-auto text-center items-center"
                            :hidden="form.time_id === 'Open this select Movie show time' || form.date === '' ||
                            form.movie_id === '' || form.location_id === 'Open this select location'"
                        >
                            <tr>
                                <th>/</th>
                                <th v-for="x in 19" class="text-center">
                                    <span class="ml-2">{{ x }}</span>
                                </th>
                            </tr>
                            <tr>
                                <th>A</th>
                                <td v-for="x in 19">
                                    <input
                                        type="checkbox"
                                        v-model="form.seat"
                                        :value="'A'+x"
                                        class="ml-2"
                                        :class="[x === 5 || x === 14 ? 'bg-black' :'', select('A'+x) ?
                                        'bg-blue-500' :''] "
                                        :disabled="x === 5 || x === 14 || select('A'+x)"
                                    >
                                </td>
                            </tr>
                            <tr>
                                <th>B</th>
                                <td v-for="x in 19">
                                    <input
                                        type="checkbox"
                                        v-model="form.seat"
                                        :value="'B'+x"
                                        class="ml-2"
                                        :class="[x === 5 || x === 14 ? 'bg-black' :'', select('B'+x) ?
                                        'bg-blue-500' :''] "
                                        :disabled="x === 5 || x === 14 || select('B'+x)"
                                    >
                                </td>
                            </tr>
                            <tr>
                                <th>C</th>
                                <td v-for="x in 19">
                                    <input
                                        type="checkbox"
                                        v-model="form.seat"
                                        :value="'C'+x"
                                        class="ml-2"
                                        :class="[x === 5 || x === 14 ? 'bg-black' :'', select('C'+x) ?
                                        'bg-blue-500' :''] "
                                        :disabled="x === 5 || x === 14 || select('C'+x)"
                                    >
                                </td>
                            </tr>
                            <tr>
                                <th>D</th>
                                <td v-for="x in 19">
                                    <input
                                        type="checkbox"
                                        v-model="form.seat"
                                        :value="'D'+x"
                                        class="ml-2"
                                        :class="[x === 5 || x === 14 ? 'bg-black' :'', select('D'+x) ?
                                        'bg-blue-500' :''] "
                                        :disabled="x === 5 || x === 14 || select('D'+x)"
                                    >
                                </td>
                            </tr>
                            <tr>
                                <th>E</th>
                                <td v-for="x in 19">
                                    <input
                                        type="checkbox"
                                        v-model="form.seat"
                                        :value="'E'+x"
                                        class="ml-2"
                                        :class="[x === 5 || x === 14 ? 'bg-black' :'', select('E'+x) ?
                                        'bg-blue-500' :''] "
                                        :disabled="x === 5 || x === 14 || select('E'+x)"
                                    >
                                </td>
                            </tr>
                            <tr>
                                <th>F</th>
                                <td v-for="x in 19">
                                    <input
                                        type="checkbox"
                                        v-model="form.seat"
                                        :value="'F'+x"
                                        class="ml-2"
                                        :class="[x === 5 || x === 14 ? 'bg-black' :'', select('F'+x) ?
                                        'bg-blue-500' :''] "
                                        :disabled="x === 5 || x === 14 || select('F'+x)"
                                    >
                                </td>
                            </tr>
                            <tr>
                                <th>J</th>
                                <td v-for="x in 19">
                                    <input
                                        type="checkbox" v-model="form.seat"
                                        :value="'J'+x"
                                        class="ml-2"
                                        :class="[x === 5 || x === 14 ? 'bg-black' :'', select('J'+x) ?
                                        'bg-blue-500' :''] "
                                        :disabled="x === 5 || x === 14 || select('J'+x)"
                                    >
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div></div>
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-6 rounded-3xl focus:outline-none focus:shadow-outline"
                    :disabled="form.processing"
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

let props = defineProps({
    locations: Object,
    errors: Object,
    movie: Array,
    seats: Object,
    success: String,
    qrCode : String,
})

let form = useForm({
    location_id: 'Open this select location',
    name: '',
    email: '',
    date: '',
    movie_id: '',
    seat: [],
    time_id: 'Open this select Movie show time',
});

let select = (data) => {
    for (let index = props.seats.length - 1; index >= 0; --index) {
        const element = props.seats[index];
        if (
            element.seat === data &&
            element.date === form.date &&
            element.time_id === form.time_id &&
            element.location_id === form.location_id &&
            element.movie_id === form.movie_id
        ){
            return true;
        }
    }
}

form.movie_id = props.movie.id;

let submit = () => {
    form.post('/reserve');
}
</script>
