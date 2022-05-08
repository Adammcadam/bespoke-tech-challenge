<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { defineProps } from "vue";
import Card from "@/Components/Card";

const props = defineProps({
    items: Array,
    currentSearch: String,
    currentType: String
})

function submit() {
    Inertia.get(`/dashboard?content_type=${currentType}`)
}

</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Company Y Portal
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                        <h3 class="text-2xl">Filter</h3>
                        <form action="#" method="GET">
                            <select @change="submit()" id="content_type" name="content_type" class="mr-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" v-model="currentType">
                                <option value="" disabled>Please select a type</option>
                                <option value="info">Info</option>
                                <option value="download">Download</option>
                                <option value="WEBLINK">Weblink</option>
                            </select>
                            <button type="submit" class="w-auto py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                        <h3 class="text-2xl">Search</h3>
                        <form action="#" method="GET">
                            <input type="text" name="search" id="search" placeholder="Search..." class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md" v-model="currentSearch">
                        </form>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-2xl">Latest Items</h3>

                        <div class="grid gap-4 grid-cols-6 mt-4" v-if="items.length > 0">
                            <Card v-for="item in items" :key="item.id" :item="item" />
                        </div>
                        <div v-else class="flex justify-center">
                            <p>No items found</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
