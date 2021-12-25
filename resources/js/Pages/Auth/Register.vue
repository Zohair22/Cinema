<template>
    <Head title="Add New Admin" />
    <main class="max-w-5xl mx-auto lg:flex lg:justify-between gap-10 mt-12">
        <div class="w-full">
            <div class="bg-gray-100 lg:mb-0 mb-10 px-6 py-8 rounded-3xl shadow-2xl text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Add New Admin</h1>
                <form @submit.prevent="submit">
                    <input
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="name"
                        v-model="form.name"
                        placeholder="Full Name"
                        required
                    />

                    <div
                        v-if="form.errors.name"
                        v-text="form.errors.name[0]"
                        class="text-red-500 text-sm text-center mt-1"
                    ></div>

                    <input
                        type="email"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="email"
                        v-model="form.email"
                        placeholder="Email"
                        required
                    >
                    <div
                        v-if="form.errors.email"
                        v-text="form.errors.email[0]"
                        class="text-red-500 text-sm text-center mt-1"
                    ></div>

                    <input
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="password"
                        v-model="form.password"
                        placeholder="Password"
                        required
                    >
                    <div
                        v-if="form.errors.password"
                        v-text="form.errors.password[0]"
                        class="text-red-500 text-sm text-center mt-1"
                    ></div>

                    <input
                        type="password"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        v-model="form.password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm Password"
                        required
                    >
                    <div
                        v-if="form.errors.password_confirmation"
                        v-text="form.errors.password_confirmation[0]"
                        class="text-red-500 text-sm text-center mt-1"
                    ></div>

                    <button
                        :disabled="form.processing"
                        type="submit"
                        class="w-full text-center py-3 rounded bg-teal-500 text-white hover:bg-teal-800 focus:outline-none my-1"
                    >
                        Add New Admin
                    </button>
                </form>
            </div>
        </div>

        <div class="w-full">
            <div class="bg-gray-100 px-6 py-8 rounded-3xl shadow-2xl text-black">
                <h1 class="mb-8 text-3xl text-center">Add New Location</h1>
                <form @submit.prevent="location">
                    <input
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="locationName"
                        v-model="form.locationName"
                        placeholder="Location Name"
                        required
                    />
                    <div
                        v-if="form.errors.locationName"
                        v-text="form.errors.locationName"
                        class="text-red-500 text-sm text-center mt-1"
                    ></div>

                    <input
                        type="text"
                        class="block border border-grey-light w-full p-3 rounded mb-4"
                        name="address"
                        v-model="form.address"
                        placeholder="Address"
                        required
                    >
                    <div
                        v-if="form.errors.address"
                        v-text="form.errors.address"
                        class="text-red-500 text-sm text-center mt-1"
                    ></div>

                    <button
                        :disabled="form.processing"
                        type="submit"
                        class="w-full text-center py-3 rounded bg-teal-500 text-white hover:bg-teal-800 focus:outline-none my-1"
                    >
                        Add Location
                    </button>
                </form>
            </div>
            <div class="w-full mt-4">
                <div class="bg-gray-100 px-6 py-8 rounded-3xl shadow-2xl text-black w-full">
                    <h1 class="text-center mb-4 text-lg font-bold text-gray-500">Our Locations</h1>
                    <div v-for="location in locations" class="grid grid-cols-3 items-center border-b p-2">
                        <div v-text="location.name" class="grid-cols-1 text-left"/>
                        <div v-text="location.address" class="grid-cols-1 text-center"/>
                        <div class="col-span-1 text-right">
                            <Link
                                :href="'/deleteLocation/'+location.id"
                                class="far fa-trash-alt text-sm text-red-700"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="bg-gray-100 px-6 py-8 rounded-3xl shadow-2xl text-black max-w-4xl mx-auto mt-12">
        <h1 class="text-center mb-4 text-lg font-bold text-gray-500">Our Admins</h1>
        <div v-for="user in users" class="grid grid-cols-3 gap-4 items-center border-b p-2">
            <div class="col-span-1 text-left" v-text="user.name" />
            <div class="col-span-1 text-center" v-text="user.email" />
            <div class="col-span-1 text-right">
                <Link
                    :href="'/deleteUser/'+user.id"
                    class="far fa-trash-alt text-sm text-red-700"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

defineProps({
    locations: Object,
    users: Object,
    success: Object,
})

let form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    locationName: '',
    address: '',
});

let submit = () => {
    form.post('/newAdmin', { preserveScroll: true, preserveState: true});
}

let location = () => {
    form.post('/newLocation', { preserveScroll: true, preserveState: true});
}
</script>

<style scoped>

</style>
