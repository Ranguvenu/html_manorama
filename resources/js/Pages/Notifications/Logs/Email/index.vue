<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import Views from './views/index.vue';
import { ref } from 'vue'; // Import ref from 'vue'
let show = false; 


const breadcrumbItems = ref([
  { name: 'Home', path: '/' },
  { name: 'Email Logs', active : 'active' },
  // Add more breadcrumb items if needed
]);

</script>
<style>
</style>
<template>
    <Head title="Email Logs" />
    <AdminLayout :breadcrumb-items="breadcrumbItems">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Email Logs</h2>
        </template>

        <div class="py-3">
            <div class="sm:px-6 lg:px-8">
                <Views/>
            </div>
        </div>
    </AdminLayout>
</template>
