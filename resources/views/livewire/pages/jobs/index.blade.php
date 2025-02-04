<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center py-8">
            <h1 class="text-2xl font-bold">Jobs</h1>
        </div>
        <div class="w-full">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Title</th>
                                <th scope="col" class="px-4 py-3">Description</th>
                                <th scope="col" class="px-4 py-3">Company Logo</th>
                                <th scope="col" class="px-4 py-3">Company Name</th>
                                <th scope="col" class="px-4 py-3">Experience</th>
                                <th scope="col" class="px-4 py-3">Salary</th>
                                <th scope="col" class="px-4 py-3">Location</th>
                                <th scope="col" class="px-4 py-3">Skills</th>
                                <th scope="col" class="px-4 py-3">Extra</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr class="border-b dark:border-gray-700">
                                    <th scope="row" class="px-4 py-3 font-semibold text-gray-900 whitespace-nowrap dark:text-white">{{ $job->title }}</th>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ str($job->description)->words(7) }}</td>
                                    <td class="px-4 py-3 text-center">
                                        <img src="{{ url('storage/' . $job->logo) }}" class="h-12 w-auto block mx-auto" alt="{{ $job->company_name }}">
                                    </td>
                                    <td><span class="font-medium text-gray-900">{{ $job->company_name }}</span></td>  
                                    <td class="px-4 py-3">{{ $job->experience }}</td>
                                    <td class="px-4 py-3">{{ $job->salary }}</td>
                                    <td class="px-4 py-3">{{ $job->location }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center flex-wrap gap-2">
                                            @foreach ($job->skills as $skill)
                                                <span class="inline-block bg-gray-200 rounded-full px-2 py-0.5 text-xs font-medium text-gray-700">{{ $skill->name }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center flex-wrap gap-2">
                                            @foreach ($job->extra as $extra)
                                                <span class="inline-block bg-amber-100 rounded-full px-2 py-0.5 text-xs font-medium text-amber-800">{{ $extra }}</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 flex items-center justify-end space-x-2">

                                    <a href="{{ url('admin/jobs/create', ['jobId' => $job->id]) }}" 
                                            class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-blue-500">
                                                Edit
                                            </a>
    
                                    <a href="#" wire:click="deleteJob({{ $job->id }})"  wire:confirm="Are you sure you want to delete?" class="text-sm px-3 py-1.5 rounded hover:bg-slate-100 transition-colors text-red-500">Delete</a>

                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@livewireScripts
<script>
   
    Livewire.on('jobDeleted', message => {
        alert(message);
    });
</script>
