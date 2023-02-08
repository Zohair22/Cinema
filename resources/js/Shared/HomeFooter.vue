<template>
    <div class="bg-black py-8">

        <div class="gap-6 grid grid-cols-5 text-white">
            <div class="col-span-1"></div>

            <div class="col-span-2 ">
                <h1 class="uppercase text-lg text-white mb-6">
                    <span class="border-b-2 border-yellow-400">Address information</span>
                </h1>
                <div class="mb-6">
                    <div v-for="addres in address">
                        <div v-text="addres.address+','"/>
                    </div>
                </div>
                <div class="mb-6">
                    tenguu54@mail.com
                </div>
                <div>
                    +201117054078
                </div>

            </div>

            <div class="col-span-2">
                <h1 class="uppercase text-lg text-white mb-6">
                    <span class="border-b-2 border-yellow-400">Leave a message</span>
                </h1>

                <form @submit.prevent="submit" class="max-w-sm">
                    <div class="mb-4">
                        <input
                            v-model="form.name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name"
                            type="text"
                            name="name"
                            placeholder="Name"
                            required
                        >
                        <div
                            v-if="form.errors.name"
                            v-text="form.errors.name[0]"
                            class="text-red-500 text-sm text-center mt-1"
                        />
                    </div>
                    <div class="mb-4">
                        <input
                            v-model="form.email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email"
                            type="email"
                            name="email"
                            placeholder="email"
                            required
                        >

                        <div
                            v-if="form.errors.email"
                            v-text="form.errors.email[0]"
                            class="text-red-500 text-sm text-center mt-1"
                        />
                    </div>
                    <div class="mb-4">
                        <textarea
                            v-model="form.message"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="message"
                            type="text"
                            name="message"
                            placeholder="message"
                            required
                        />
                        <div
                            v-if="form.errors.message"
                            v-text="form.errors.message[0]"
                            class="text-red-500 text-sm text-center mt-1"
                        />
                    </div>

                    <div class="flex items-center justify-between">
                        <div></div>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-6 rounded-3xl focus:outline-none focus:shadow-outline"
                            :disabled="form.processing"
                            type="submit"
                        >
                            Send your Message
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <div class="text-center text-white text-lg mt-10 border-t border-gray-500 pt-8">
            © Copyrights 2021 Tenguu. All rights reserved
        </div>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

defineProps({
    address: Object,
})

let form = useForm({
    name: '',
    email: '',
    message: '',
});

let submit = () => {
    form.post('/message');
}
</script>
