<template>
    <div class="container mx-auto p-6">
      <h1 class="text-3xl font-bold mb-6">Find Your Dream Job</h1>
      
      <div class="grid gap-6">
        <JobCard v-for="job in jobs" :key="job.id" :job="job" />
      </div>
    </div>
  </template>
  
  <script>
  import JobCard from '@/Components/JobCard.vue';
  import { defineComponent } from 'vue';
  export default defineComponent({
    components: { JobCard },
    props: {
      jobs: Array
    }
  });
  </script>  