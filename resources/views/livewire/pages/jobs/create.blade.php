<div>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Create new job posting</h1>
        </div>

        @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

        <div class="grid grid-cols-2 gap-4 mt-4">

            <div> 
                <div class="border rounded p-4">
                    <h3 class="text-xl font-bold mb-2">Job details</h3>

                    <div class="mb-2">
                        <label for="title" class="block text-gray-700 font-bold mb-1">Title</label>
                        <input type="text" wire:model="title" id="title" class="border rounded w-full px-2 py-1">
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="description" class="block text-gray-700 font-bold mb-1">Description</label>
                        <textarea wire:model="description" id="description" class="border rounded w-full px-2 py-1 h-24"></textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-2"> 
                        <div class="mb-2">
                            <label for="experience" class="block text-gray-700 font-bold mb-1">Experience</label>
                            <input type="text" wire:model="experience" id="experience" class="border rounded w-full px-2 py-1">
                            @error('experience') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label for="salary" class="block text-gray-700 font-bold mb-1">Salary</label>
                            <input type="text" wire:model="salary" id="salary" class="border rounded w-full px-2 py-1">
                            @error('salary') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2"> 
                    <div class="mb-2">
                        <label for="location" class="block text-gray-700 font-bold mb-1">Location</label>
                        <input type="text" wire:model="location" id="location" class="border rounded w-full px-2 py-1">
                        @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="extra_info" class="block text-gray-700 font-bold mb-1">Extra Info</label>
                        <input type="text" wire:model="extra_info" id="extra_info" class="border rounded w-full px-2 py-1">
                        <span class="text-gray-500 text-sm">Please use comma separated values</span>
                        @error('extra_info') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>
                </div>
            </div>


            <div>  
                <div class="border rounded p-4">
                    <h3 class="text-xl font-bold mb-2">Company details</h3>
                    <div class="mb-2">
                        <label for="company_name" class="block text-gray-700 font-bold mb-1">Name</label>
                        <input type="text" wire:model="company_name" id="company_name" class="border rounded w-full px-2 py-1">
                        @error('company_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="logo" class="block text-gray-700 font-bold mb-1">Logo</label> 
                        <input type="file" wire:model="logo" id="logo" accept="image/png, image/jpeg, image/jpg,image/gif,image/bmp,image/svg+xml" onchange="validateFileType(this)"  class="border rounded w-full px-2 py-1">
                        @error('logo') 
        <span class="text-red-500 text-sm">{{ $message }}</span> 
    @enderror

                        @if ($logo && $logo instanceof \Illuminate\Http\UploadedFile)
                        <img src="{{ $logo->temporaryUrl() }}" alt="Logo Preview" class="mt-2 h-20">
                    @elseif ($this->isEditing && $logo)
                        <img src="{{ url('storage/' . $logo) }}" alt="Logo Preview" class="mt-2 h-20">
                    @endif

                    </div>

                    <div class="mt-4"> 
                        <h3 class="text-xl font-bold mb-2">Skills</h3>

                        <div class="mb-2">
    <label for="skills" class="block text-gray-700 font-bold mb-1">Name</label>
    <select wire:model="selectedSkills" id="skills" multiple class="border rounded w-full px-2 py-1 ">  
        @foreach ($allSkills as $skill)
            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
        @endforeach
    </select>
    @error('selectedSkills') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

                       
                    </div>
                </div>
            </div>

        </div>  

        <div class="mt-4">
            <button wire:click="saveJob" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
        </div>
    </div>
</div>

@livewireScripts
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Livewire.on('redirectTo', url => {
            window.location.href = url;
        });
    });
</script>


<script>
    window.addEventListener('jobSaved', event => {
        console.log(event?.detail); // Access event data
        alert(event?.detail[0]?.message); // Or any other action
    });


    function validateFileType(input) {
        const file = input.files[0];
        if (file) {
            const allowedTypes = ["image/png", "image/jpeg", "image/jpg","image/gif","image/bmp","image/svg+xml"];
            if (!allowedTypes.includes(file.type)) {
                alert("Only JPG, JPEG,SVG,GIF and PNG images are allowed.");
                input.value = ""; // Reset the file input
            }
        }
    }
    
</script>

