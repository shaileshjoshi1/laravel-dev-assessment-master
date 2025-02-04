<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import JobCard from '@/Components/Dashboard/JobCard.vue';

const props = defineProps({
  jobs: Array
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Hero -->
        <Hero />

        <!-- Job List -->
        <div class="bg-white">
            <div class="container py-5">
                <JobCard :jobs="props.jobs" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
