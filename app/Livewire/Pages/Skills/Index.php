<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;
use App\Models\Skills; 

class Index extends Component
{
    public $skills;
    public $name;
    public $editingSkillId = null; 
    public $editName; 


    public function mount()
    {
        $this->loadSkills();
    }



    public function loadSkills()
    {
        $this->skills = Skills::all();
    }

    public function saveSkill()
    {
        $this->validate(['name' => 'required|unique:skills|max:255']); // Validate

        Skills::create(['name' => $this->name]);

        $this->name = '';
        $this->loadSkills();
    }

    
    public function editSkill($id)
    {
        $this->editingSkillId = $id;
        $skill = Skills::find($id);
        $this->editName = $skill->name;
    }

    public function updateSkill()
    {
        $this->validate([
            'editName' => 'required|unique:skills,name,' . $this->editingSkillId . '|max:255',
        ]);

        $skill = Skills::find($this->editingSkillId);
        $skill->update(['name' => $this->editName]);

        $this->editingSkillId = null;
        $this->editName = ''; 
               
        $this->loadSkills();  
        }


    public function cancelEdit()
    {
        $this->editingSkillId = null;
        $this->editName = '';
    }

    public function deleteSkill($id)
    {
        Skills::destroy($id);
        $this->loadSkills();
    }

    public function render()
    {
        return view('livewire.pages.skills.index');
    }
}