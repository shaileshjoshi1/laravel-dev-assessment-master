<div>
    <div class="container mx-auto p-4">
    <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Skills</h1>
        </div>
        {{-- TODO: Add table here and a form to create a new skill --}}
        <div class="grid grid-cols-2 gap-4">

            <div>
                <table class="min-w-full border border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">NAME</th>
                            <th class="border px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skills as $skill)
                            <tr>
                                <td class="border px-4 py-2">{{ $skill->name }}</td>
                                <td class="border px-4 py-2 text-right">
                                    @if ($editingSkillId === $skill->id)
                                        <input type="text" wire:model="editName" class="border rounded px-2 py-1">
                                        <button wire:click="updateSkill" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Update</button>
                                        <button wire:click="cancelEdit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded">Cancel</button>
                                    @else
                                        <button wire:click="editSkill({{ $skill->id }})" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded">Edit</button>
                                    @endif
                                    <button wire:click="deleteSkill({{ $skill->id }})"  wire:confirm="Are you sure you want to delete?" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                <div class="border rounded p-4">
                    <h3 class="text-xl font-bold mb-2">Add new skill</h3>

                    <div class="mb-2">
                        <label for="name" class="block text-gray-700 font-bold mb-1">Name</label>
                        <input type="text" wire:model="name" id="name" class="border rounded w-full px-2 py-1">
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button wire:click="saveSkill" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                </div>
            </div>

        </div>
    </div>
</div>
