<template>
  <div v-if="jobs.length > 0" class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div v-for="(job, index) in jobs" :key="job.id" class="p-6 bg-white shadow-lg rounded-lg border border-gray-200 relative">
      
      <div class="flex items-center space-x-4">
        <img :src="`/storage/${job.logo}`" alt="Company Logo" class="w-12 h-12 rounded-full bg-gray-100" />
        <div>
          <h3 class="text-xl font-bold text-gray-800">{{ job.title }}</h3>
          <p class="text-gray-500 text-sm">{{ job.company_name }}</p>
        </div>
      </div>

     
      <div class="flex space-x-4 text-sm text-gray-500 mt-3">
        <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75V6a3.75 3.75 0 0 1 7.5 0v.75M4.5 9.75h15m-14.25 0A1.5 1.5 0 0 0 4.5 11.25v8.25a1.5 1.5 0 0 0 1.5 1.5h12a1.5 1.5 0 0 0 1.5-1.5V11.25a1.5 1.5 0 0 0-1.5-1.5m-12 0h12"></path>
</svg>

 {{ job.experience }} Yrs</span>
        <span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline">
    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5" fill="none"/>
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8h6M9 12h6m-6 0c2 4 4 6 6 6H9"></path>
</svg>



 {{ job.salary }} Lacs PA</span>
        <span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2c3.866 0 7 3.134 7 7s-7 13-7 13S5 12.866 5 9s3.134-7 7-7z"></path>
        <circle cx="12" cy="9" r="2.5"></circle>
    </svg>  {{ job.location }}</span>
      </div>

      <!-- Description -->
      <p class="text-gray-700 text-sm mt-3">{{ job.description }}</p>

      
       <div v-if="job.skills && job.skills.length" class="flex flex-wrap gap-2 mt-4">
        <span v-for="(skill, index) in job.skills" :key="index" class="bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded-full">
          {{ skill }}
        </span>
      </div> 

    
      <div class="absolute top-4 right-4 flex space-x-2">
        <template v-for="(extra, index) in job.extra" :key="index">

        <span class="text-xs px-3 py-1 bg-gray-100 text-gray-700 rounded-full">{{ extra }}</span>
       </template>
        <!-- <span class="text-xs px-3 py-1 bg-gray-100 text-gray-700 rounded-full">{{ job.type }}</span>
       -->
      </div>

  
      <div class="text-xs text-gray-500 mt-4 text-right">{{ job.postedTime }}</div>
    </div>
  </div>

  <!--  else no jobs available -->
  <div v-else class="bg-white shadow-lg rounded-lg p-5 border border-gray-200 text-center">
    <p class="text-gray-500">No jobs available.</p>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  jobs: {
    type: Array,
    default: () => [],
  }
});
</script>

