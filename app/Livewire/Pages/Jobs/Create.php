<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\Job;
use App\Models\Skills;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $experience;
    public $salary;
    public $location;
    public $extra_info;
    public $company_name;
    public $logo;
    public $selectedSkills = [];
    public $allSkills;

    
    public $jobId;   
        public $isEditing = false;

    public function mount($jobId = null)
    {
        $this->allSkills = Skills::all();

        if ($jobId) {
            $this->isEditing = true;
            $this->jobId = $jobId;
            $job = Job::find($jobId);

            $this->title = $job->title;
            $this->description = $job->description;
            $this->experience = $job->experience;
            $this->salary = $job->salary;
            $this->location = $job->location;
            $this->extra_info = $job->extra_info;
            $this->company_name = $job->company_name;
            $this->logo = $job->logo;
            $this->selectedSkills = $job->skills->pluck('id')->toArray(); // Or pluck('id') if you store IDs
        }
    }



    public function saveJob()
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'experience' => 'required|max:255',
            'salary' => 'required|max:255',
            'location' => 'required|max:255',
            'company_name' => 'required|max:255',
           // 'logo' =>   $this->logo && $this->logo instanceof \Illuminate\Http\UploadedFile ? 'required|image|mimes:jpg,jpeg,png|max:2048' : 
            //'nullable',
            
             
        ];
        if(!$this->isEditing){
            $rules['logo'] = 'required|image|max:2048';
        }else{
       
           // if ($this->logo && $this->logo instanceof \Illuminate\Http\UploadedFile ) {
            if ($this->logo instanceof \Illuminate\Http\UploadedFile) {

                $rules['logo'] = 'image|max:2048';
        
            }elseif ($this->isEditing && is_string($this->logo)) {

                $rules['logo'] = 'nullable';
            }

            
        }
        $this->validate($rules);


        
        $job = $this->isEditing ? Job::find($this->jobId) : new Job(); // Edit or Create
       // dd($this->selectedSkills);
        $job->title = $this->title;
        $job->description = $this->description;
        $job->experience = $this->experience;
        $job->salary = $this->salary;
        $job->location = $this->location;
        $job->extra_info = $this->extra_info;
        $job->company_name = $this->company_name;

        // if ($this->logo) {
        //     $logoPath = $this->logo->store('job_logos', 'public');
        //     $job->logo = $logoPath;
        // }

        if ($this->logo && $this->logo instanceof \Illuminate\Http\UploadedFile) {
            $logoPath = $this->logo->store('job_logos', 'public');
        } elseif ($this->isEditing) {
           
            $logoPath = $this->logo;
        }
        $job->logo = $logoPath;
    

        $job->save();

        $skillIds = Skills::whereIn('id', $this->selectedSkills)->pluck('id')->toArray();



        
        $job->skills()->sync($skillIds);

        $this->resetInputFields();

        $this->dispatch('jobSaved', ['message' => 'Job saved successfully!']);

        $this->dispatch('redirectTo', url('admin/jobs'));

       // return redirect()->to(route('jobs.index'));
        //return redirect()->route('jobs.index'); 
    }


    private function resetInputFields()
    {
        $this->reset([
            'title',
            'description',
            'experience',
            'salary',
            'location',
            'extra_info',
            'company_name',
            'logo',
            'selectedSkills',
        ]);
    }

    public function render()
    {
        return view('livewire.pages.jobs.create');
    }
}